<?php 
    // error_reporting(0);
    session_start();
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    //If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['email'])) {
        header('Location: ./login.php');
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
                            <a class="nav-link" href="students_management.php" style="background-color: grey">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Student Records
                            </a>
                            <a class="nav-link" href="recruiters_management.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Recruiter Records
                            </a>
                            <a class="nav-link" href="payment-tracker.php">
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
                        Admin/Student/Recruiter
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
    <main>
        <!-- VIEW MODAL -->
            <div class="modal fade" id="view" tabindex="-1" aria-labelledby="view" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Application View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="res-form" method="POST" >
          <!-- Card body -->
          <div class="card-body px-5 mt-4">
            <!-- Personal details -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Personal Details</h5>
                <p class="text-muted" >
                  Please fill out this part with your personal information, and
                  be sure to complete out all of the form's fields.
                </p>
              </div>
                <!-- First Name -->
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="firstname"
                    maxlength="50"
                    style="max-width: 500px; background-color: #FFF"
                    readonly
                    
                  />
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="lastname"
                    maxlength="50"
                    style="max-width: 500px; background-color: #FFF"
                    readonly
                  />
                </div>
                <!-- ID Number/Passport Number-->
                <div class="mb-3">
                  <label for="id_number" class="form-label">ID number/Passport number</label>

                  <input
                    type="text"
                    class="form-control"
                    id="id_number"
                    name="idnumber"
                    minlength="9"
                    maxlength="13"
                    style="max-width: 500px; background-color: #FFF"
                    readonly

                  />
                </div>
                <!-- Email Address -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    maxlength="100"
                    style="max-width: 500px; background-color: #FFF"
                    readonly
                  />
                </div>
                <!-- Phone Number -->
                <div class="mb-3">
                  <label for="phone_number" class="form-label"
                    >Phone number</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="phone_number"
                    name="phonenumber"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px; background-color: #FFF"
                    readonly

                  />
                </div>
                <!-- Gender -->
                <div class="mb-3">
                  <label for="gender-select" class="form-label"
                    >Gender</label>
                  <input
                    id="gender-select"
                    name="gender"
                    class="form-select mb-3"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  >
                </div>
                <!-- Race -->
                <div class="mb-3">
                  <label for="race-select" class="form-label"
                    >Race</label>
                  <input
                    id="race-select"
                    name="race"
                    class="form-select mb-3"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  >
                </div>
                <!-- institution -->
                <div class="mb-3">
                  <label for="institution" class="form-label"
                    >Institution</label
                  >
                  <input
                    id="institution"
                    name="institution"
                    class="form-select mb-3 institution"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  >
                </div>
                <!-- Course -->
                <div class="mb-3">
                  <label for="course_name" class="form-label">Course</label>
                  <input
                    type="text"
                    class="form-control"
                    id="course_name"
                    name="course"
                    maxlength="100"
                    style="max-width: 500px; background-color: #FFF"
                    readonly

                  />
                </div>
                <!-- Year of study -->
                <div class="mb-3">
                  <label for="yos" class="form-label">Year of study</label>
                  <input
                    id="yos"
                    name="yearstudy"
                    class="form-select mb-3"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  >
                </div>
                <!-- Completion Year -->
                <div class="mb-3">
                  <label for="comp_year" class="form-label"
                    >Completion year</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="comp_year"
                    name="compyear"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  />
                </div>
                <!-- Funding -->
                <div class="mb-3">
                  <label for="funding" class="form-label">Funding</label>
                  <input
                    id="funding"
                    name="funding"
                    class="form-select mb-3 funding"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  >
                </div>
                <!-- Student number -->
                <div class="mb-3">
                  <label for="student_number" class="form-label"
                    >Student number</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="student_number"
                    name="studentnumber"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px; background-color: #FFF"
                    readonly
                  />
                </div>
                <!-- Referral code -->
                <div class="mb-3">
                  <label for="referral_code" class="form-label"
                    >Referral code</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="referral_code"
                    name="referralcode"
                    placeholder="Optional"
                    style="max-width: 300px; background-color: #FFF"
                    minlength='8'
                    maxlength='8'
                    readonly
                  />
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Residence -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Residence</h5>
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
                      >Residence address</label
                    >
                    <!-- Residence address -->
                    <input
                      id="first_choice"
                      name="firstchoice"
                      class="form-select mb-3 residence "
                      style="border: 2px solid green"
                      readonly

                     >
                    <!-- Residence rooms -->
                    <input
                    id="choices"
                    class="form-select mb-3 hide-other"
                    name="roomchoice1"
                    readonly

                    >

                    <input
                      id="second_choice"
                      name="secondchoice"
                      class="form-select mb-3"
                      style="border: 2px solid green"

                      readonly

                    >

                    <!-- Second choice room selection -->
                    <input 
                    id="choices2"
                    class="form-select mb-3 hide-other"
                    name="roomchoice2"
                    readonly

                    >

                    <input
                      id="third_choice"
                      name="thirdchoice"
                      class="form-select mb-3"
                      style="border: 2px solid green"
                      readonly

                    >


                    <!-- Second choice room selection -->
                    <input
                      id="choices3"
                      class="form-select mb-3 hide-other"
                      name="roomchoice3"
                      readonly

                    >
            
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Home Address -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Home address</h5>
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
                  <input type="text" class="form-control" id="street" name="street" style="background-color: #FFF" readonly/>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInput7" class="form-label">City</label>
                      <input
                        type="text"
                        class="form-control"
                        id="city"
                        name="city"
                        style="background-color: #FFF"
                        readonly

                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="exampleInput8" class="form-label"
                      >Province</label
                    >
                    <input
                      id="province" 
                      name="province"
                      class="form-select mb-3"
                      style="background-color: #FFF"
                      readonly

                    >

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
                        id="postal"
                        name="postal"
                        style="background-color: #FFF"
                        readonly

                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="first_name0" class="form-label">Country</label>
                    <input
                      id="country" 
                      name="country" 
                      class="form-select mb-3"
                      style="background-color: #FFF"
                      readonly

                    >

                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Next of Kin -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Next of Kin</h5>
                <p class="text-muted">
                  Please provide the contact information of a close relative so that we can contact them if we are unable to contact you.
                </p>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="first_name1" class="form-label"
                        >Full name</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="kin_name"
                        name="kinname"
                        style="background-color: #FFF"
                        readonly

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
                        id="kin_phone"
                        name="kinphone"
                        style="background-color: #FFF"
                        readonly

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
              <h5 style="color: brown !important">Upload Documents</h5>
              <p class="text-muted">
                Please upload the required supporting documents; the maximum file size is <strong>2MB</strong>, and the file types accepted are PDF, JPG, JPEG, and PNG.
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
                    name="idcopy"
                    readonly

                    />
                    <span id="error-message"></span>
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
                    name="proof"
                    readonly
                    
                    />
        
                    <span id="err-message"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                  <label id="bursar-label" for="bursaryLetter" class="form-label hide-other"
                      >Bursary Letter</label
                    >
                    <input
                    type="file" 
                    class="form-control hide-other" 
                    id="bursaryLetter"
                    name="bursaryLetter"
                    readonly
                    />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
    
        
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </form>
                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
        <!-- VIEW MODAL END SECTION -->
        
        <!-- EDIT MODAL SECTION-->

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="Edit-res-form" method="POST" >
          <!-- Card body -->
          <div class="card-body px-5 mt-4">
            <!-- Personal details -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Personal Details</h5>
                <p class="text-muted" >
                  Please fill out this part with your personal information, and
                  be sure to complete out all of the form's fields.
                </p>
              </div>
                <!-- First Name -->
              <div class="col-md-8">
                <div class="mb-3">
                  <label for="first_name" class="form-label">First name</label>
                  <input
                    type="text"
                    class="form-control first_name"
                    id="first_name"
                    name="firstname"
                    maxlength="50"
                    style="max-width: 500px; background-color: #FFF"
                    
                  />
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last name</label>
                  <input
                    type="text"
                    class="form-control last_name"
                    id="last_name"
                    name="lastname"
                    maxlength="50"
                    style="max-width: 500px; background-color: #FFF"
                  />
                </div>
                <!-- ID Number/Passport Number-->
                <div class="mb-3">
                  <label for="id_number" class="form-label">ID number/Passport number</label>

                  <input
                    type="text"
                    class="form-control id_number"
                    id="id_number"
                    name="idnumber"
                    minlength="9"
                    maxlength="13"
                    style="max-width: 500px;"
                    readonly
                  />
                 
                </div>
                <!-- Email Address -->
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input
                    type="email"
                    class="form-control email"
                    id="email"
                    name="email"
                    maxlength="100"
                    style="max-width: 500px; background-color: #FFF"
                  />
                </div>
                <!-- Phone Number -->
                <div class="mb-3">
                  <label for="phone_number" class="form-label"
                    >Phone number</label
                  >
                  <input
                    type="number"
                    class="form-control phone_number"
                    id="phone_number"
                    name="phonenumber"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px; background-color: #FFF"

                  />
                </div>
                <!-- Gender -->
                <div class="mb-3">
                  <label for="gender-select" class="form-label"
                    >Gender</label>
                  <input
                    id="gender-select"
                    name="gender"
                    class="form-select mb-3 gender-select"
                    style="max-width: 300px; background-color: #FFF"
                  >
                </div>
                <!-- Race -->
                <div class="mb-3">
                  <label for="race-select" class="form-label"
                    >Race</label>
                  <input
                    id="race-select"
                    name="race"
                    class="form-select mb-3 race-select"
                    style="max-width: 300px; background-color: #FFF"
                  >
                </div>
                <!-- institution -->
                <div class="mb-3">
                  <label for="institution" class="form-label"
                    >Institution</label
                  >
                  <input
                    id="institution"
                    name="institution"
                    class="form-select mb-3 institution"
                    style="max-width: 300px; background-color: #FFF"
                  >
                </div>
                <!-- Course -->
                <div class="mb-3">
                  <label for="course_name" class="form-label">Course</label>
                  <input
                    type="text"
                    class="form-control course_name"
                    id="course_name"
                    name="course"
                    maxlength="100"
                    style="max-width: 500px; background-color: #FFF"

                  />
                </div>
                <!-- Year of study -->
                <div class="mb-3">
                  <label for="yos" class="form-label">Year of study</label>
                  <input
                    id="yos"
                    name="yearstudy"
                    class="form-select mb-3 yos"
                    style="max-width: 300px; background-color: #FFF"
                  >
                </div>
                <!-- Completion Year -->
                <div class="mb-3">
                  <label for="comp_year" class="form-label"
                    >Completion year</label
                  >
                  <input
                    type="date"
                    class="form-control comp_year"
                    id="comp_year"
                    name="compyear"
                    style="max-width: 300px; background-color: #FFF"
                  />
                </div>
                <!-- Funding -->
                <div class="mb-3">
                  <label for="funding" class="form-label">Funding</label>
                  <input
                    id="funding"
                    name="funding"
                    class="form-select mb-3 funding"
                    style="max-width: 300px; background-color: #FFF"
                  >
                </div>
                <!-- Student number -->
                <div class="mb-3">
                  <label for="student_number" class="form-label"
                    >Student number</label
                  >
                  <input
                    type="number"
                    class="form-control student_number"
                    id="student_number"
                    name="studentnumber"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px; background-color: #FFF"
                  />
                </div>
                <!-- Referral code -->
                <div class="mb-3">
                  <label for="referral_code" class="form-label"
                    >Referral code</label
                  >
                  <input
                    type="text"
                    class="form-control referral_code"
                    id="referral_code"
                    name="referralcode"
                    placeholder="Optional"
                    style="max-width: 300px; background-color: #FFF"
                   
                  />
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Residence -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Residence</h5>
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
                      >Residence address</label
                    >
                    <!-- Residence address -->
                    <input
                      id="first_choice"
                      name="firstchoice"
                      class="form-select mb-3 residence first_choice"
                      style="border: 2px solid green"
                      readonly
                     >
                    <!-- First choice room -->
                    <input
                    id="choices"
                    class="form-select mb-3 hide-other choices"
                    name="roomchoice1"
                    readonly

                    >
                    <!-- Residence address 2-->
                    <input
                      id="second_choice"
                      name="secondchoice"
                      class="form-select mb-3 second_choice"
                      style="border: 2px solid green"
                      readonly

                    >
                    <!-- Second choice room -->
                    <input 
                    id="choices2"
                    class="form-select mb-3 hide-other choices2"
                    name="roomchoice2"

                    >
                    <!-- Residence address 3 -->
                    <input
                      id="third_choice"
                      name="thirdchoice"
                      class="form-select mb-3 third_choice"
                      style="border: 2px solid green"
                      readonly

                    >
                    <!-- Third choice room-->
                    <input
                      id="choices3"
                      class="form-select mb-3 hide-other choices3"
                      name="roomchoice3"
                      readonly

                    >
            
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Home Address -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Home address</h5>
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
                  <input type="text" class="form-control street" id="street" name="street" style="background-color: #FFF" readonly/>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="exampleInput7" class="form-label">City</label>
                      <input
                        type="text"
                        class="form-control city"
                        id="city"
                        name="city"
                        style="background-color: #FFF"

                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="exampleInput8" class="form-label"
                      >Province</label
                    >
                    <input
                      id="province" 
                      name="province"
                      class="form-select mb-3 province"
                      style="background-color: #FFF"

                    >

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
                        class="form-control postal"
                        id="postal"
                        name="postal"
                        style="background-color: #FFF"

                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <input
                      id="country" 
                      name="country" 
                      class="form-select mb-3 country"
                      style="background-color: #FFF"

                    >

                  </div>
                </div>
              </div>
            </div>

            <hr class="my-5" />

            <!-- Next of Kin -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
                <h5 style="color: brown !important">Next of Kin</h5>
                <p class="text-muted">
                  Please provide the contact information of a close relative so that we can contact them if we are unable to contact you.
                </p>
              </div>

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="kin_name" class="form-label"
                        >Full name</label
                      >
                      <input
                        type="text"
                        class="form-control kin_name"
                        id="kin_name"
                        name="kinname"
                        style="background-color: #FFF"

                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="kin_phone" class="form-label"
                        >Phone</label
                      >
                      <input
                        type="number"
                        class="form-control kin_phone"
                        id="kin_phone"
                        name="kinphone"
                        style="background-color: #FFF"

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
              <h5 style="color: brown !important">Upload Documents</h5>
              <p class="text-muted">
                Please upload the required supporting documents; the maximum file size is <strong>2MB</strong>, and the file types accepted are PDF, JPG, JPEG, and PNG.
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
                    name="idcopy"

                    />
                    <span id="error-message"></span>
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
                    name="proof"
                    
                    />
        
                    <span id="err-message"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                  <label id="bursar-label" for="bursaryLetter" class="form-label hide-other"
                      >Bursary Letter</label
                    >
                    <input
                    type="file" 
                    class="form-control hide-other" 
                    id="bursaryLetter"
                    name="bursaryLetter"
                    />
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <center>

          <div id="error-saving" class="mb-3"></div>

          </center>
        </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveEdit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        <!-- EDIT MODAL END SECTION--> 
        <div class="container-fluid px-4">
            <h1 class="mt-4">Database</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Student Records</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Give admin instructions on how to perform crud on the table below
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header" style="background-color: darkblue; color: white;">
                    <i class="fas fa-table me-1"></i>
                    Student Records
                </div>
                <!-- id="studentTable" -->
                <div class="card-body">
                    <table  id="datatablesSimple" >
                        <thead style="background: #41295a; color: #fff">
                            <tr>
                                <th>ID No.</th>
                                <th>Full Name</th>
                                <th>Phone No.</th>
                                <th>Residence Address</th>
                                <th>Room Number</th>
                                <th>Status</th>
                                <th>Status Change</th>
                                <th>Application Date</th>
                                <th>Controllers</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT 
                                    student_application.id_number,
                                    first_name,
                                    last_name,
                                    email,
                                    phone,
                                    residence_address,
                                    room_number,
                                    residence_application.status,
                                    residence_application.application_date
                                 FROM student_application
                                 INNER JOIN residence_application
                                 ON student_application.id_number = residence_application.id_number";
                                $run_query = mysqli_query($conn, $sql);

                                if($run_query->num_rows > 0){
                                    foreach( $run_query as $row){
                                    ?>
                                        <tr>
                                            <td><?=$row['id_number']?></td>
                                            <td><?=$row['first_name'] . ' ' . $row['last_name']?></td>
                                            <td><?=$row['phone']?></td>
                                            <td><?=$row['residence_address']?></td>
                                            <td><?=$row['room_number']?></td>
                                            <?php
                                            if($row['status'] == 'Processing'){
                                                ?>

                                                    <td style="color:orange; font-weight:bold">  
                                                        <?= $row['status'] ?>
                                                    </td>
                                                <?php
                                            }else if($row['status'] == 'Accepted'){
                                                ?>

                                                <td style="color:limegreen; font-weight:bold">
                                                    <?= $row['status'] ?>
                                                </td>
                                            <?php
                                            }else{
                                                ?>
                                                <td style="color:red; font-weight:bold">  
                                                    <?= $row['status'] ?>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <td>
                                                <button type="button" name="accept" class="accept btn btn-outline-success mb-2" style="border-radius:10px;" value="<?php echo $row['id_number'] . '.' . $row['residence_address'] . '.' . $row['room_number']?>">Accept</button>
                                                <button type="button" name="reject" class="reject btn btn-outline-danger mb-2" style="border-radius:10px;"  value="<?php echo $row['id_number'] . '.' . $row['residence_address'] . '.' . $row['room_number']?>">Reject</button>
                                            
                                            </td>

                                            <td><?=$row['application_date']?></td>

                                            <td>
                                                <button type="button" name="view" class="view btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#view" value="<?php echo $row['id_number'] ?>">View</button>
                                                <button type="button" name="edit" class="edit btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#edit" value="<?php echo $row['id_number'] ?>">Edit</button>
                                                <button type="button" name="delete" class="delete btn btn-danger mb-2" value="<?php echo $row['id_number'] ?>">Delete</button>
                                               
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

        <script src="./js/jquery-3.6.0.min.js"></script>
        <script src="./js/jquery.validate.min.js"></script>
        <!-- <script src="./js/additional-methods.js/"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        

        <script>
            $(document).ready(function() {

              $("#Edit-res-form").validate({
                    rules:{
                      firstname:{
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                        
                      },
                      lastname:{
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                      },
                      idnumber:{
                        required: true,
                      },
                      email:{
                        required: true,
                      },
                      phonenumber:{
                        required: true,
                      },
                      gender:{
                        required: true
                      },
                      race:{
                        required: true
                      },
                      institution:{
                        required: true
                      },
                      funding:{
                        required: true
                      },
                      course:{
                        required: true,
                        minlength: 2,
                      },
                      yearstudy:{
                        required: true
                      },
                      compyear:{
                        required: true
                      },
                      studentnumber:{
                        required: true,
                      },
              
                      street:{
                        required: true,
                        minlength: 5,
                        maxlength: 50
                      },
                      city:{
                        required: true,
                        minlength: 2,
                        maxlength: 50,

                      },
                      province:{
                        required: true,
                        minlength: 2,
                        maxlength: 50,

                      },
                      country:{
                        required: true,
                        minlength: 2,
                        maxlength: 50,
                      },
                      postal:{
                        required: true,
                        minlength: 4
                      },
                      kinname:{
                        required: true,
                        minlength: 2
                      },
                      kinphone:{
                        required: true
                      
                      }

                    }
                  });

                $(document).on('click', '.accept', function(){


                    var id_number = $(this).val();
                    $.ajax({
                        url: './statusUpdateStu.php?accept=' + id_number,
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
                        url: './statusUpdateStu.php?reject=' + id_number,
                        method: 'GET',
                        success : function(response){
                            
                            if(response == "success"){
                                location.reload(true);
                            }
                        },
                    });
                });

                //edit button pressed
                
                $(document).on('click', '.edit', function(){
                    
                    var id_number = $(this).val();
                    $.ajax({
                        url: './editStu.php?edit=' + id_number,
                        type: 'GET',
                        success : function(response){
                            
                            var data = $.parseJSON(response); 
                           
                            $(".first_name").val(data.first_name);
                            $(".last_name").val(data.last_name);
                            $(".id_number").val(data.id_number);
                            $(".email").val(data.email);
                            $(".phone_number").val(data.phone);
                            $(".gender-select").val(data.gender);
                            $(".race-select").val(data.race);
                            $(".institution").val(data.institution);
                            $(".course_name").val(data.course);
                            $(".yos").val(data.year_of_study);
                            $(".comp_year").val(data.study_completion_date);
                            $(".funding").val(data.funding_type);
                            $(".student_number").val(data.student_number);
                            $(".referral_code").val(data.referral_code);
                            $(".first_choice").val(data.first_res_choice);
                            $(".choices").val(data.first_room_choice);
                            $(".second_choice").val(data.second_res_choice);
                            $(".choices2").val(data.second_room_choice);
                            $(".third_choice").val(data.third_res_choice);
                            $(".choices3").val(data.third_room_choice);
                            $(".street").val(data.street);
                            $(".city").val(data.city);
                            $(".province").val(data.province);
                            $(".postal").val(data.postal_code);
                            $(".country").val(data.country);
                            $(".kin_name").val(data.kin_name);
                            $(".kin_phone").val(data.kin_number);

              
                        },
                    });
                });

                //Save edited changes 
                $(document).on('click', '#saveEdit', function(){
                  if($("#Edit-res-form").valid()){
                    $.ajax({
                      url: './editStu.php',
                      type: 'POST',
                      data: $("#Edit-res-form").serialize(),
                      success : function(response){ 
                        if(response == "success"){
                          $("#edit").modal('hide');
                          location.reload(true);
                        }else{
                          $("#error-saving").html(response);
                        }
                    }
                    });
                  }
                });
                //View button pressed 
                $(document).on('click', '.view', function(){


                    var id_number = $(this).val();

                    $.ajax({
                        url: './viewStu.php?view=' + id_number,
                        type: 'GET',
                        success : function(response){
                            //parse the response and make data accessible
                            var data = $.parseJSON(response); 

                            $("#first_name").val(data.first_name);
                            $("#last_name").val(data.last_name);
                            $("#id_number").val(data.id_number);
                            $("#email").val(data.email);
                            $("#phone_number").val(data.phone);
                            $("#gender-select").val(data.gender);
                            $("#race-select").val(data.race);
                            $("#institution").val(data.institution);
                            $("#course_name").val(data.course);
                            $("#yos").val(data.year_of_study);
                            $("#comp_year").val(data.study_completion_date);
                            $("#funding").val(data.funding_type);
                            $("#student_number").val(data.student_number);
                            $("#referral_code").val(data.referral_code);
                            $("#first_choice").val(data.first_res_choice);
                            $("#choices").val(data.first_room_choice);
                            $("#second_choice").val(data.second_res_choice);
                            $("#choices2").val(data.second_room_choice);
                            $("#third_choice").val(data.third_res_choice);
                            $("#choices3").val(data.third_room_choice);
                            $("#street").val(data.street);
                            $("#city").val(data.city);
                            $("#province").val(data.province);
                            $("#postal").val(data.postal_code);
                            $("#country").val(data.country);
                            $("#kin_name").val(data.kin_name);
                            $("#kin_phone").val(data.kin_number);
         
                        },
                    });
                });

                //DELETE a student application

                $(document).on('click', '.delete', function(){

                    var id_number = $(this).val();
                    $.ajax({
                        url: './deleteRecords.php?delete=' + id_number,
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