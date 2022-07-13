<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_GET['delete'])){
    $retrieved = explode('.', $_GET['delete']);
    $id_number = $retrieved[0];
    $date = end($retrieved);
    
    $deleteRecord = "DELETE FROM payment_request WHERE id_number = '$id_number' AND payment_request_date = '$date'";
    
    $query = "SELECT * FROM payment_request WHERE id_number = '$id_number'";
    $result = mysqli_query($conn, $query);

    if($result->num_rows > 0) {
      foreach ($result as $row) {
        if ($row['payment_request_date'] == $date) {
          if(mysqli_query($conn, $deleteRecord)){
            exit('success');
          }
        }
      }
    }
  }

  if(isset($_GET['deleteStu'])){
    $retrieved = explode('.', $_GET['deleteStu']);
    $id_number = $retrieved[0];
    $date = end($retrieved);
    
    $deleteRecord = "DELETE FROM payments WHERE id_number = '$id_number' AND month = '$date'";
    
    $query = "SELECT * FROM payments WHERE id_number = '$id_number'";
    $result = mysqli_query($conn, $query);

    if($result->num_rows > 0) {
      foreach ($result as $row) {
        if ($row['month'] == $date) {
          if(mysqli_query($conn, $deleteRecord)){
            exit('success');
          }
        }
      }
    }
  }