<?php
error_reporting(0);

$conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

if (!$conn){
  die("Could not connect:" . mysqli_error());
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../to/PHPMailer/src/PHPMailer.php';
require '../to/PHPMailer/src/SMTP.php';

if (isset($_POST['register'])){
  //destroy all active sessions before registering a new user
  session_start();
  unset($_SESSION['email']);
  unset($_SESSION['fullname']);
  unset($_SESSION['role']);
  unset($_SESSION['userId']);
  session_destroy();
  //Grabbing the user data from JQUERY post request and capitalize the string using ucwords() method
  $first_name = mysqli_real_escape_string($conn,ucwords(trim($_POST['fnamePHP'])));
  $last_name = mysqli_real_escape_string($conn,ucwords(trim($_POST['lnamePHP'])));
  $email = mysqli_real_escape_string($conn,strtolower(trim($_POST['emailPHP'])));
  $password = trim($_POST['passwordPHP']);
  $password_confirmation = trim($_POST['password_confirmationPHP']);
  $role = strtolower(trim($_POST['role_valuePHP']));
  $applied = 'No';
  $fullname = $first_name . ' ' . $last_name;
  $token = md5(rand());
  $verified = 'No';

  //Validation on the server side

  //Validate first name 
  if(empty($first_name)){
    exit('<div class="alert alert-danger alert-dismiss">Please enter your first name</div>');
  }
  else if(strlen($first_name) < 2){
    exit('<div class="alert alert-danger alert-dismiss">Your first name is too short</div>');
  }
  else if(preg_match("!/^[a-zA-Z]+$/!", strtolower($first_name))){
    exit('<div class="alert alert-danger">First name must not contain numbers and special characters</div>');
  }
  else if(strlen($last_name) > 50){
      exit('<div class="alert alert-danger alert-dismiss">Your first name is too long!</div>');
    }
  

  //validate last name 
  if(empty($last_name)){
    exit('<div class="alert alert-danger alert-dismiss">Please enter your last name</div>');
  }
  else if(strlen($last_name) < 2){
    exit('<div class="alert alert-danger alert-dismiss">Your last name is too short</div>');
  }
  else if(preg_match("!/^[a-zA-Z]+$/!", strtolower($last_name))){
    exit('<div class="alert alert-danger">Last name must not contain numbers and special characters</div>');
  }
  else if(strlen($last_name) > 50){
    exit('<div class="alert alert-danger alert-dismiss">Your last name is too long!</div>');
  }

  //validate email address
  if(empty($email)){
    exit('<div class="alert alert-danger">Email is required</div>');
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    exit('<div class="alert alert-danger">Please enter a valid email</div>');
  }else if(strlen($email) > 100){
    exit('<div class="alert alert-danger">Email is too long!</div>');
  }


  //validate password
  if(empty($password)){
    exit('<div class="alert alert-danger alert-dismiss">Please enter a password</div>');
  }
  else if(strlen($password) < 8){
    exit('<div class="alert alert-danger alert-dismiss">Password is short, 8 alphanumeric character password is required!</div>');
  }
  else if(!preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/', $password)){ //alphanumeric test, ctype_alnum() built in method achieves that
    exit('<div class="alert alert-danger">Password must contain atleast 1 letter, number and a special character!</div>');
  }
  else if($password !== $password_confirmation && $password_confirmation !== '' && $password !== ''){
    exit('<div class="alert alert-danger">Passwords do not match</div>');

  }

  //validate password confirmation
  if(empty($password_confirmation )){
    exit('<div class="alert alert-danger alert-dismiss">Please enter a password confirmation</div>');
  }
  else if(strlen($password_confirmation) < 8){
    exit('<div class="alert alert-danger alert-dismiss">Password confirmation is short!</div>');
  }
  else if($password !== $password_confirmation && $password_confirmation !== '' && $password !== ''){
    exit('<div class="alert alert-danger">Passwords do not match</div>');

  }

  if(empty($role)){
    
    exit('<div class="alert alert-danger">Please select whether you are a student or a recruiter!</div>');
  }

  //attempt to check if the user has 2 accounts with one email address already. if so, reject registration request
  try{
      $sql = "SELECT * FROM registration WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        exit('<div class="alert alert-danger">Email address already exists</div>');
      }
    }
    catch(e){
      exit('<div class="alert alert-danger">Oops! something went wrong, Please try again.</div>');
    }


  //Query the database for registration table
  $sql = "INSERT INTO registration (first_name,last_name, email, password, role, applied, verified, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  //initialize the prepared statement object
  $stmt = mysqli_stmt_init($conn);

  //checking if the prepared statement succeeded. it will return true if it succeeded and false otherwise and we check for false
  if(!mysqli_stmt_prepare($stmt, $sql)){
    //kill the connection because syntax errors got caught
    exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
  }

  //if no syntax errors got caught, we bind the prepared statement object $stmt with the data we need to store in the database
  //Hashing password before storing
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, "ssssssss", $first_name, $last_name, $email, $hashed_password, $role, $applied, $verified, $token);

  //Execute the prepared statement and store the results
  if(mysqli_stmt_execute($stmt)){
    $image ="";
    $query = "INSERT INTO avatar (email, full_name, role, image) VALUES ('$email', '$fullname', '$role', '$image')";

    //save messages like this in the message table
    $text = mysqli_real_escape_string($conn, "Hi<br/><br/>Thank you for signing up! We've sent you a link in your email inbox, Please verify your email. <br/><br/> Regards<br/><br/>StudentINN");
    mysqli_query($conn, "INSERT INTO messages(email, message, read_) VALUES ('$email','$text', 0)");
    
    if(!mysqli_query($conn,$query)){
      exit("Failed to insert avatar");
    };

    sendEmail($first_name, $email, $token);
   
    exit("success");
    
  };

  exit('failed');

}

function sendEmail($first_name, $email, $token){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.studentsinn.co.za';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@studentsinn.co.za';                     //SMTP username
    $mail->Password   = 'Lin@95#25252525';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@studentsinn.co.za', 'Support Team');
    $mail->addAddress($email, $first_name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //customized message

    $customizedMessage = "
    <p>Hi</p>
    <br/><br/>
    <h4>Congratulations! Your account was registered successfully</h4>
    <br/><br/>
    <p>Please verify your email address by clicking links below.</p>
    <br/>
    <a style='text-decoration: none; background-color: #333399; color: #fff; border-radius: 10px;' href='http://www.studentsinn.co.za/verify.php?token=$token'>Verify email</a>
    <br/><br/>
    <p>If this was not you, please ignore this email.</p>
    <br/><br/>
    <p>Regards,</p>
    <strong>Support Team</strong>
    ";
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Varification';
    $mail->Body    = $customizedMessage;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return true;

}