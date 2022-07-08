

<?php include('./includes/profile_navbar.php') ?>

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
                            <a class="nav-link" href="recruiters_management.php" style="background:gray;">
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
        <h1 class="mt-4">Database</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Recruiter Records</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Give admin instructions on how to perform crud on the table below
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Recruiter Records
            </div>
            <div class="card-body">
            <table  id="datatablesSimple" >
                        <thead style="background: #41295a; color: #fff">
                            <tr>
                                <th>ID No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email Address</th>
                                <th>Phone No.</th>
                                <th>Status</th>
                                <th>Status Change</th>
                                <th>Application Date</th>
                                <th>Controllers</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM recruiter_application WHERE email!=''";
                                $run_query = mysqli_query($conn, $sql);

                                if($run_query->num_rows > 0){
                                    foreach( $run_query as $row){
                                    ?>
                                        <tr>
                                            <td><?=$row['id_number']?></td>
                                            <td><?=$row['first_name']?></td>
                                            <td><?=$row['last_name']?></td>
                                            <td><?=$row['email']?></td>
                                            <td><?=$row['phone']?></td>
                                            <?php
                                            if($row['application_status'] == 'Processing'){
                                                ?>

                                                    <td style="color:orange; font-weight:bold">  
                                                        <?= $row['application_status'] ?>
                                                    </td>
                                                <?php
                                            }else if($row['application_status'] == 'Accepted'){
                                                ?>

                                                <td style="color:limegreen; font-weight:bold">
                                                    <?= $row['application_status'] ?>
                                                </td>
                                            <?php
                                            }else{
                                                ?>
                                                <td style="color:red; font-weight:bold">  
                                                    <?= $row['application_status'] ?>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <td>
                                                <button type="button" name="accept" class="accept btn btn-outline-success mb-2" style="border-radius:10px;" value="<?php echo $row['id_number'] ?>">Accept</button>
                                                <button type="button" name="reject" class="reject btn btn-outline-danger mb-2" style="border-radius:10px;" value="<?php echo $row['id_number'] ?>">Reject</button>
                                            
                                            </td>

                                            <td><?=$row['application_date']?></td>

                                            <td>
                                                <a href="" class="btn btn-primary mb-2">View</a>
                                                <a href="" class="btn btn-success mb-2">Edit</a>
                                                <a href="" class="btn btn-danger mb-2">Delete</a>
                                               
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


        <?php include('./includes/profile_footer.php') ?>    
        <script>
            $(document).ready(function() {
                $(document).on('click', '.accept', function(){


                    var id_number = $(this).val();
                    $.ajax({
                        url: './statusUpdateRec.php?accept=' + id_number,
                        method: 'GET',
                        success : function(response){
                            if(response == "success"){
                                location.reload(true);
                            }
                        },
                    });
                });

                $(document).on('click', '.reject', function(){


                    var id_number = $(this).val();

                    $.ajax({
                        url: './statusUpdateRec.php?reject=' + id_number,
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