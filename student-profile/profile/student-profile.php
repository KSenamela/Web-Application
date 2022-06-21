<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="nostudent-profile,nofollow">
    <title>Student Profile</title>
    <!-- Font Awesome-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- StudentInn icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Studentinn.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">

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
                    <a class="navbar-brand" href="/officialwebsite/index.php">
                        <img src="../assets/images/Studentinn.png"  width="60%" alt="homepage" class="dark-logo" />
                    </a>
                </div>
                
                <!-- End Logo -->
                
                <div class="navbar-collapse">
                    
                    <!-- toggle and nav items -->
                    
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                
                    </ul>
                    
                    <!-- User profile and search -->
                    
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- Profile -->
                        
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/users/Profile.jpeg" alt="user" class="" /> <span
                                    class="hidden-md-down">Klaas Senamela &nbsp;</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- End Topbar header -->
        
        
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        fa-folder-open
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
                        <li> <a class="waves-effect waves-dark" href="applications.html" aria-expanded="false">
                            <i class="fa-solid fa-folder-open"></i>
                            <span class="hide-menu">Applications</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="payments.html" aria-expanded="false">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <span class="hide-menu">Payments</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="messages.html" aria-expanded="false">
                        <i class="fa-solid fa-message"></i>
                        <span class="hide-menu">Messages</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark nav-link" href="/officialwebsite/application-forms/res-form.php" aria-expanded="false">
                            <i class="fa-solid fa-file-lines"></i>

                            <span class="hide-menu">Apply!</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark nav-link sb-nav-link-icon" href="/officialwebsite/server/logout.php">
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
                        <h3 class="text-themecolor">Home</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
    
                </div>
                
                <!-- End Bread crumb and right sidebar toggle -->
                
                
                <!-- Start Page Content -->
                
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="mt-4"> <img src="../assets/images/users/Profile.jpeg" class="img-circle"
                                        width="150" />
                                    <h2 class="card-title mt-2">Klaas Senamela</h4>
                                    <h4 class="card-subtitle">Role: Student</h6>
                                    <h4 class="card-subtitle">Application Status: <small style="color: orange; font-weight: bold; font-size: 16px">Pending</small> </h6>

                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material mx-2">
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Klaas"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="Senamela"
                                                class="form-control form-control-line" name="example-email"
                                                >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="klaassenamelaa@gmail.com"
                                                class="form-control form-control-line" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="063 434 8671"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Institution</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="University of Johannesburg"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                         
                                    <div class="form-group">
                                        <label class="col-md-12">Recruiter's Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Donald Mohlala"
                                                class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                
                <!-- End PAge Content -->
                
            </div>
            
            <!-- End Container fluid  -->
            
            
            <!-- footer -->
            
            <footer class="footer"> © 2022 Falcon Tech Division by <a href="https://www.falcontechdiv.com">FalconTechDiv.com</a> </footer>
            
            <!-- End footer -->
            
        </div>
        
        <!-- End Page wrapper  -->
        
    </div>
    
    <!-- End Wrapper -->
    
    
    <!-- All Jquery -->
    
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>