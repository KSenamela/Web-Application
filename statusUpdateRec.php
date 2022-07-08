<?php
    error_reporting(0);
    session_start();
    include './server/dbconnect_server.php';
    // Updating status on the database 
    if(isset($_GET['accept'])){
      $status = 'Accepted';
      $id_number = $_GET['accept'];
      
      $query = "UPDATE recruiter_application SET application_status = '$status' WHERE id_number = '$id_number'";

      if(mysqli_query($conn, $query)){
        exit('success');
      }
    }
    
    if(isset($_GET['reject'])){
      $status = 'Unsuccessful';
      $id_number = $_GET['reject'];
      
      $query = "UPDATE recruiter_application SET application_status = '$status' WHERE id_number = '$id_number'";

      if(mysqli_query($conn, $query)){
        exit('success');
      }
    }


