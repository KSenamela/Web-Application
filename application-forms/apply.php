<?php
  session_start();
  if (isset($_POST['firstname'])) {
    insertAll();
  }

function insertAll(){
  include '../server/dbconnect_server.php';

  if(isset($_POST['other-institution'])){
    $institution = mysqli_real_escape_string($conn, trim($_POST['other-institution']));
  }else{
    $institution = mysqli_real_escape_string($conn, trim($_POST['institution']));
  }

  if(isset($_POST['referralcode']) && $_POST['referralcode'] != ''){
    $referral_code = mysqli_real_escape_string($conn, trim( $_POST['referralcode']));
    $testQuery = "SELECT * FROM recruiter_application WHERE referral_code = '$referral_code'";
    $result = mysqli_query($conn, $testQuery);
    if (!($result->num_rows > 0)){
      exit("Incorrect referral code, please ensure that your recruiter gave you a correct referral code");
    }
  }else{
    $referral_code = '0000'; //no recruiter
  }


  $id_number =  mysqli_real_escape_string($conn, trim($_POST['idnumber']));
  $first_name = mysqli_real_escape_string($conn, trim($_POST['firstname']));
  $last_name =  mysqli_real_escape_string($conn, trim($_POST['lastname']));
  $email =  mysqli_real_escape_string($conn,trim($_POST['email']));
  $phone=  mysqli_real_escape_string($conn, trim($_POST['phonenumber']));
  $gender =  mysqli_real_escape_string($conn, trim($_POST['gender'])); 
  $race =  mysqli_real_escape_string($conn, trim($_POST['race']));
  $course =  mysqli_real_escape_string($conn, trim($_POST['course']));
  $studyYear =  mysqli_real_escape_string($conn, trim($_POST['yearstudy']));
  $completion_year =  mysqli_real_escape_string($conn, trim($_POST['compyear']));
  $funding =  mysqli_real_escape_string($conn, trim($_POST['funding']));
  $student_number =  mysqli_real_escape_string($conn, trim($_POST['studentnumber']));

  $street =  mysqli_real_escape_string($conn, trim($_POST['street']));
  $city =  mysqli_real_escape_string($conn, trim($_POST['city']));
  $province =  mysqli_real_escape_string($conn, trim($_POST['province']));
  $postal_code  =  mysqli_real_escape_string($conn, trim($_POST['postal']));
  $country =  mysqli_real_escape_string($conn, trim($_POST['country']));
  $kin_name =  mysqli_real_escape_string($conn, trim($_POST['kinname']));
  $kin_phone = mysqli_real_escape_string($conn, trim($_POST['kinphone']));

//Validate uploads section
//validate id copy upload

  $allowedFormat = ['jpg', 'png', 'jpeg', 'pdf'];
  $nameUser = $_SESSION['fullname'];
  $moveLetter = true;
  if(isset($_FILES['idcopy']['name'])){
    $idcopy_name = $_FILES['idcopy']['name'];
    $idcopy_size = $_FILES['idcopy']['size'];
    $tmpIdcopy = $_FILES['idcopy']['tmp_name'];
    $idcopy_ext = explode('.', $idcopy_name);
    $idcopy_ext = strtolower(end($idcopy_ext));
    if(!in_array($idcopy_ext, $allowedFormat)){
      exit("Wrong document format. Please only upload the following formats:jpg,png and jpeg");
    }else if($idcopy_size > 2000000){
      exit("The size is too large. The allowed maximum size is 2MB");      
    }else{
      $newDocsName = $nameUser . '-' . 'ID Copy' . '-' . date('Y-m-d') . '-' . date('H.i.s') . '-' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . '.' .$idcopy_ext;
      $StoreUpload = "INSERT INTO documents(email, full_name, file_name, upload_name) VALUES ('$email', '$nameUser', '$idcopy_name', '$newDocsName')";
      if(mysqli_query($conn, $StoreUpload)){
        $moveIDcopy = move_uploaded_file($tmpIdcopy, '../upload/' . $newDocsName);
      }
    }
  }
//validate proof of registration upload

  if(isset($_FILES['proof']['name'])){
    $proof_name = $_FILES['proof']['name'];
    $proof_size = $_FILES['proof']['size'];
    $tmpProof = $_FILES['proof']['tmp_name'];
    $proof_ext = explode('.', $proof_name);
    $proof_ext = strtolower(end($proof_ext));
    if(!in_array($proof_ext, $allowedFormat)){
      exit("Wrong document format. Please only upload the following formats:jpg,png and jpeg");
    }else if($proof_size > 2000000){
      exit("The size is too large. The allowed maximum size is 2MB");      
    }else{
      $newDocsName = $nameUser. '-' . 'Proof of registration' . '-' . date('Y-m-d') . '-' . date('H.i.s') . '-'  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . '.' .$proof_ext;
    
      $StoreUpload = "INSERT INTO documents(email, full_name, file_name, upload_name) VALUES ('$email', '$nameUser', '$proof_name', '$newDocsName')";
      if(mysqli_query($conn, $StoreUpload)){
        $moveproof = move_uploaded_file($tmpProof, '../upload/' . $newDocsName);
      }
    }
  }
//validate bursary letter upload
  if(isset($_FILES['bursaryLetter']['name'])){
    $bursaryLetter_name = $_FILES['bursaryLetter']['name'];
    $bursaryLetter_size = $_FILES['bursaryLetter']['size'];
    $tmpbursaryLetter = $_FILES['bursaryLetter']['tmp_name'];
    $bursaryLetter_ext = explode('.', $bursaryLetter_name);
    $bursaryLetter_ext = strtolower(end($bursaryLetter_ext));
    if(!in_array($bursaryLetter_ext, $allowedFormat)){
      exit("Wrong document format. Please only upload the following formats:jpg,png and jpeg");
    }else if($bursaryLetter_size > 2000000){
      exit("The size is too large. The allowed maximum size is 2MB");      
    }else{
      $newDocsName = $nameUser. '-' . 'Bursary Letter' . '-' . date('Y-m-d') . '-' . date('H.i.s') . '-'  . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . '.' .$bursaryLetter_ext;
    
      $StoreUpload = "INSERT INTO documents(email, full_name, file_name, upload_name) VALUES ('$email', '$nameUser', '$bursaryLetter_name', '$newDocsName')";
      if(mysqli_query($conn, $StoreUpload)){
        $moveproof = move_uploaded_file($tmpbursaryLetter, '../upload/' . $newDocsName);
      }
    }
  }
  //Query the database
  $sql = "INSERT INTO student_application (id_number,first_name,last_name, email, phone, gender, race, institution, course, year_of_study, study_completion_date, funding_type, student_number, referral_code, street, city, province, postal_code, country, kin_name, kin_number, application_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  //initialize the prepared statement object
  $stmt = mysqli_stmt_init($conn);

  //checking if the prepared statement succeeded. it will return true if it succeeded and false otherwise and we check for false
  if(!mysqli_stmt_prepare($stmt, $sql)){
    //kill the connection because syntax errors got caught
    exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
  }

  //if no syntax errors got caught, we bind the prepared statement object $stmt with the data we need to store in the database
  //Hashing password before storing
  $status = "Processing";
  mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", $id_number, $first_name, $last_name, $email, $phone, $gender, $race, $institution, $course, $studyYear, $completion_year,  $funding, $student_number, $referral_code, $street, $city, $province, $postal_code, $country, $kin_name, $kin_phone, $status);

  //Store the residence information
  $message = "We are still processing your application";
  $query = "INSERT INTO residence_application (id_number, Residence_address, Room_number, status, message) VALUES (?,?,?,?,?)";
  $stmt2 = mysqli_stmt_init($conn);
  $StoreFirstChoice = false;
  $StoreSecondChoice = true;
  $StoreThirdChoice = true;
  if(!mysqli_stmt_prepare($stmt2, $query)){
    //kill the connection because syntax errors got caught
    exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
  }

  if(!empty($_POST['firstchoice']) && !empty($_POST['roomchoice1'])){
    
    $firstchoice_res =  mysqli_real_escape_string($conn, trim($_POST['firstchoice']));
    $firstchoice_room =  mysqli_real_escape_string($conn, trim($_POST['roomchoice1']));
    mysqli_stmt_bind_param($stmt2, "sssss", $id_number, $firstchoice_res, $firstchoice_room, $status, $message);
    $StoreFirstChoice = mysqli_stmt_execute($stmt2);
  }
  if(!empty($_POST['secondchoice']) && !empty($_POST['roomchoice2'])){
    $message="";
    $secondchoice_res =  mysqli_real_escape_string($conn, trim($_POST['secondchoice']));
    $secondchoice_room =  mysqli_real_escape_string($conn, trim($_POST['roomchoice2']));
    mysqli_stmt_bind_param($stmt2, "sssss", $id_number, $secondchoice_res, $secondchoice_room, $status, $message);
    $StoreSecondChoice = mysqli_stmt_execute($stmt2);
  }
  if(!empty($_POST['thirdchoice']) && !empty($_POST['roomchoice3'])){
    $message="";
    $thirdchoice_res =  mysqli_real_escape_string($conn, trim($_POST['thirdchoice']));
    $thirdchoice_room =  mysqli_real_escape_string($conn, trim($_POST['roomchoice3']));
    mysqli_stmt_bind_param($stmt2, "sssss", $id_number, $thirdchoice_res, $thirdchoice_room, $status, $message);
    $StoreThirdChoice = mysqli_stmt_execute($stmt2);
  }
  //Execute the prepared statement and store the results
  if(mysqli_stmt_execute($stmt) && $StoreFirstChoice && $StoreSecondChoice && $StoreThirdChoice){

    //Update the applied column if the user finished applying
    if($_SESSION['role'] =='dual-student'){
      $sql = "UPDATE registration SET applied = 'Yes' WHERE email='$email' AND role = 'student' ";
      mysqli_query($conn, $sql);

    }else if($_SESSION['role'] == 'dual-recruiter'){
      $sql = "UPDATE registration SET applied = 'Yes' WHERE email='$email' AND role = 'recruiter'";
      mysqli_query($conn, $sql);
    }else if($_SESSION['role'] == 'recruiter'){
      $sql = "UPDATE registration SET applied = 'Yes' WHERE email='$email' AND role = 'recruiter'";
      mysqli_query($conn, $sql);
    }else if($_SESSION['role'] == 'student'){
      $sql = "UPDATE registration SET applied = 'Yes' WHERE email='$email' AND role = 'student'";
      mysqli_query($conn, $sql);
    }

    $text = mysqli_real_escape_string($conn, "Hi<br/><br/>We have recieved your residence application. Please keep checking your application status under <strong style='font-weight:bold'>APPLICATIONS</strong> on your profile.<br/><br/> Thank you for taking interest in us. <br/><br/> Regards<br/><br/>StudentINN");
    mysqli_query($conn, "INSERT INTO messages(email, message, read_) VALUES ('$email','$text', 0)");

    sendMail("$first_name", "$last_name", "$email");
    exit("success");
    
  }else{
    exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
  }

}

function sendMail($first_name, $last_name, $email){

  $to = $email;
  $subject = "Residence Application";
  $message ="
Dear " . $first_name . " " . $last_name . '
  
We have received your residence application. We will process your application as soon as possible.
  
Keep on checking your status under APPLICATIONS on your profile.
  
Thank you for taking interest in us.
  
Regards
  
StudentInn Management Team';
  $headers = "Management Team";
  mail($to, $subject, $message);
}

