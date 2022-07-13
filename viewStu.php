<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_GET['view'])){

    $view = $_GET['view'];
    $sql = "SELECT * FROM student_application WHERE id_number = '$view'";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      
      $data = array(
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'id_number' => $row['id_number'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'gender' => $row['gender'],
        'race' => $row['race'],
        'institution' => $row['institution'],
        'course' => $row['course'],
        'year_of_study' => $row['year_of_study'],
        'study_completion_date' => $row['study_completion_date'],
        'funding_type' => $row['funding_type'],
        'student_number' => $row['student_number'],
        'referral_code' => $row['referral_code'],
        'street' => $row['street'],
        'city' => $row['city'],
        'province' => $row['province'],
        'postal_code' => $row['postal_code'],
        'country' => $row['country'],
        'kin_name' => $row['kin_name'],
        'kin_number' => $row['kin_number']

      );
      //get values from the residence application table for the given id number
      $query = "SELECT * FROM residence_application WHERE id_number = '$view'";
      $run_query = mysqli_query($conn, $query);

      //create 2 array, one for res address and one for room numbers
      $index = 0;
      $resChoices = ['first_res_choice', 'second_res_choice', 'third_res_choice'];
      $roomChoices = ['first_room_choice', 'second_room_choice', 'third_room_choice'];

      foreach ($run_query as $value){
        $data[$resChoices[$index]] = $value['residence_address'];
        $data[$roomChoices[$index]] = $value['room_number'];
        $index++;
      }


   }

    exit(json_encode($data));
  }