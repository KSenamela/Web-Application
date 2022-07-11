<?php

  // error_reporting(0);
  session_start();
  include './server/dbconnect_server.php';

  if(isset($_GET['delete'])){

    $id_number = $_GET['delete'];
    
    $deleteRecord = "DELETE FROM student_application WHERE id_number = '$id_number'";
    $deleteResidence = "DELETE FROM residence_application WHERE id_number = '$id_number'";

    if(mysqli_query($conn, $deleteRecord) && mysqli_query($conn,$deleteResidence)){
      exit('success');
    }

  }