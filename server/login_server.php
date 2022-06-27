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
    if ($result->num_rows > 1){

      $sql = "SELECT * FROM registration WHERE email='$email' AND role='$role'";
      $result = mysqli_query($conn, $sql);
      
      if ($result->num_rows > 0) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password']) && $row['role'] == $role) {

          if($row['role'] == 'student'){
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['lastname'] = $row['last_name'];
            $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['role'] = 'dual-student';
            $_SESSION['userId'] = $row['id'];
            $_SESSION['applied'] = $row['applied'];
            $_SESSION['password'] = $row['password'];

            exit($_SESSION['role']);
          }else if($row['role'] == 'recruiter'){
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['first_name'];
            $_SESSION['lastname'] = $row['last_name'];
            $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['role'] = 'dual-recruiter';
            $_SESSION['userId'] = $row['id'];
            $_SESSION['applied'] = $row['applied'];
            $_SESSION['password'] = $row['password'];
            
            exit($_SESSION['role']);
          }
          else{
            exit('<div class="alert alert-danger">Entered email, password or role is incorrect!</div>');
          }
         
        }
        else{
          exit('<div class="alert alert-danger">Entered email, password or role is incorrect!</div>');
        }
      }
      else{
        exit('<div class="alert alert-danger">Entered email, password or role is incorrect!</div>');
      }
    }
    else if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password']) && $row['role'] == $role) {

        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['last_name'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['userId'] = $row['id'];
        $_SESSION['applied'] = $row['applied'];
        $_SESSION['password'] = $row['password'];

        exit($row['role']);
      }
      else {
        exit('<div class="alert alert-danger">Entered email, password or role is incorrect!</div>');
      }
    }
    else {
      exit('<div class="alert alert-danger">Entered email, password or role is incorrect!</div>');
    }

}