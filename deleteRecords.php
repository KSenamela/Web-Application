<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_GET['delete'])){

    $id_number = $_GET['delete'];

    $deleteRecord = "DELETE FROM student_application WHERE id_number = '$id_number'";
    $deleteResidence = "DELETE FROM residence_application WHERE id_number = '$id_number'";
    $deletePayments = "DELETE FROM payments WHERE id_number = '$id_number'";

    //Reset applied to No, since the application got deleted
    mysqli_query($conn, "UPDATE registration SET applied = 'No' WHERE id_number = '$id_number'");
    //delete all payment requests
    mysqli_query($conn,$deletePayments);

    if(mysqli_query($conn, $deleteRecord) && mysqli_query($conn,$deleteResidence)){
      exit('success');
    }

  }