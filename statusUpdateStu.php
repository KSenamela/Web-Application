<?php
    error_reporting(0);
    session_start();
    include './server/dbconnect_server.php';
    // Updating status on the database 
    if(isset($_GET['accept'])){
      $retrieved = explode(".", $_GET['accept']);
      $id_number =$retrieved[0];
      $address = $retrieved[1];
      $room = end($retrieved);

      //get the rows  of the residence application associated with the id number
      $query = "SELECT * FROM residence_application WHERE id_number = '$id_number'";
      $result = mysqli_query($conn, $query);

      foreach($result as $row){
        $residence_address = $row['residence_address'];
        $room_number = $row['room_number'];
        
        if($residence_address == $address && $room_number == $room){
          // Change status to accepted on the address admin chose to approve
          $status = 'Accepted';
          $congrats = 'Congratulations! Please set a date you wish to move in under MOVE-IN SHEDULE on your profile. We look forward to seeing you soon.';
          $update_res_appTB_Accepted = "UPDATE residence_application SET status = '$status', message='$congrats' WHERE id_number = '$id_number' AND residence_address = '$address' AND room_number = '$room'";
          mysqli_query($conn, $update_res_appTB_Accepted);
        }else{
          // When the admin accepts one address, this code updates status to unsuccessful to other addresses
          $status_reject = 'Unsuccessful';
          $regret = "Unfortunately due to space constraints, we could not approve your application.";

          $update_res_appTB_Rejected = "UPDATE residence_application SET status = '$status_reject', message='$regret' WHERE id_number = '$id_number' AND residence_address = '$residence_address' AND room_number = '$room_number'";
          mysqli_query($conn, $update_res_appTB_Rejected);

        }
      }

      //Update status in the student application table, to display the status on the student's profile
      $query = "UPDATE student_application SET application_status = '$status' WHERE id_number = '$id_number'";

      if(mysqli_query($conn, $query)){
        exit('success');
      }
    }
    
    if(isset($_GET['reject'])){
      $retrieved = explode(".", $_GET['reject']);
      $id_number =$retrieved[0];
      $address = $retrieved[1];
      $room = end($retrieved);
      $test_status = 0;
      //get the rows  of the residence application associated with the id number
      $query = "SELECT * FROM residence_application WHERE id_number = '$id_number'";
      $result = mysqli_query($conn, $query);

      foreach($result as $row){

        $residence_address = $row['residence_address'];
        $room_number = $row['room_number'];

        if($residence_address == $address && $room_number == $room){
          $status_reject = 'Unsuccessful';
          $regret = "Unfortunately due to space constraints, we could not approve your application.";

          $update_res_appTB_Rejected = "UPDATE residence_application SET status = '$status_reject', message='$regret' WHERE id_number = '$id_number' AND residence_address = '$address' AND room_number = '$room'";
          mysqli_query($conn, $update_res_appTB_Rejected);
        }


      }

      $query = "SELECT * FROM residence_application WHERE id_number = '$id_number'";
      $result = mysqli_query($conn, $query);
      foreach($result as $row){
        if($row['status'] == 'Accepted' || $row['status'] == 'Processing'){
          $test_status = 1;
        }
      }

      if($test_status == 0){
        
        $status = 'Unsuccessful';
        $query = "UPDATE student_application SET application_status = '$status' WHERE id_number = '$id_number'";
        mysqli_query($conn, $query);
      }

      
      exit('success');

      // if(mysqli_query($conn, $query)){
      // }
    }


