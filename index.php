<?php
 error_reporting(0);

 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./fontawesome/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Studentinn-icon.png">

    <title>Student-INN</title>
</head>

<body>
    <div class="container-main container-fluid position-relative p-0">
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
            <nav class="navbar navbar-expand-lg navbar-light bg-white ">
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
                                <a class="nav-link" href="index.php">Home</a>
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

        <div class="main-content min-vh-100 bg-cover d-flex align-items-center">
<div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="text-uppercase text-white my-3 display-2">Welcome To Student-INN</h1>
                        <h5 class="text-white">Your new home with the best Res Life experience!</h5>
                        <a href="register.php" class="btn btn-hero my-3">Register</a>
                        <a href="login.php" class="btn btn-hero ms-md-3" style="padding: 9px 36px !important;">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-img position-absolute end-0 top-0 start-0 bottom-0">

        </div>
        </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./js/nav.js"></script>
    <script src="./js/register-validation.js"></script>
    <script src="./js/login-validation.js"></script>
    

</body>

</html>
