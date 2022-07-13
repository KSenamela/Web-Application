<?php
session_start();
  //This file connects to the database, it must be called first before storing anything in the database
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_POST['switch'])){
    if($_POST['switch'] == '1'){
      $email = $_SESSION['email'];
      $sql = "SELECT * FROM registration WHERE email='$email' AND role='student'";
      $result = mysqli_query($conn, $sql);

      if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);

        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['role'] = 'dual-student';
        $_SESSION['userId'] = $row['id'];
        $_SESSION['applied'] = $row['applied'];
        exit(1);

      }
    }

    if($_POST['switch'] == '2'){
      $email = $_SESSION['email'];
      $sql = "SELECT * FROM registration WHERE email='$email' AND role='recruiter'";
      $result = mysqli_query($conn, $sql);

      if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);

        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['role'] = 'dual-recruiter';
        $_SESSION['userId'] = $row['id'];
        $_SESSION['applied'] = $row['applied'];
        exit(1);
      }
    }
}