<?php 
    // error_reporting(0);
    session_start();
      $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    //If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['email'])) {
        header('Location: ./Login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" sizes="16x16" href="./img/Studentinn-icon.png">
        <style>
    
        label.error{
            color: red;
        }
        </style>

  
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"><img src="./img/Studentinn.png" width="60%" style="margin-top:20px; margin-bottom:20px" alt="" srcset=""></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            </ul>
        </nav>

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Account Holder</div>
                          <a class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-large"></i></div>
                            Klaas Senamela
                          </a>
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                    
                            <div class="sb-sidenav-menu-heading">Management System</div>
                            <a class="nav-link" href="reports.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Report Management
                            </a>
                            <a class="nav-link" href="students_management.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Student Records
                            </a>
                            <a class="nav-link" href="recruiters_management.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Recruiter Records
                            </a>
                            <a class="nav-link" href="payment-tracker.php" style="background-color: grey">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                                Payment Tracker
                            </a>
                            <a class="nav-link" href="recruiter-payments.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                                Recruiter Payments
                            </a>

                            <div class="sb-sidenav-menu-heading">Account</div>
                            <a class="nav-link" href="./server/logout.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                        </div>
                       
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo ucwords($_SESSION['role']) ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
        
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Database</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Payment Tracker</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <?php 
                    $getMonth = date("M");
                    $paidStudents = "SELECT * FROM payments WHERE month = '$getMonth' AND approved = 'Yes'";
                    $paidStudentQuery = mysqli_query($conn, $paidStudents);
                    $numberOfPaidStudents = $paidStudentQuery ->num_rows;

                ?>  
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body text-center"><?=$numberOfPaidStudents?></div>
                    <div class="card-footer text-center">
                        <p class="small text-white" >Paid Students</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <?php 
                    $getMonth = date("M");
                    $owingStudents = "SELECT * FROM payments WHERE month = '$getMonth' AND approved != 'Yes'";
                    $owingStudentQuery = mysqli_query($conn, $owingStudents);
                    $numberOfOwingStudents = $owingStudentQuery ->num_rows;

                ?>  
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body text-center"><?=$numberOfOwingStudents?></div>
                    <div class="card-footer text-center">
                        <p class="small text-white" >Owing Students</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <?php 
                $acceptedStudents = "SELECT * FROM student_application WHERE application_status = 'Accepted'";
                $studentQuery = mysqli_query($conn, $acceptedStudents);
                $moneyCount = number_format(($studentQuery->num_rows) * 4550, 2);

                ?>                
                <div class="card bg-success text-white mb-4">
                    <div class="card-body text-center">R<?= $moneyCount ?></div>
                    <div class="card-footer text-center">
                        <p class="small text-white" >Expected Monthly Payment</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <?php 
                    $getMonth = date("M");
                    $acceptedStudents = "SELECT * FROM payments WHERE month = '$getMonth' AND approved = 'Yes'";
                    $studentQuery = mysqli_query($conn, $acceptedStudents);
                    $currentMonthlyAmount = number_format(($studentQuery->num_rows) * 4550, 2);

                ?>                  
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body text-center">R<?= $currentMonthlyAmount ?></div>
                    <div class="card-footer text-center">
                        <p class="small text-white" >Current Monthly Payment</p>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="card mb-4">
            <div class="card-header" style="background-color: darkblue; color: white;">
                <i class="fas fa-table me-1"></i>
                Monthly Payment Records
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead style="background: #41295a; color: #fff">
                        <tr>
                            <th>ID No.</th>
                            <th>Full Name</th>
                            <th>Month</th>
                            <th>Approved</th>
                            <th>Payment Made</th>
                            <th>Payment Date</th>
                            <th>Controllers</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $payQuery = "SELECT * FROM payments";
                            $payResults = mysqli_query($conn, $payQuery);

                            if($payResults->num_rows > 0){

                                foreach ($payResults as $row) {
                                    ?> 
                                        <tr>
                                            <td><?= $row['id_number'] ?></td>
                                            <td><?= $row['full_name'] ?></td>
                                            <td><?= $row['month'] ?></td>
                                            <?php 
                                                if($row['approved']  == 'Yes'){
                                                    ?> 
                                                        <td style="color: limegreen; font-weight: bold;"><?= $row['approved'] ?></td>
                                                    
                                                    <?php
                                                }else if($row['approved']  == 'No'){
                                                    ?> 
                                                        <td style="color: red; font-weight: bold;"><?= $row['approved'] ?></td>
                                                    
                                                    <?php
                                                }else{
                                                    ?> 
                                                        <td style="color: orange; font-weight: bold;"><?= $row['approved'] ?></td>
                                                    
                                                    <?php
                                                }
                                            ?>
                                            <td style="width: 10%">
                                                <button type="button" name="Yes" class="yes btn btn-outline-success mb-2" style="border-radius:10px;" value="<?php echo $row['id_number'] . '.' . $row['month']?>">Yes</button>
                                                <button type="button" name="No" class="no btn btn-outline-danger mb-2" style="border-radius:10px;"  value="<?php echo $row['id_number'] . '.' . $row['month']?>">No</button>
                                            </td>
                                            <td><?= $row['payment_date'] ?></td>

                                            <td style="width: 10%">                                                
                                                <button type="button" name="deleteStu" class="deleteStu btn btn-danger mb-2" value="<?php echo $row['id_number'] . '.' . $row['month']?>">Delete</button>
                                            </td>                                            
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

        </main>
      <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
              <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">Copyright &copy; StudentINN Ltd (Pty)</div>
                  <div>
                      <a href="#">Privacy Policy</a>
                      &middot;
                      <a href="#">Terms &amp; Conditions</a>
                  </div>
              </div>
          </div>
      </footer>
  
  </div>
</div>
        <script src="./js/jquery-3.6.0.min.js"></script>
        <script src="./js/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

  
        <script>
            $(document).ready(function() {

                //Approve the payment request
                $(document).on('click', '.yes', function(){
                    
                    var id_number = $(this).val();
                    $.ajax({
                        url: './paymentApprovalStu.php?Yes=' + id_number,
                        method: 'GET',
                        success : function(response){

                            if(response == "success"){
                                location.reload(true);
                            }
                        },
                    });
                });

                //Reject the payment request for whatever reason

                $(document).on('click', '.no', function(){

                    var id_number = $(this).val();
                    $.ajax({
                        url: './paymentApprovalStu.php?No=' + id_number,
                        method: 'GET',
                        success : function(response){
                            
                            if(response == "success"){
                                location.reload(true);
                            }
                        },
                    });
                }); 
                
                //delete the student payment request
                $(document).on('click', '.deleteStu', function(){

                    var id_number = $(this).val();
                    
                    $.ajax({
                        url: './deletePaymentRequests.php?deleteStu=' + id_number,
                        method: 'GET',
                        success : function(response){
    
                            if(response == "success"){
                                location.reload(true);
                            }
                        },
                    });
                });
            });
        </script> 
    </body>
</html>