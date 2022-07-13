<?php
  session_start();
//Recruiter application
  if (isset($_POST['firstname'])) {
    insertAll();
  }

function insertAll(){
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };


  $id_number =  mysqli_real_escape_string($conn, trim($_POST['idnumber']));
  $first_name = mysqli_real_escape_string($conn, trim($_POST['firstname']));
  $last_name =  mysqli_real_escape_string($conn, trim($_POST['lastname']));
  $email =  mysqli_real_escape_string($conn, trim($_POST['email']));
  $phone=  mysqli_real_escape_string($conn, trim($_POST['phonenumber']));
  $gender =  mysqli_real_escape_string($conn, trim($_POST['gender'])); 
  $race =  mysqli_real_escape_string($conn, trim($_POST['race']));

  $street =  mysqli_real_escape_string($conn, trim($_POST['street']));
  $city =  mysqli_real_escape_string($conn, trim($_POST['city']));
  $province =  mysqli_real_escape_string($conn, trim($_POST['province']));
  $postal_code  =  mysqli_real_escape_string($conn, trim($_POST['postal']));
  $country =  mysqli_real_escape_string($conn, trim($_POST['country']));
  $kin_name =  mysqli_real_escape_string($conn, trim($_POST['kinname']));
  $kin_phone = mysqli_real_escape_string($conn, trim($_POST['kinphone']));

  //Query the database
  $sql = "INSERT INTO recruiter_application (id_number,first_name,last_name, email, phone, gender, race, referral_code, street, city, province, postal_code, country, kin_name, kin_number, application_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  //initialize the prepared statement object
  $stmt = mysqli_stmt_init($conn);

  //checking if the prepared statement succeeded. it will return true if it succeeded and false otherwise and we check for false
  if(!mysqli_stmt_prepare($stmt, $sql)){
    //kill the connection because syntax errors got caught
    exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
  }

  //if no syntax errors got caught, we bind the prepared statement object $stmt with the data we need to store in the database
  
  $status = "Processing";
  $referral_code = $first_name[0] . $last_name[0] . $id_number[0] . $id_number[1] . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
  mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $id_number, $first_name, $last_name, $email, $phone, $gender, $race, $referral_code, $street, $city, $province, $postal_code, $country, $kin_name, $kin_phone, $status);

  //Execute the prepared statement and store the results
  if(mysqli_stmt_execute($stmt)){
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

    exit("success");
    
  };

  exit('failed');
}

