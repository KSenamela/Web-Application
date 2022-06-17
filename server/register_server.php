<?php
include "./dbconnect_server.php";


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


  try{
    $sql = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      exit('<div class="alert alert-danger">Email address already exists</div>');

    }
    }catch(e){
      exit('<div class="alert alert-danger">Oops! something went wrong, Please try again.</div>');
    }
  //Query the database
  $sql = "INSERT INTO registration (first_name,last_name, email, password, role) VALUES (?, ?, ?, ?, ?)";
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
  mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $hashed_password, $role);

  //Execute the prepared statement and store the results
  if(mysqli_stmt_execute($stmt)){
    exit("success");
    
  };

  exit('failed');

}