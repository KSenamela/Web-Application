<?php

  //This file connects to the database, it must be called first before storing anything in the database
  include "./dbconnect_server.php";

  if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,strtolower(trim($_POST['emailPHP'])));
    $password = trim($_POST['passwordPHP']);
    $role = strtolower(trim($_POST['role_valuePHP']));
   

      //validate email address
    if(empty($email)){
      exit('<div class="alert alert-danger">Email is required</div>');
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      exit('<div class="alert alert-danger">Please enter a valid email</div>');
    }else if(strlen($email) > 100){
      exit('<div class="alert alert-danger">Email is too long!</div>');
    }

     // Prepared statement
     $sql = "SELECT * FROM registration WHERE email='$email'";
     $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password']) && $row['role'] == $role) {

        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['userId'] = $row['id'];

        echo $row['role'];
      }else {
        echo '<div class="alert alert-danger">Entered email, password or role is incorrect!</div>';
      }
      
      // header("Location: i");
    } else {
      echo'<div class="alert alert-danger">Entered email, password or role is incorrect!</div>';
    }

}


