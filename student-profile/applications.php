<?php 
    error_reporting(0);
    session_start();
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    if (isset($_SESSION['email'])) {
        if(!$_SESSION['role'] == 'student' && !$_SESSION['role'] == 'recruiter' && !$_SESSION['role'] == 'dual-recruiter' && !$_SESSION['role'] == 'dual-student'){
            header('Location: ../login.php');
        }
    }else{
        header('Location: ../login.php');
    }

    $email = $_SESSION['email'];
    $query = "SELECT * FROM student_application WHERE email='$email'";
    $run_query = mysqli_query($conn, $query);
  
    if($run_query->num_rows > 0){
        $data = mysqli_fetch_assoc($run_query);
        $idnumber = $data['id_number'];
    }else{
        $query = "SELECT * FROM recruiter_application WHERE email='$email'";
        $run_query = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($run_query);
        $idnumber = $data['id_number'];
    }

    if($_SESSION['role'] =="dual-student"){
        $role = "student";
    }else if($_SESSION['role'] =="dual-recruiter"){
        $role = "recruiter";
    }else{
        $role = $_SESSION['role'];
    }
    $avatar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM avatar WHERE email='$email' AND role='$role'"));
  
    //reset message number on the badge after message link is clicked
    //RESET MESSAGE BADGE WHEN ROWS ARE 0 FOR READ = 0
    $msg_query = "SELECT * FROM messages WHERE email='$email' AND read_=0";
    $msg_results = mysqli_query($conn, $msg_query);
    if($msg_results->num_rows > 0) {
        $msg_row = mysqli_fetch_assoc($msg_results);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="nostudent-profile,nofollow">
    <title>Applications</title>
    
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- StudentInn icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/Studentinn-icon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./profile/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="./profile/css/tables.css" rel="stylesheet">

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
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        
                        <!-- Search -->
                        
       
                    </ul>
                    
                    <!-- User profile and search -->
                    
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- Profile -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    if(!empty($avatar['image'])){
                                        ?>
                                        <img src="./avatar/<?php echo $avatar['image']?>" alt="user" class="" /> 
                                        <?php
                                    }else{
                                        ?>
                                        <img src="./assets/images/users/account.jpg" alt="user" class="" /> 
                                        <?php
                                    }
                                ?>
                                <span
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
                        <?php
                            $getCount = $msg_results->num_rows;
                            ?>
                            <li id="msg-go"> <a class="waves-effect waves-dark" aria-expanded="false">
                                <i class="fa-solid fa-message"></i>
                                <span class="hide-menu">Messages</span> <span class="msg-badge"><?php echo $getCount ?></span></a>
                            </li>
                            <?php
                        ?>
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
                        <?php 

                            if ( $_SESSION['applied'] == 'Yes' && $_SESSION['role'] == 'student') {
                                ?> 

                                    <li> <a class="waves-effect waves-dark nav-link" href="../application-forms/rec-stu-form.php" aria-expanded="false">
                                        <i class="fa-solid fa-briefcase"></i>
                                        <span class="hide-menu">Become a recruiter</span></a>
                                    </li>                             
                                <?php
                            }else if ( $_SESSION['applied'] == 'Yes' && $_SESSION['role'] == 'recruiter') {
                                ?> 
                                    <li> <a class="waves-effect waves-dark nav-link" href="../application-forms/stu-rec-form.php" aria-expanded="false" style="color: #67757c !important;">
                                        <i class="fa-solid fa-graduation-cap" style="color: #67757c !important;"></i>
                                        <span class="hide-menu">Become a resident</span></a>
                                    </li>                              
                                <?php
                            }
                        ?>
                        <li> 
                            <div class="nav-link hide-menu" href="../application-forms/res-form.php" aria-expanded="false">
                                <?php 
                                    if($_SESSION['role'] == 'dual-student'){
                                        ?> 
                                            <i class="fa-solid fa-repeat" style="color: #67757c !important;"></i>
                                            <span class="hide-menu" style="color: #67757c !important;">Switch Accounts</span>                                        
                                            <form action="" method="post">
                                                <div class="waves-effect waves-dark nav-link sb-nav-link-icon">
                                                    <i class="fa-solid fa-graduation-cap" style="color: #67757c !important;"></i>
                                                    <input type="button" name= "student-acc" id="st-acc" value="Student Account" style="background: #fff; color:  #20aee3; border: none;">
                                                </div>
                                                <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                    <i class="fa-solid fa-briefcase" style="color: #67757c !important;"></i>
                                                    <input type="button" name= "Recruiter Account" id="re-acc" value="Recruiter Account" style="background: #fff; color: #787f91; border: none;">
                                                </div>
                                            </form>
                                        <?php
                                    }
                                    else if($_SESSION['role'] == 'dual-recruiter'){
                                        ?> 
                                            <i class="fa-solid fa-repeat" style="color: #67757c !important;"></i>
                                            <span class="hide-menu" style="color: #67757c !important;">Switch Accounts</span>                                        
                                            <form action="" method="post">
                                                <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                    <i class="fa-solid fa-graduation-cap" style="color: #67757c !important;"></i>
                                                    <input type="button" name= "student-acc" id="st-acc" value="Student Account" style="background: #fff; color: #787f91; border: none;">
                                                </div>
                                                <div class="waves-effect waves-dark nav-link sb-nav-link-icon active">
                                                    <i class="fa-solid fa-briefcase" style="color: #67757c !important;"></i>
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
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
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
                        <h3 class="text-themecolor">Applications</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Applications</li>
                        </ol>
                    </div>

                </div>
                
                <!-- End Bread crumb and right sidebar toggle -->
                
                
                <!-- Start Page Content -->
                
                <div class="card mb-4">
                    <?php
                        if($_SESSION['role']== "dual-student" || $_SESSION['role']== "student"){
                                ?>
                                        <div class="card-header" style="background-color:#2C5364; color: #fff; ">
                                            <i class="fas fa-table me-1"></i>
                                            Residence Application Records
                                        </div>
                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead style="background-color:#3494E6; color: #fff; ">
                                                    <tr>
                                                        <th>ID No.</th>
                                                        <th>Residence Address</th>
                                                        <th>Room No.</th>
                                                        <th>Status</th>
                                                        <th>Application Date</th>
                                                        <th>Message</th>
                                                    

                                                    </tr>
                                                </thead>
                                
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM residence_application WHERE id_number='$idnumber'";
                                                    $run_query = mysqli_query($conn, $query);
                                                    
                                                        if(mysqli_num_rows($run_query) > 0){
                                                            foreach($run_query as $row){
                                                            ?>
                                                                <tr>
                                                                <td><?= $row['id_number']?></td>
                                                                <td><?= $row['residence_address']?></td>
                                                                <td><?= $row['room_number']?></td>
                                                                <?php
                                                                    if($row['status'] == 'Accepted'){
                                                                        ?>
                                                                            <td style="color:limegreen; font-weight:bold"><?= $row['status']?></td>
                                                                        <?php
                                                                    }else if($row['status'] == 'Unsuccessful'){
                                                                        ?>
                                                                            <td style="color:red; font-weight:bold"><?= $row['status']?></td>

                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                            <td style="color:orange; font-weight:bold"><?= $row['status']?></td>

                                                                        <?php
                                                                    }
                                                                ?>

                                                                <td><?= $row['application_date']?></td>
                                                                <td><?= $row['message']?></td>
                                                        
                                                            
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                            
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                               
                            <?php
                        }else{
                            ?>
                            <div class="card-header" style="background-color:#2C5364; color: #fff; ">
                                <i class="fas fa-table me-1"></i>
                                Recruiter Job Application Records
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead style="background-color:#3494E6; color: #fff; ">
                                        <tr>
                                            <th>ID No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Status</th>
                                            <th>Application Date</th>
                                        

                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        <?php
                                        
                                        $query = "SELECT * FROM recruiter_application WHERE id_number='$idnumber'";
                                        $run_query = mysqli_query($conn, $query);
                                        
                                            if(mysqli_num_rows($run_query) > 0){
                                                foreach($run_query as $row){
                                                ?>
                                                    <tr>
                                                    <td><?= $row['id_number']?></td>
                                                    <td><?= $row['first_name']?></td>
                                                    <td><?= $row['last_name']?></td>
                                                    <?php
                                                        if($row['application_status'] == 'Accepted'){
                                                            ?>
                                                                <td style="color:limegreen; font-weight:bold"><?= $row['application_status']?></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <td style="color:orange; font-weight:bold"><?= $row['application_status']?></td>

                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                    <td><?= $row['application_date']?></td>
                                            
                                                
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                               
                <?php                            
                        }
                    ?>
                    
                <!-- End PAge Content -->
                
            
            
            <!-- End Container fluid  -->
            
            
            <!-- footer -->
            
            <footer class="footer"> © 2022 StudentInn. All rights reserved by <a href="https://www.falcontechdiv.com/">Studentsinn.co.za</a> </footer>
            
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
    <script src="./profile/js/msg.js"></script>
    <!-- jQuery peity -->
    <script src="./assets/node_modules/peity/jquery.peity.min.js"></script>
    <script src="./assets/node_modules/peity/jquery.peity.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>



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