<?php
  // error_reporting(0);
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
  $email = $_SESSION['email'];

  if(isset($_POST['msg'])){

    if(mysqli_query($conn, "UPDATE messages SET read_= 1 WHERE email = '$email'")){
      exit();
    }else{
      exit('Something went wrong');
    }
    
  }