<?php
  // error_reporting(0);
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

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