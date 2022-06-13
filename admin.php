<?php 
    include('./includes/profile_navbar.php');
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: ./login.php');
        exit;
    }

?>

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
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Recruiter Records
                            </a>
                            <a class="nav-link" href="payment-tracker.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                                Payment Tracker
                            </a>

                            <div class="sb-sidenav-menu-heading">Account</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>
                        </div>
                       
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin/Student/Recruiter
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body text-center">5</div>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Pending Applications</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body text-center">23</div>
                            <div class="card-footer text-center">
                                <p class="small text-white" >NSFAS Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body text-center">7</div>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Cash Paying / Bursary Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body text-center">30</div>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Total Number of Students</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Students and Recruiters' Records
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID No.</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Payment Method</th>
                                    <th>Registered Date</th>
                                    <th>Institution</th>
                                    <th>Status</th>
                                    <th>Update Status</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID No.</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Payment Method</th>
                                    <th>Registered Date</th>
                                    <th>Institution</th>
                                    <th>Status</th>
                                    <th>Update Status</th>



                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>9504116002084</td>
                                    <td>Klaas</td>
                                    <td>Senamela</td>
                                    <td>Bursary</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(18, 206, 18); font-weight: 500;">Accepted</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    <td>9904116002084</td>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>Cash</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(222, 225, 56); font-weight: 500;">Pending</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>9104116002084</td>
                                    <td>Bhuti</td>
                                    <td>Phakade</td>
                                    <td>NSFAS</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(184, 60, 60); font-weight: 500;">Rejected</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>0004116002084</td>
                                    <td>Anesipho</td>
                                    <td>Senamela</td>
                                    <td>Bursary</td>
                                    <td>2011/04/25</td>
                                    <td>University of Witwatersrand</td>
                                    <td style="color: rgb(18, 206, 18); font-weight: 500;">Accepted</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>9804199002084</td>
                                    <td>Terry</td>
                                    <td>Muslie</td>
                                    <td>NSFAS</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(222, 225, 56); font-weight: 500;">Pending</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>9304116002084</td>
                                    <td>Tom</td>
                                    <td>Cruise</td>
                                    <td>Cash</td>
                                    <td>2011/04/25</td>
                                    <td>University of 
                                        University of Witwatersrand</td>
                                    <td style="color: rgb(184, 60, 60); font-weight: 500;">Rejected</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>9504116002084</td>
                                    <td>Klaas</td>
                                    <td>Senamela</td>
                                    <td>Bursary</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(18, 206, 18); font-weight: 500;">Accepted</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>

                                <tr>
                                    <td>9504116002084</td>
                                    <td>Klaas</td>
                                    <td>Senamela</td>
                                    <td>Bursary</td>
                                    <td>2011/04/25</td>
                                    <td>University of Johannesburg</td>
                                    <td style="color: rgb(222, 225, 56); font-weight: 500;">Pending</td>
                                    <td>
                                        <button style="background-color: green; color: white; border-radius: 10px;">Accept</button>
                                        <button style="background-color: rgb(184, 60, 60); color: white; border-radius: 10px;">Reject</button>
                                    
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php include('./includes/profile_footer.php') ?>    