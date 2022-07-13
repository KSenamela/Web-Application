<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_GET['delete'])){

    $id_number = $_GET['delete'];

    $deleteRecord = "DELETE FROM recruiter_application WHERE id_number = '$id_number'";
    $deletePayments = "DELETE FROM payment_request WHERE id_number = '$id_number'";
    
    mysqli_query($conn, "UPDATE registration SET applied = 'No' WHERE id_number = '$id_number'");
    mysqli_query($conn, $deletePayments);

    if(mysqli_query($conn, $deleteRecord)){
      exit('success');
    }

  }