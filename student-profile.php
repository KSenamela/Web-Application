
<?php 
    include('./includes/profile_navbar.php');
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
                            <a class="nav-link" href="student-profile.php" style="background:gray;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                    
                            <div class="sb-sidenav-menu-heading">Account Menu</div>
                            <a class="nav-link" href="reports.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Personal Information
                            </a>
                            <a class="nav-link" href="students_management.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Payment Records
                            </a>
                            <a class="nav-link" href="recruiters_management.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reports
                            </a>
                            <a class="nav-link" href="payment-tracker.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-comments-dollar"></i></div>
                                Announcements
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
      </ol>
      <div class="row">
          <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                  <div class="card-body text-center">5</div>
                  <div class="card-footer text-center">
                      <p class="small text-white" >Paid Students</p>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                  <div class="card-body text-center">23</div>
                  <div class="card-footer text-center">
                      <p class="small text-white" >Owing Students</p>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                  <div class="card-body text-center">R120,000.00</div>
                  <div class="card-footer text-center">
                      <p class="small text-white" >Expected Monthly Payment</p>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                  <div class="card-body text-center">R70,000.00</div>
                  <div class="card-footer text-center">
                      <p class="small text-white" >Current Monthly Payment</p>
                  </div>
              </div>
          </div>
          
      </div>

      <div class="card mb-4">
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Monthly Payment Records
          </div>
          <div class="card-body">
              <table id="datatablesSimple">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Surname</th>
                          <th>Role</th>
                          <th>Registered Date</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Surname</th>
                          <th>Role</th>
                          <th>Registered Date</th>
                          <th>Status</th>
                      </tr>
                  </tfoot>
                  <tbody>
                      <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                      </tr>
                      
                  </tbody>
              </table>
          </div>
      </div>
  </div>



<?php include('./includes/profile_footer.php') ?>    
