<?php
 session_start();
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
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Authorization</title>
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
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#home ">Recruiter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#home ">Rooms</a>
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