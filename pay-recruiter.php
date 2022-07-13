<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
  //accept payment requests
  if(isset($_GET['Yes'])){
    $retrieved = explode('.', $_GET['Yes']); 
    $id_number = $retrieved[0];
    $date = end($retrieved);

    $approvalUpdate = "SELECT * FROM payment_request WHERE id_number = '$id_number'";
    $approveQuery = mysqli_query($conn, $approvalUpdate);

    if($approveQuery->num_rows > 0){
      foreach($approveQuery as $row){
        if($row['payment_request_date'] == $date){
          if(mysqli_query($conn, "UPDATE payment_request SET approved = 'Yes' WHERE id_number = '$id_number' AND payment_request_date = '$date'")){
            exit('success');
          }
        }
      }

    }
  }
  //Reject payment request
  if(isset($_GET['No'])){
    $retrieved = explode('.', $_GET['No']); 
    $id_number = $retrieved[0];
    $date = end($retrieved);

    $approvalUpdate = "SELECT * FROM payment_request WHERE id_number = '$id_number'";
    $approveQuery = mysqli_query($conn, $approvalUpdate);

    if($approveQuery->num_rows > 0){
      foreach($approveQuery as $row){
        if($row['payment_request_date'] == $date){
          if(mysqli_query($conn, "UPDATE payment_request SET approved = 'No' WHERE id_number = '$id_number' AND payment_request_date = '$date'")){
            exit('success');
          }
        }
      }

    }
  }