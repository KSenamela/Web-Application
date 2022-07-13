<?php
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };
  
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM registration WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['applied'] = $row['applied'][1];
  if($_SESSION['applied'] == 'Yes'){
      header('Location: ../Login.php');
  }
?>
<!-- STUDENT ACCOUNT APPLYING FOR RECRUITER POSITION -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Recruiter Application</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/cust.css" />

    <link rel="icon" type="image/png" sizes="16x16" href="../img/Studentinn-icon.png">

    <style>
      .hide-other{
        display: none;
      }
      .border-color{
        border: 2px solid green;
      }

    </style>
  </head>

  <body>
    <div class="container my-5">
      <div class="card mx-auto">
        <div class="form-heading">
          <h1>Recruiter Application</h1>
          <p>Enter your Personal Data</p>
        </div>

        <form id="res-form">
          <!-- Card body -->
          <div class="card-body px-5 mt-4 mb-3">
              <div class="row gx-xl-5">
                <h5>NOTICE!</h5>
                <p class="text-muted">
                  This application allows you to have two accounts with one email account. After applying you will be able to switch between your student account and recruiter account. When you login, you can choose your role as a recruiter or student, It does not matter, as long as your password is correct, you will be logged in.
                </p>
              </div>
            <!-- Personal details -->
            <div class="row gx-xl-5">
              <div class="col-md-8">
                <div class="mb-3">
                </div>
              </div>
            </div>


            <!-- Residence -->
            <div class="row gx-xl-5">
             

              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-8">
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Home Address -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
              </div>
              <div class="col-md-8">
                <div class="mb-3">
                </div>
              </div>
            </div>

            <!-- Next of Kin -->
            <div class="row gx-xl-5">
              <div class="col-md-4">
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
     
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <!-- Next of Kin -->
          <div class="row gx-xl-5">
            <div class="col-md-4">
              
            </div>

            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
        
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

          <div id="fillAll" class="mb-3"></div>

          </center>
          <!-- Card footer -->
          <div class="card-footer text-end py-4 px-5 bg-light border-0">
            <a
              class="btn btn-link btn-rounded"
              data-ripple-color="primary"
              id="cancel"
              href="../Login.php"
            >
              Cancel
            </a>
            <input type="button" id="submit-btn" value="submit"class="btn btn-primary btn-rounded">
            <!-- <button type="submit" class="btn btn-primary btn-rounded" id="submit-btn">
              Submit
            </button> -->
          </div>
        </form>
      </div>
    </div>
    <!-- MDB -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/sweetalert2@11.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

  <script>

    $(document).ready(function() {
      $("#fillAll").removeClass("alert alert-danger");
        $("#submit-btn").on("click", function(){
          $.ajax({
            url: "./transition.php",
            method: "POST",
            dataType: "text",
            data: {
              transition_active: 1
            },success: function(response){
                //after getting a success response from the server, show user a sweetAlert and redirect to login
                if(response === 'success'){
                  Swal.fire({
                  icon: 'success',
                  title: 'Application Successful!',
                  text: 'Check your status under APPLICATIONS on your profile!',
                  }).then(function(){
                    window.location.href = "../Login.php";
                  })
                }else{
                  $("#fillAll").html(response);
                  $("#fillAll").addClass("alert alert-danger");
                }
              }
          })

        });

})
  </script>
  </body>
</html>
