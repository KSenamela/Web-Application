<?php 
    // error_reporting(0);
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

    if($_SESSION['role'] == 'student' || $_SESSION['role'] == 'dual-student'){
      $query = "SELECT * FROM student_application WHERE email='$email'";
      $run_query = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($run_query);
    }
    if($_SESSION['role'] == 'recruiter' || $_SESSION['role'] == 'dual-recruiter'){
      $query = "SELECT * FROM recruiter_application WHERE email='$email'";
      $run_query = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($run_query);
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
    <title>Payments</title>
    <!-- Font Awesome-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/Studentinn-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- StudentInn icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Studentinn-icon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./profile/css/style.css" rel="stylesheet">
    <link href="./profile/css/tables.css" rel="stylesheet">
    <!-- page css -->
    <link href="./profile/css/pages/icon-page.css" rel="stylesheet">
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
      .error{
        color: red;
      }
      </style>
</head>

<body class="fix-header card-no-border fix-sidebar" >
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
                    <!-- toggle and nav items Mobile-->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
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

                                    <li> <a class="waves-effect waves-dark nav-link" href="../application-forms/rec-stu-form.php" aria-expanded="false" style="color: #67757c !important;">
                                        <i class="fa-solid fa-briefcase" style="color: #67757c !important;"></i>
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
                        <h3 class="text-themecolor">Payments</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Payments</li>
                        </ol>
                    </div>

                </div>
                
                <!-- End Bread crumb and right sidebar toggle -->
                
                
                <!-- Start main content -->
                <?php
                if($_SESSION['role'] == 'student' || $_SESSION['role'] == 'dual-student'){
                  ?>
                            
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentRequest">
                    Upload Proof of Payment
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="paymentRequest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Payment Approval Request</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div id="success-msg" class="mt-4 text-center row"></div>
                          <form id="paymentForm" method="post" enctype="multipart/form">
                          <!-- ID NUMBER -->
                          <div class="form-group">
                            <div class="col-md-12">
                              <input 
                                  type="hidden"
                                  class="form-control form-control-line"
                                  name="idnumber"
                                  id="idnumber"
                                  value="<?php echo $data['id_number']; ?>"
                                  >
                            </div>
                          </div>
                          <!-- Full Name -->
                          <div class="form-group">
                            <div class="col-md-12">
                              <input 
                                  type="hidden"
                                  class="form-control form-control-line"
                                  name="full_name"
                                  id="full_name"
                                  value="<?php echo $data['first_name'] . ' ' . $data['last_name']; ?>"
                                  >
                            </div>
                          </div>
                          <!-- Number of Months paid for--> 
                          <div class="form-group">
                            <label class="col-md-12">Payment is for how many months?</label>
                            <div class="col-md-2">
                            <select name="numMonths" id="numMonths" class="form-control form-control-line counter">
                              <?php 
                                for ($i=1; $i < 13 ; $i++) { 
                                  ?>
                                    <option  value="<?= $i ?>"><?= $i ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                            </div>
                          </div>
                          <!-- Months paid for -->
                          <label class="col-md-12">Which Month?</label>
                          <div class="form-group" id="monthSelect">
                            <div class="col-md-4 mb-2" >
                                <select name="months[]" class="form-control form-control-line counter">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                                </select>
                            </div>
                          </div>
                        <!--  Upload file -->
                          <div class="form-group">
                            <label class="col-md-12">Upload Proof of Payment</label>
                            <div class="col-md-12">
                              <input 
                                  type="file"
                                  class="form-control form-control-line"
                                  name="uploadRequest"
                                  id="uploadRequest"
                                  >
                                  <span class="error" id="error-msg"></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group text-center">
                          <span class="error" id="failed-msg"></span>
                        </div>


                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" id="stu-btn" class="btn btn-primary">Submit Payment</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                <!-- End PAge Content -->
                
                <div class="card mb-4 mt-4">
                    <?php
                    $idnumber = $data['id_number'];
                    $queryIt = "SELECT * FROM payments WHERE id_number='$idnumber'";
                    $run_it = mysqli_query($conn, $queryIt);
                    
                      ?>
                              <div class="card-header" style="background-color:#2C5364; color: #fff; ">
                                  <i class="fas fa-table me-1"></i>
                                  Payment Approval Requests
                              </div>
                              <div class="card-body">
                                  <table id="datatablesSimple">
                                      <thead style="background-color:#3494E6; color: #fff; ">
                                          <tr>
                                              <th>ID No.</th>
                                              <th>Full Name</th>
                                              <th>Month</th>
                                              <th>Approved</th>
                                              <th>Payment Date</th>
                                          
                                          </tr>
                                      </thead>
                      
                                      <tbody>
                                          <?php

                                              if(mysqli_num_rows($run_it) > 0){
                                                  foreach($run_it as $row){
                                                  ?>
                                                      <tr>
                                                      <td><?= $row['id_number']?></td>
                                                      <td><?= $row['full_name']?></td>
                                                      <td><?= $row['month']?></td>
                                                      <?php
                                                      if($row['approved'] == 'Not yet'){
                                                        ?>
                                                        <td style="color:orange; font-weight:bold;"><?= $row['approved']?></td>
                                                        
                                                        <?php
                                                      }else if($row['approved'] == 'Yes'){
                                                        ?>
                                                        <td style="color:limegreen; font-weight:bold;"><?= $row['approved']?></td>
                                                        <?php
                                                      }else{
                                                        ?>
                                                        <td style="color:red; font-weight:bold;"><?= $row['approved']?></td>
                                                        <?php
                                                      }
                                                      ?>
                                                      <td><?= $row['payment_date']?></td>
                                              
                                                  
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
                ?>

    
                                        
        <?php

            }else{
              ?>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">
                    Request Payment
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Request Payment</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div id="success-msg" class="mt-4 text-center row"></div>
                          <form id="req-paymentForm" method="post" enctype="multipart/form">
                          <!-- ID NUMBER -->
                          <div class="form-group">
                            <div class="col-md-12">
                              <input 
                                  type="hidden"
                                  class="form-control form-control-line"
                                  name="idnumber"
                                  value="<?php echo $data['id_number']; ?>"

                                  >
                            </div>
                          </div>
                          <!--Card Holder -->
                          <div class="form-group">
                            <label class="col-md-12">Account Holder</label>
                            <div class="col-md-12">
                              <input 
                                  type="text"
                                  class="form-control form-control-line"
                                  placeholder="e.g Mr K Senamela"
                                  name = "cardHolder"
                                  id = "cardHolder"
                                  >
                            </div>
                          </div>
                          <!-- Account number -->
                          <div class="form-group">
                            <label class="col-md-12">Account Number</label>
                            <div class="col-md-12">
                              <input 
                                  type="number"
                                  class="form-control form-control-line"
                                  name="accountNumber"
                                  id="accountNumber"
                                  >
                            </div>
                          </div>
                          <!-- Account number -->
                          <div class="form-group">
                            <label class="col-md-12">Bank Name</label>
                            <div class="col-md-12">
                              <input 
                                  type="text"
                                  class="form-control form-control-line"
                                  name="BankName"
                                  id="BankName"
                                  maxlength="20"
                                  >
                            </div>
                          </div>
                          <!-- Account number -->
                          <div class="form-group">
                            <label class="col-md-12">Branch Code</label>
                            <div class="col-md-12">
                              <input 
                                  type="text"
                                  class="form-control form-control-line"
                                  name="BranchCode"
                                  id="BranchCode"
                                  maxlength="20"
                                  minlength="2"
                                  >
                            </div>
                          </div>
                        </div>

                        <div class="form-group text-center">
                          <span class="error" id="failed-msg"></span>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" id="rec-btn" class="btn btn-primary">Request Payment</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                <!-- End PAge Content -->
                
                <div class="card mb-4 mt-4">
                    <?php
                    $idnumber = $data['id_number'];
                    $queryIt = "SELECT * FROM payment_request WHERE id_number='$idnumber'";
                    $run_it = mysqli_query($conn, $queryIt);
                    
                      ?>
                              <div class="card-header" style="background-color:#2C5364; color: #fff; ">
                                  <i class="fas fa-table me-1"></i>
                                  Payment Approval Requests
                              </div>
                              <div class="card-body">
                                  <table id="datatablesSimple">
                                      <thead style="background-color:#3494E6; color: #fff; ">
                                          <tr>
                                              <th>ID No.</th>
                                              <th>Account Holder</th>
                                              <th>Account Number</th>
                                              <th>Bank Name</th>
                                              <th>Approved</th>
                                              <th>Request Date</th>
                                          
                                          </tr>
                                      </thead>
                      
                                      <tbody>
                                          <?php

                                          
                                              if(mysqli_num_rows($run_it) > 0){
                                                  foreach($run_it as $row){
                                                  ?>
                                                      <tr>
                                                      <td><?= $row['id_number']?></td>
                                                      <td><?= $row['account_holder']?></td>
                                                      <td><?= $row['account_number']?></td>
                                                      <td><?= $row['bank_name']?></td>
                                                      <?php
                                                      if($row['approved']  == 'Not yet'){
                                                        ?>
                                                          <td style="color:orange; font-weight:bold;"><?= $row['approved']?></td>
                                                        
                                                        <?php
                                                      }else if($row['approved'] == 'Yes'){
                                                        ?>
                                                        <td style="color:limegreen; font-weight:bold;"><?= $row['approved']?></td>
                                                      
                                                      <?php
                                                      }else{
                                                        ?>
                                                        <td style="color:red; font-weight:bold;"><?= $row['approved']?></td>
                                                      
                                                      <?php
                                                      }
                                                      ?>
                                                      <td><?= $row['payment_request_date']?></td>
                                              
                                                  
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
                    ?>

    
                          
              <?php
            }
            
    ?>

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
    <script src="./profile/js/jquery.validate.min.js"></script>
    <script src="./profile/js/additional-methods.js"></script>
    <script src="./assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="./profile/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="./profile/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="./profile/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./profile/js/custom.min.js"></script>
    <!-- Form -->
    <script src="./profile/js/validation-apply.js"></script>
    <script src="./profile/js/msg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

    <script>
        $(document).ready(function(){
          // validate recruiter request payment form
          $("#req-paymentForm").validate({
            rules:{
              cardHolder:{
                required: true,
                minlength: 2,
                maxlength: 100,
                letterswithbasicpunc: true
              },
              BankName:{
                required: true,
                minlength: 2,
                maxlength: 50,
                lettersonly: true
              },
              accountNumber:{
                required: true,
                minlength: 8,
                maxlength:20,
                integer: true
              },
              BranchCode:{
                required: true,
                minlength: 4,
                maxlength:20,
                branch: true
              },

            }
          });

          $("#rec-btn").click(function(){
            if($('#req-paymentForm').valid()){
              $.ajax({
                url: 'submitPayment.php',
                method: 'POST',
                data: $('#req-paymentForm').serialize(),
                success : function(response){ 
                  if(response == 'success'){
                      $("#paymentModal").modal('hide');
                      location.reload(true);
                      $("#cardHolder").val('');
                      $("#accountNumber").val('');
                      $("#BankName").val('');
                      $("#BranchCode").val('');
                  }else{
                    $("#failed-msg").html(response);
                  }
                }

              });
            }

          });
          // validate student request payment form

          $("#paymentForm").validate({
            rules:{
                months:{
                  required:true,
                },
                uploadRequest:{
                  required:true,
                },
                numMonths:{
                  required:true,
                },
            }
          });
          //Student payment approval request button clicked
          $("#uploadRequest").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings("#uploadRequest").addClass("selected").html(fileName);

          });

          $("#stu-btn").click(function(){
        
            if($("#uploadRequest").val() == ""){
              $("#error-msg").html("Please select a file to upload");
            }else{
              $("#error-msg").html("");
              //Append values in the formData object
              var paymentApproval = new FormData();
              var file = $('#uploadRequest')[0].files[0];
              var id = $("#idnumber").val();
              var full_name= $("#full_name").val();
              paymentApproval.append('uploadRequest', file);
              paymentApproval.append('idnumber', id);
              paymentApproval.append('full_name', full_name);

              //append the inputs with the same name in the formData
              $('select[name="months[]"]').each(function(index, member){
                var value = $(member).val();
                paymentApproval.append('months[]', value );
                
                
              })


              
              if($('#paymentForm').valid()){
                $.ajax({
                  url: "./submitPayment.php",
                  method: "POST",
                  data: paymentApproval,
                  contentType: false,
                  processData: false,
                  success: function(response){
                    if(response == 'success'){
                      $("#paymentRequest").modal('hide');
                      location.reload(true);
                      $("#uploadRequest").val('')
                    }else{
                      $("#failed-msg").html(response);
                    }
                  }

                });
                
              }

            }

          });


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

          $("select.counter").change(function(){
                var counter = $(this).children("option:selected").val(); //value
                var form = $("#paymentForm").serialize();
                
                // form.append(counter);
                $.ajax({
                  url: "months.php",
                  method: "POST",
                  dataType: "text",
                  data:form,
                  success: function(response){
                    $("#monthSelect").empty();
                    
                    for(let index = 1; index <= response; index++) {

                      $("#monthSelect").prepend(`<div class="col-md-4 mb-2">
                                <select name="months[]" class="form-control form-control-line counter">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                                </select>
                            </div>`);

                    }
                   
                  
                  }
                })
          });
        });

  document.getElementById('uploadRequest').onchange = function (){
    var image=document.getElementById('uploadRequest').value;
    if(image!=''){
      var checkimg = image.toLowerCase();
      if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.PDF|\.pdf)$/)){
          document.getElementById('error-msg').innerHTML="The file types accepted are PDF, JPG, JPEG, and PNG";
          document.getElementById('uploadRequest').value="";
      }else{
        document.getElementById('error-msg').nnerHTML="";
      }
      var image=document.getElementById('uploadRequest');
      var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
      if (size > 2){
          document.getElementById('error-msg').innerHTML="Please Select Size Less Than 2 MB";
          document.getElementById('uploadRequest').value="";
      } else {
            document.getElementById('error-msg').innerHTML="";

      }
    }

}
    </script>


</body>

</html>