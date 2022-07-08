

<?php 
    include('./includes/profile_navbar.php');
    include('./server/dbconnect_server.php');
  

    if (isset($_SESSION['email'])) {
        if($_SESSION['role'] != 'admin'){
            header('Location: ./login.php');
        }
    }

    $query = "SELECT count(*) as count FROM registration";
    $run_query = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($run_query) > 0){
        foreach($run_query as $row){
        ?>

            <div class="card-body text-center"><?= $row['count']?></div>

        <?php
        }
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
                            <?php echo $_SESSION['fullname'] ?>
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
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <?php

                                $query = "SELECT count(*) as count FROM registration";
                                $run_query = mysqli_query($conn, $query);

                                if(mysqli_num_rows($run_query) > 0){
                                    foreach($run_query as $row){
                                    ?>

                                        <div class="card-body text-center"><?= $row['count']?></div>

                                    <?php
                                    }
                                }
                            ?>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Registered Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <?php

                                $query = "SELECT count(*) as count FROM registration WHERE role = 'student'";
                                $run_query = mysqli_query($conn, $query);

                                if(mysqli_num_rows($run_query) > 0){
                                    foreach($run_query as $row){
                                    ?>

                                        <div class="card-body text-center"><?= $row['count']?></div>

                                    <?php
                                    }
                                }
                            ?>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <?php

                                $query = "SELECT count(*) as count FROM registration WHERE role ='recruiter'";
                                $run_query = mysqli_query($conn, $query);

                                if(mysqli_num_rows($run_query) > 0){
                                    foreach($run_query as $row){
                                    ?>

                                        <div class="card-body text-center"><?= $row['count']?></div>

                                    <?php
                                    }
                                }
                            ?>
                            <div class="card-footer text-center">
                                <p class="small text-white" >Recruiters</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                        <?php

                                $query_ = "SELECT count(*) as count FROM registration";
                                $run_query_ = mysqli_query($conn, $query_);

                                if(mysqli_num_rows($run_query_) > 0){
                                    foreach($run_query_ as $row){
                                    ?>

                                        <div class="card-body text-center"><?= $row['count']?></div>


                                    <?php
                                    }
                                }
                            ?>
                            <div class="card-footer text-center">

                                <p class="small text-white" >Total Number of Students</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Registered Users' Records
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" >
                            <thead style="background: #41295a; color: #fff">
                                <tr>
                                    <th>ID No.</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date Registered</th>
                                    <!-- <th>Payment Method</th>
                                    <th>Registered Date</th>
                                    <th>Institution</th>
                                    <th>Status</th>
                                    <th>Update Status</th> -->

                                </tr>
                            </thead>
              
                            <tbody>
                                <?php
                                 $query = "SELECT * FROM registration";
                                 $run_query = mysqli_query($conn, $query);
                                  
                                    if(mysqli_num_rows($run_query) > 0){
                                        foreach($run_query as $row){
                                        ?>
                                            <tr>
                                            <td><?= $row['id']?></td>
                                            <td><?= $row['first_name']?></td>
                                            <td><?= $row['last_name']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= $row['role']?></td>
                                            <td><?= $row['registration_date']?></td>
                                    
                                        
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

            <?php include('./includes/profile_footer.php') ?>    