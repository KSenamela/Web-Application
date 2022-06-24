<?php 
    error_reporting(0);
    session_start();
    include "../server/dbconnect_server.php";

    if (isset($_SESSION['email'])) {
        if(!$_SESSION['role'] == 'student' && !$_SESSION['role'] == 'recruiter' && !$_SESSION['role'] == 'dual-recruiter' && !$_SESSION['role'] == 'dual-student'){
            header('Location: ../login.php');
        }
    }else{
        header('Location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Studentinn icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/Studentinn-icon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./profile/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="./profile/css/colors/default.css" id="theme" rel="stylesheet">
    <style>

        .msg-badge {
        background: red;
        color: #fff;
        font-size: 10px;
        padding: 5px;
        border-radius: 3px;
    
        }
    
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">
    
    <!-- Preloader - style you can find in spinners.css -->
    
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Student Inn</p>
        </div>
    </div>
    
    <!-- Main wrapper - style you can find in pages.scss -->
    
    <div id="main-wrapper">
        
        <!-- Topbar header - style you can find in pages.scss -->
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                
                <!-- Logo -->
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">
                        <img src="./assets/images/Studentinn.png"  width="60%" alt="homepage" class="dark-logo" />
                    </a>
                </div>
                
                <!-- End Logo -->
                
                <div class="navbar-collapse">
                    
                    <!-- toggle and nav items -->
                    
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>

                    </ul>
                    
                    <!-- User profile and search -->
                    
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="./assets/images/users/Profile.jpeg" alt="user" class="" /> <span
                                    class="hidden-md-down">Klaas Senamela &nbsp;</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- End Topbar header -->
        
        
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="student-profile.php" aria-expanded="false">
                            <i class="fa-solid fa-user-large"></i>
                            <span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="applications.php" aria-expanded="false">
                            <i class="fa-solid fa-folder-open"></i>
                            <span class="hide-menu">Applications</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="payments.php" aria-expanded="false">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <span class="hide-menu">Payments</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="messages.php" aria-expanded="false">
                        <i class="fa-solid fa-message"></i>
                        <span class="hide-menu">Messages</span> <span class="msg-badge">255</span></a>
                        </li>
                        <?php 

                            if ( $_SESSION['applied'] == 'No') {
                                ?> 
                                    <li> <a class="waves-effect waves-dark nav-link" href="../application-forms/res-form.php" aria-expanded="false">
                                        <i class="fa-solid fa-file-lines"></i>

                                        <span class="hide-menu">Apply</span></a>
                                    </li>                                
                                <?php
                            }
                        ?>
                        <li> 
                            <div class="nav-link" href="../application-forms/res-form.php" aria-expanded="false">

                                <?php 
                                
                                if($_SESSION['role'] == 'dual-student'){
                                    ?> 
                                        <i class="fa-solid fa-repeat"></i>
                                        <span class="hide-menu">Switch Accounts</span>
                                        <form action="" method="post">
                                            <div class="waves-effect waves-dark nav-link sb-nav-link-icon">
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <input type="button" name= "student-acc" id="st-acc" value="Student Account" style="background: #fff; color:  #20aee3; border: none;">
                                            </div>
                                            <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                <i class="fa-solid fa-briefcase"></i>
                                                <input type="button" name= "Recruiter Account" id="re-acc" value="Recruiter Account" style="background: #fff; color: #787f91; border: none;">
                                            </div>

                                        </form>
                                    <?php
                                }
                                else if($_SESSION['role'] == 'dual-recruiter'){
                                    ?> 
                                        <i class="fa-solid fa-repeat"></i>
                                        <span class="hide-menu">Switch Accounts</span>
                                        <form action="" method="post">
                                            <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <input type="button" name= "student-acc" id="st-acc" value="Student Account" style="background: #fff; color: #787f91; border: none;">
                                            </div>
                                            <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                <i class="fa-solid fa-briefcase"></i>
                                                <input type="button" name= "Recruiter Account" id="re-acc" value="Recruiter Account" style="background: #fff; color: #20aee3; border: none;">
                                            </div>

                                        </form>
                                    <?php
                                }
                                ?>
                              
                        
                            </div>
                        </li>
                        <li> <a class="waves-effect waves-dark nav-link sb-nav-link-icon" href="../server/logout.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        
        
        <!-- Page wrapper  -->
        
        <div class="page-wrapper">
            
            <!-- Container fluid  -->
            
            <div class="container-fluid">
                
                <!-- Bread crumb and right sidebar toggle -->
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Messages</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
                        </ol>
                    </div>
   
                </div>
                
                <!-- End Bread crumb and right sidebar toggle -->
                
                
                <!-- Start Page Content -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                This is some text within a card block.
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- End PAge Content -->
                
                
                <!-- Right sidebar -->
                
                
                
            </div>
            
            <!-- End Container fluid  -->
            
            
            <!-- footer -->
            
            <footer class="footer"> © 2022 Falcon Tech Div by <a href="https://www.FalconTechDiv.com/">FalconTechDiv.com</a> </footer>
            
            <!-- End footer -->
            
        </div>
        
        <!-- End Page wrapper  -->
        
    </div>
    
    <!-- End Wrapper -->
    
    
    <!-- All Jquery -->
    
    <script src="./assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="./profile/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="./profile/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="./profile/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./profile/js/custom.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#st-acc").on("click", function(){
                $.ajax(
                    {
                        url: "./switch-accounts.php",
                        method: "POST",
                        data:{
                        switch: 1
                        },success: function(response){ window.location.href = "./dual-student.php";},
                        dataType: "text"
                    }
                );
            })
            $("#re-acc").on("click", function(){
                $.ajax(
                    {
                        url: "./switch-accounts.php",
                        method: "POST",
                        data:{
                        switch: 2
                        },success: function(response){ window.location.href = "./dual-recruiter.php";},
                        dataType: "text"
                    }
                );
            })
        });
    </script>
</body>

</html>