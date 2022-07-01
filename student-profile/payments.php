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

  $query = "SELECT * FROM student_application WHERE email='$email'";
  $run_query = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($run_query);

  $email = $_SESSION['email'];
  if($_SESSION['role'] =="dual-student"){
      $role = "student";
  }else if($_SESSION['role'] =="dual-recruiter"){
      $role = "recruiter";
  }
  $avatar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM avatar WHERE email='$email' AND role='$role'"));

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
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
  
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- StudentInn icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/Studentinn-icon.png">
    <!-- Bootstrap Core CSS -->
    <link href="./assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./profile/css/style.css" rel="stylesheet">
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
        
        <div class="page-wrapper bg-dark">
            
            <!-- Container fluid  -->
            
            <div class="container-fluid">
                
                <!-- Bread crumb and right sidebar toggle -->
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Font-awesome</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Font-awesome</li>
                        </ol>
                    </div>

                </div>
                
                <!-- End Bread crumb and right sidebar toggle -->
                
                
                <!-- Start Page Content -->
    <div class="container my-5">
      <div class="card mx-auto">
        <div class="form-heading">
          <h1>Accommodation Application</h1>
          <p>Enter your Personal Data</p>
        </div>

        <form>
          <!-- Card body -->
          <div class="card-body px-5 mt-4">
            <!-- Personal details -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5>Personal Details</h5>
                <p class="text-muted">
                  Please fill out this part with your personal information, and
                  be sure to complete out all of the form's fields.
                </p>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    maxlength="50"
                    style="max-width: 500px"
                  />
                </div>
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    maxlength="50"
                    style="max-width: 500px"
                  />
                </div>
                <div class="mb-3">
                  <label for="id_number" class="form-label">ID Number</label>
                  <!-- min="0" oninput="validity.valid||(value='');" --These attributes prevent negative numbers from being entered by user-->
                  <input
                    type="number"
                    class="form-control"
                    id="id_number"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 500px"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    maxlength="100"

                    style="max-width: 500px"
                  />
                </div>
                <div class="mb-3">
                  <label for="phone_number" class="form-label"
                    >Phone number</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="phone_number"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px"
                  />
                </div>
                <div class="mb-3">
                  <label for="institution" class="form-label"
                    >Institution</label
                  >
                  <select
                    id="institution"
                    class="form-select mb-3"
                    style="max-width: 300px"
                    aria-label="Default select example"
                  >
                    <option selected value="1">
                      University of Johannesburg
                    </option>
                    <option value="2">University of Witwatersrand</option>
                    <option value="3">Other</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="funding" class="form-label">Funding</label>
                  <select
                    id="funding"
                    class="form-select mb-3"
                    style="max-width: 300px"
                    aria-label="Default select example"
                  >
                    <option selected value="1">NSFAS</option>
                    <option value="2">Bursary</option>
                    <option value="3">Cash</option>
                  </select>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Residence -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5>Residence</h5>
                <p class="text-muted">
                  Please select three residences for which you would want to
                  apply. And while you are not required to pick a maximum of
                  three, it is in your best interest to do so in order to
                  increase your chances of admission.
                </p>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-8">
                    <label for="Residence" class="form-label"
                      >Residence Address</label
                    >
                    <select
                      id="first_choice"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option selected value="1">
                        13 5th Street Vrededorp
                      </option>
                      <option value="2">19 Rus Road, Vredepark</option>
                      <option value="3">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="4">3 Pypie Draai, Jan Hofmeyer</option>
                      <option value="5">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>

                    <select
                      id="second_choice"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option value="1">13 5th Street Vrededorp</option>
                      <option value="2">19 Rus Road, Vredepark</option>
                      <option selected value="3">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="4">3 Pypie Draai, Jan Hofmeyer</option>
                      <option value="5">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>

                    <select
                      id="third_choice"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option value="1">13 5th Street Vrededorp</option>
                      <option value="2">19 Rus Road, Vredepark</option>
                      <option value="3">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="4">3 Pypie Draai, Jan Hofmeyer</option>
                      <option selected value="5">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Home Address -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5>Home address</h5>
                <p class="text-muted">
                  We'd like to know where you're from, so please enter your home
                  address.
                </p>
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label for="exampleInput6" class="form-label"
                    >Street address</label
                  >
                  <input type="text" class="form-control" id="exampleInput6" />
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInput7" class="form-label">City</label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInput7"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="exampleInput8" class="form-label"
                      >Province</label
                    >
                    <select
                      id="exampleInput8"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option selected value="1">Eastern Cape</option>
                      <option value="2">Free State</option>
                      <option value="3">Gauteng</option>
                      <option value="4">KwaZulu-Natal</option>
                      <option value="5">Limpopo</option>
                      <option value="6">Mpumalanga</option>
                      <option value="7">Northern Cape</option>
                      <option value="8">North West</option>
                      <option value="9">Western Cape</option>
                      <option value="9">International</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInput9" class="form-label"
                        >Postal code</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInput9"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="first_name0" class="form-label">Country</label>
                    <select
                      id="first_name0"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option selected value="1">South Africa</option>
                      <option value="2">International</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Next of Kin -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5>Next of Kin</h5>
                <p class="text-muted">
                  Please provide the contact information of a close relative so that we can contact them if we are unable to contact you.
                </p>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="first_name1" class="form-label"
                        >Full Name</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="first_name1"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="phone_number2" class="form-label"
                        >Phone</label
                      >
                      <input
                        type="number"
                        class="form-control"
                        id="phone_number2"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-5" />

          <!-- Next of Kin -->
          <div class="row gx-xl-5">
            <div class="col-md-4">
              <h5>Upload Documents</h5>
              <p class="text-muted">
                Please upload any supporting documents; the maximum file size is <strong>2MB</strong>, and the file types accepted are PDF, JPG, JPEG, and PNG.
              </p>
            </div>

            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="first_name1" class="form-label"
                      >ID copy</label
                    >
                    <input
                    type="file" 
                    class="form-control" 
                    id="idcopy"
                    />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="phone_number2" class="form-label"
                      >Proof of registration</label
                    >
                    <input
                    type="file" 
                    class="form-control" 
                    id="por"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


          <!-- Card footer -->
          <div class="card-footer text-end py-4 px-5 bg-light border-0">
            <button
              class="btn btn-link btn-rounded"
              data-ripple-color="primary"
            >
              Cancel
            </button>
            <button type="submit" class="btn btn-primary btn-rounded">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
                
                <!-- End PAge Content -->
                
            </div>
            
            <!-- End Container fluid  -->
            
            
            <!-- footer -->
            
            <footer class="footer"> © 2022 Falcon Tech Division by <a href="https://www.falcontechdiv.com/">falcontechdiv.com</a> </footer>
            
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
    <!-- Form -->
    <script src="./profile//js/validation-apply.js"></script>
    <script type="text/javascript" src="./profile/js/mdb.min.js"></script>
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