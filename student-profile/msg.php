<?php
  // error_reporting(0);
  session_start();
  include "../server/dbconnect_server.php";
  $email = $_SESSION['email'];

  if(isset($_POST['msg'])){

    if(mysqli_query($conn, "UPDATE messages SET read_= 1 WHERE email = '$email'")){
      exit();
    }else{
      exit('Something went wrong');
    }
    
  }