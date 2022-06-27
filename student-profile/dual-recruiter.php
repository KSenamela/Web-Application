<?php 
    // error_reporting(0);
    session_start();
    include "../server/dbconnect_server.php";
    

    if (isset($_SESSION['email'])) {
        if($_SESSION['role'] != 'dual-recruiter'){
            header('Location: ../login.php');
            exit;
        }
        //Check if the logged in user has already applied and hide the apply link if they already did
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM registration WHERE email='$email' AND role='recruiter'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['applied'] = $row['applied'];
    }else{
        header('Location: ../login.php');
        exit;
    }

    $query = "SELECT * FROM recruiter_application WHERE email='$email'";
    $run_query = mysqli_query($conn, $query);
    if($run_query ->num_rows > 0){
      $data = mysqli_fetch_assoc($run_query );
  
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Profile</title>
    <!-- Font Awesome-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- StudentInn icon -->
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
    <small><?php $_SESSION['role']?></small>
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
                                    class="hidden-md-down"><?php echo $_SESSION['fullname'] ?> &nbsp;</span> </a>
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
                        <li> <a class="waves-effect waves-dark" href="#" aria-expanded="false">
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
                            <div class="nav-link hide-menu" href="../application-forms/res-form.php" aria-expanded="false">
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

     
                            </div>
                        </li>
                        <li> <a class="waves-effect waves-dark nav-link sb-nav-link-icon" href="../server/logout.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="hide-menu">Logout</span>
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
                                <center class="mt-4"> <img src="./assets/images/users/Profile.jpeg" class="img-circle"
                                        width="150" />
                                    <h2 class="card-title mt-2"><?php echo $_SESSION['fullname'] ?></h2>
                                    <h4 class="card-subtitle">Role: <small style="color: skyblue; font-weight: bold; font-size: 16px">Recruiter</small></h4>
                                    <?php
                                    if($data['application_status'] == 'Accepted'){
                                        ?>
                                         <h4 class="card-subtitle">Application Status: <small style="color: #4DED30; font-weight: bold; font-size: 16px"><?php echo $data['application_status'] ?></small> </h6>
                                        <?php
                                    }else if($data['application_status'] == 'Unsuccessful'){
                                        ?>
                                        <h4 class="card-subtitle">Application Status: <small style="color: #FF7F7F; font-weight: bold; font-size: 16px"><?php echo $data['application_status'] ?></small> </h6>
                                       <?php
                                    }else{
                                        ?>
                                         <h4 class="card-subtitle">Application Status: <small style="color: orange; font-weight: bold; font-size: 16px"><?php echo $data['application_status'] ?></small> </h6>
                                        <?php
                                    }
                                    ?>
                                    <h6 style="color: #455a64; font-weight: 500; font-size: 15px">Referral code: <small style="color: skyblue; font-weight: bold; font-size: 16px"><?php echo $data['referral_code']?></small></h6>

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
                                            <input type="text" placeholder="Klaas" value="<?php echo $_SESSION['firstname'] ?>"
                                                class="form-control form-control-line" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Senamela" value="<?php echo $_SESSION['lastname'] ?>"
                                                class="form-control form-control-line" name="example-email" readonly
                                                >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $_SESSION['email'] ?>"
                                                class="form-control form-control-line" id="email">
                                        </div>
                                    </div>
                                    <?php
                                        if($_SESSION['applied'] == 'Yes'){
                                            ?> 
                                            
                                                <div class="form-group">
                                                    <label class="col-md-12">Phone No</label>
                                                    <div class="col-md-12">
                                                        <input 
                                                        type="text" placeholder="063 434 8671"
                                                        class="form-control form-control-line"
                                                        value="<?php echo $data['phone']?>"
                                                        >
                                                    </div>
                                                </div>
                                                                               
                                            <?php

                                        }
                                    ?>

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
        });
    </script>
</body>

</html>