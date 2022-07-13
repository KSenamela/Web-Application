<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
  //accept payment requests
  if(isset($_GET['Yes'])){
    $retrieved = explode('.', $_GET['Yes']); 
    $id_number = $retrieved[0];
    $month = end($retrieved);

    $approvalUpdate = "SELECT * FROM payments WHERE id_number = '$id_number'";
    $approveQuery = mysqli_query($conn, $approvalUpdate);

    if($approveQuery->num_rows > 0){
      foreach($approveQuery as $row){
        if($row['month'] == $month){
          if(mysqli_query($conn, "UPDATE payments SET approved = 'Yes' WHERE id_number = '$id_number' AND month = '$month'")){
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
    $month = end($retrieved);

    $approvalUpdate = "SELECT * FROM payments WHERE id_number = '$id_number'";
    $approveQuery = mysqli_query($conn, $approvalUpdate);

    if($approveQuery->num_rows > 0){
      foreach($approveQuery as $row){
        if($row['month'] == $month){
          if(mysqli_query($conn, "UPDATE payments SET approved = 'No' WHERE id_number = '$id_number' AND month = '$month'")){
            exit('success');
          }
        }
      }

    }
  }