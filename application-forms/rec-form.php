<?php
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };

  if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];
      $sql = "SELECT * FROM registration WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['applied'] = $row['applied'];
      if($_SESSION['applied'] == 'Yes'){
          header('Location: ../Login.php');
    }
  }else{
    header('Location: ../Login.php');

  }

?>
<!-- APPLICATION FOR RECRUITER -->
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

      .loader{
        position: fixed;
        top: 0;
        left: 0;
        background: lightgrey;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
      }

      .disappear{
        display: none;
      }
    </style>
  </head>

  <body>

  <div class="loader disappear">
      <img src="./img/150x150.gif">
  </div>

    <div class="container my-5">
      <div class="card mx-auto">
        <div class="form-heading">
          <h1>Recruiter Application</h1>
          <p>Enter your Personal Data</p>
        </div>

        <form id="res-form">
          <!-- Card body -->
          <div class="card-body px-5 mt-4 mb-3">
             
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
                    name="firstname"
                    maxlength="50"
                    style="max-width: 500px"
                    value="<?php echo $_SESSION['firstname'] ?>" 
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="last_name" class="form-label">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="lastname"
                    maxlength="50"
                    style="max-width: 500px"
                    value="<?php echo $_SESSION['lastname'] ?>" 
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="id_number" class="form-label">ID number/Passport number</label>
                  <!-- min="0" oninput="validity.valid||(value='');" --These attributes prevent negative numbers from being entered by user-->
                  <input
                    type="text"
                    class="form-control"
                    id="id_number"
                    name="idnumber"
                    minlength="9"
                    maxlength="13"
                    style="max-width: 500px"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    maxlength="100"
                    style="max-width: 500px"
                    value="<?php echo $_SESSION['email'] ?>" 
                    readonly
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
                    name="phonenumber"
                    min="0"
                    oninput="validity.valid||(value='');"
                    style="max-width: 300px"
                  />
                </div>

                <div class="mb-3">
                  <label for="gender-select" class="form-label"
                    >Gender</label>
                  <select
                    id="gender-select"
                    name="gender"
                    class="form-select mb-3"
                    style="max-width: 300px"
                  >
                    <option selected value="Male">
                      Male
                    </option>
                    <option value="Female">
                      Female
                    </option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="race-select" class="form-label"
                    >Race</label>
                  <select
                    id="race-select"
                    name="race"
                    class="form-select mb-3"
                    style="max-width: 300px"
                  >
                    <option selected value="Black">
                      Black
                    </option>
                    <option value="White">
                      White
                    </option>
                    <option value="Coloured">
                      Coloured
                    </option>
                    <option value="Indian">
                      Indian
                    </option>
                    <option value="Asian">
                      Asian
                    </option>
                  </select>
                </div>


      
              </div>
            </div>

            <hr class="my-5" />

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
                  <input type="text" class="form-control" id="street" name="street"/>
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
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="exampleInput8" class="form-label"
                      >Province</label
                    >
                    <select
                      id="province" 
                      name="province"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option selected value="Eastern Cape">Eastern Cape</option>
                      <option value="Free State">Free State</option>
                      <option value="Gauteng">Gauteng</option>
                      <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                      <option value="Limpopo">Limpopo</option>
                      <option value="Mpumalanga">Mpumalanga</option>
                      <option value="Northern Cape">Northern Cape</option>
                      <option value="North West">North West</option>
                      <option value="Western Cape">Western Cape</option>
                      <option value="International">International</option>
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
                        id="postal"
                        name="postal"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="first_name0" class="form-label">Country</label>
                    <select
                      id="country" 
                      name="country" 
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option selected value="South Africa">South Africa</option>
                      <option value="International">International</option>
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
                        >Full name</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="kin_name"
                        name="kinname"
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
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <hr class="my-5" />
          <!-- Next of Kin -->
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
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/additional-methods.js"></script>
    <script src="../js/sweetalert2@11.js"></script>
    <script src="./js/validation-apply.js"></script>
    <script src="./js/res.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>

  <script>

    $(document).ready(function() {
      
        $("#res-form").validate({
        rules:{
          firstname:{
            required: true,
            minlength: 2,
            maxlength: 50,
            lettersonly: true
          },
          lastname:{
            required: true,
            minlength: 2,
            maxlength: 50,
            lettersonly: true
          },
          idnumber:{
            required: true,
          },
          email:{
            required: true,
            emailAddress: true
          },
          phonenumber:{
            required: true,
            saPhoneNumber: true,
            integer: true
          },
          gender:{
            required: true
          },
          race:{
            required: true
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
            cityVal: true

          },
          postal:{
            required: true,
            minlength: 4,
            integer: true
          },
          kinname:{
            required: true,
            cityVal: true,
            minlength: 2
          },
          kinphone:{
            required: true,
            saPhoneNumber: true,
            integer: true
          }
        }
      });

        $("#submit-btn").on("click", function() {
          $(".loader").removeClass("disappear");

          $("#fillAll").removeClass('alert alert-danger form-control');
          if($('#res-form').valid()){
            $.ajax(
            {
              url: "./rec-apply.php",
              method: "POST",
              data: $("#res-form").serialize(),
              success: function(response){
                //after getting a success response from the server, show user a sweetAlert and redirect to login
                if(response === 'success'){
                  $(".loader").addClass("disappear");

                  Swal.fire({
                    icon: 'success',
                    title: 'Application Successful!',
                    text: 'Check your status under APPLICATIONS on your profile!',
                  }).then(function(){
                    window.location.href = "../Login.php";
                  })
                }else{
                  $("#fillAll").html(response);
                  $("#fillAll").addClass('alert alert-danger form-control');

                }
                
              },
              dataType: "text"
            }
          )
          $("#fillAll").html("");
        }else{
            $("#fillAll").html("Please fill all fields");
            $("#fillAll").addClass('alert alert-danger form-control');

        }
      })
      });



  </script>
  </body>
</html>
