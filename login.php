<?php
 error_reporting(0);

 session_start();
     // We need to use sessions, so you should always start sessions using the below code.
     $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

     if (!$conn){
       die("Could not connect:" . mysqli_error());
     }
   
     //If the user is not logged in redirect to the login page...

 if (isset($_SESSION['email'])) {
     if($_SESSION['role'] == 'admin'){
         header('Location: ./admin.php');
     }
     else if($_SESSION['role'] == 'dual-student'){
         header('Location: ./student-profile/dual-student.php');
     }
     else if($_SESSION['role'] == 'dual-recruiter'){
         header('Location: ./student-profile/dual-recruiter.php');
     }
     else if($_SESSION['role'] == 'student'){
         header('Location: ./student-profile/student-profile.php');
     }else if($_SESSION['role'] == 'recruiter'){
         header('Location: ./student-profile/recruiter-profile.php');
     }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./fontawesome/css/all.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Studentinn-icon.png">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>

<body class="min-vh-100 d-flex">
    <div class="container-main container-fluid position-relative p-0 flex-grow-1 d-flex">
        <header class="navigation fixed-top">
            <div class="contact-info d-md-flex d-none flex-row container mx-auto py-2 justify-content-between">
                <div class="left d-flex flex-row col-auto ">
                    <p class="mx-2 my-0">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@studentInn.co.za</span>
                    </p>
                    <p class="mx-2 my-0">
                        <i class="fa-solid fa-phone"></i>
                        <span>0634348671</span>
                    </p>
                </div>
                <div class="right col-auto">
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="container mh-50 overflow-auto">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/Studentinn.png" alt="logo" width="60px" height="60px" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Recruiter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./contact-us/contact-us.php">Contact Us</a>
                            </li>
                            <?php

                                if(isset($_SESSION['email'])){

                                    ?>

                                         <li class="nav-item">
                                            <a class="nav-link" href="./login.php"><i class="fa-solid fa-user-large pe-2"></i>My Account</a>
                                        </li>

                                         <a href="./server/logout.php" class="btn btn-brand ms-lg-3">Logout</a>
                                        </ul>
                                    <?php
                                }else{
                                    ?>
  
                                        <a href="./login.php" class="btn btn-brand ms-lg-3">Login</a>
                                        </ul>
                                    <?php
                                }
                            ?>
                    </div>
                </div>
            </nav>
        </header>

        <div class="main-content d-flex flex-grow-1">

            <div class="left flex-grow-1 image-box position-relative">
                <div class="image-filter position-absolute"></div>
                <div class="image-bg position-absolute" id="insertImgSlide"
                    style="background-image: url(./img/bathroom.jpg);">

                </div>
            </div>
            <div class="right w-50 d-flex justify-content-center align-items-center">
                <div class="formBx">
                    <h2>Login</h2>
                    <small id="reply-msg"></small>
                    <form >
                        <!-- Username textbox -->
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="text" id="username">
                            <span id="email_error" class="error-message"></span>
                        </div>
                        <!-- Password textbox -->
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password" id="pwd">
                            <span id="pwd_error" class="error-message"></span>
                        </div>
                        <!-- drop down -->
                        <div class="myradio-btn">
                            <span>I am signing in as a:</span>
                            <div class="radio-btn">
                                <input type="radio" class="input-radio-btn" id="optionRadio1" value="student" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio1">Student</label>
                                <input type="radio" class="input-radio-btn" id="optionRadio2" value="recruiter" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio2">Recruiter</label>
                                <input type="radio" class="input-radio-btn" id="optionRadio3" value="admin" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio3">Admin</label>
                            </div>
                            <span id="radio_error" class="error-message" style="color:red;display: inline-block; font-size:14px"></span>
                        </div>
                   
                        <!-- submit button/Login button -->
                        <div class="inputBx">
                            <input type="button" value="Sign in" id="btn-login">
                        </div>
                        <!-- Sign up link -->
                        <div class="inputBx">
                            <p>Don't have an account? <a href="register.php">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./js/nav.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/login-validation.js"></script>

    

</body>

</html>