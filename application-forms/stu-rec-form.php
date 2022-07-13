<?php
  session_start();
    $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM registration WHERE email='$email' AND role ='student'";
  $result = mysqli_query($conn, $sql);
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['applied'] = $row['applied'];
    if($_SESSION['applied'] == 'Yes'){
      header('Location: ../Login.php');
    }
  }

  $query = "SELECT * FROM recruiter_application WHERE email='$email'";
  $run_query = mysqli_query($conn, $query);
  if($run_query ->num_rows > 0){
    $data = mysqli_fetch_assoc($run_query );

  }
?>
<!-- RECRUITER TRANSITION TO RESIDENT -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Accommodation Application</title>
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
          <h1>Accommodation Application</h1>
          <p>Enter your Personal Data</p>
        </div>

        <form id="res-form">
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
                    value="<?php echo $data['id_number'] ?>" 
                    readonly
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
                    value="<?php echo $data['phone'] ?>" 
                    readonly
                  />
                </div>

                <div class="mb-3">
                  <label for="gender-select" class="form-label"
                    >Gender</label>
                  <input
                    type="text"
                    id="gender-select"
                    name="gender"
                    class="form-control mb-3"
                    style="max-width: 300px"
                    value="<?php echo $data['gender'] ?>" 
                    readonly
                  />
                </div>

                <div class="mb-3">
                  <label for="race-select" class="form-label"
                    >Race</label>
                  <input
                    type="text"
                    id="race-select"
                    name="race"
                    class="form-control mb-3"
                    style="max-width: 300px"
                    value="<?php echo $data['race'] ?>" 
                    readonly
                  />
                </div>

                <div class="mb-3">
                  <label for="institution" class="form-label"
                    >Institution</label
                  >
                  <select
                    id="institution"
                    name="institution"
                    class="form-select mb-3 institution"
                    style="max-width: 300px"
                  >
                    <option selected value="University of Johannesburg">
                      University of Johannesburg
                    </option>
                    <option value="University of Witwatersrand">
                      University of Witwatersrand
                    </option>
                    <option value="Other">Other</option>
                  </select>
                </div>

                <div class="mb-3 ">
                  <input 
                    type="text"
                    id="other-institution"
                    name="otherinstitution"
                    class="form-control hide-other"
                    style="max-width: 300px"
                    placeholder="Enter your institution name"
                    >
                </div>

                <div class="mb-3">
                  <label for="course_name" class="form-label">Course</label>
                  <input
                    type="text"
                    class="form-control"
                    id="course_name"
                    name="course"
                    maxlength="100"
                    style="max-width: 500px"
                  />
                </div>

                <div class="mb-3">
                  <label for="yos" class="form-label">Year of study</label>
                  <select
                    id="yos"
                    name="yearstudy"
                    class="form-select mb-3"
                    style="max-width: 300px"
                  >
                    <option selected value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                    <option value="Honors">Honors</option>
                    <option value="Masters">Masters</option>
                    <option value="PhD">PhD</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="comp_year" class="form-label"
                    >Completion year</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="comp_year"
                    name="compyear"
                    style="max-width: 300px"
                  />
                </div>
                <div class="mb-3">
                  <label for="funding" class="form-label">Funding</label>
                  <select
                    id="funding"
                    name="funding"
                    class="form-select mb-3"
                    style="max-width: 300px"
                  >
                    <option selected value="NSFAS">NSFAS</option>
                    <option value="Bursary">Bursary</option>
                    <option value="Cash">Cash</option>
                  </select>
                </div>

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
                    style="max-width: 300px"
                  />
                </div>

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
                    style="max-width: 300px"
                    minlength='8'
                    maxlength='8'
                  />
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
                      >Residence address</label
                    >
                    <!-- Residence address -->
                    <select
                      id="first_choice"
                      name="firstchoice"
                      class="form-select mb-3 residence "
                     >
                      <option value="">
                        Choose Your First Choice
                      </option>
                      <option value="13 5th Street Vrededorp">
                        13 5th Street Vrededorp
                      </option>
                      <option value="19 Rus Road, Vredepark">
                        19 Rus Road, Vredepark
                      </option>
                      <option value="43/45 Aanbloom Street, Jan Hofmeyer">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="3 Pypie Draai, Jan Hofmeyer">
                        3 Pypie Draai, Jan Hofmeyer
                      </option>
                      <option value="50 Auckland Avenue, Auckland park">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>
                    <!-- Residence rooms -->
                    <select 
                    id="choices"
                    class="form-select mb-3 hide-other"
                    name="roomchoice1"

                    >

                    </select>

                    <select
                      id="second_choice"
                      name="secondchoice"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option value="">
                        Choose Your Second Choice
                      </option>
                      <option value="13 5th Street Vrededorp">
                        13 5th Street Vrededorp
                      </option>
                      <option value="19 Rus Road, Vredepark">
                        19 Rus Road, Vredepark
                      </option>
                      <option value="43/45 Aanbloom Street, Jan Hofmeyer">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="3 Pypie Draai, Jan Hofmeyer">
                        3 Pypie Draai, Jan Hofmeyer
                      </option>
                      <option value="50 Auckland Avenue, Auckland park">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>
                    <!-- Second choice room selection -->
                    <select 
                    id="choices2"
                    class="form-select mb-3 hide-other"
                    name="roomchoice2"
                    >

                    </select>

                    <select
                      id="third_choice"
                      name="thirdchoice"
                      class="form-select mb-3"
                      aria-label="Default select example"
                    >
                      <option value="">
                        Choose Your Third Choice
                      </option>
                      <option value="13 5th Street Vrededorp">
                        13 5th Street Vrededorp
                      </option>
                      <option value="19 Rus Road, Vredepark">
                        19 Rus Road, Vredepark
                      </option>
                      <option value="43/45 Aanbloom Street, Jan Hofmeyer">
                        43/45 Aanbloom Street, Jan Hofmeyer
                      </option>
                      <option value="3 Pypie Draai, Jan Hofmeyer">
                        3 Pypie Draai, Jan Hofmeyer
                      </option>
                      <option value="50 Auckland Avenue, Auckland park">
                        50 Auckland Avenue, Auckland park
                      </option>
                    </select>

                    <!-- Second choice room selection -->
                    <select 
                      id="choices3"
                      class="form-select mb-3 hide-other"
                      name="roomchoice3"

                    >
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
                  <input 
                  type="text" 
                  class="form-control" 
                  id="street" 
                  name="street" 
                  value="<?php echo $data['street'] ?>" 
                  readonly
                  />
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
                        value="<?php echo $data['city'] ?>" 
                        readonly
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="exampleInput8" class="form-label"
                      >Province</label
                    >
                    <input
                    type="text"
                      id="province" 
                      name="province"
                      class="form-control mb-3"
                      value="<?php echo $data['province'] ?>" 
                      readonly
                    />
       
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
                        value="<?php echo $data['postal_code'] ?>" 
                        readonly
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="first_name0" class="form-label">Country</label>
                    <input
                      type="text"
                      id="country" 
                      name="country" 
                      class="form-control mb-3"
                      value="<?php echo $data['country'] ?>" 
                      readonly
                    />
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
                        value="<?php echo $data['kin_name'] ?>" 
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
                        value="<?php echo $data['kin_number']?>" 
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
          institution:{
            required: true
          },
          otherinstitution:{
            required: true
          },
          course:{
            required: true,
            minlength: 2,
            letterswithbasicpunc: true
          },
          yearstudy:{
            required: true
          },
          compyear:{
            required: true
          },
          studentnumber:{
            required: true,
            studentNumber: true
          },
          referralcode:{
            minlength: 8,
            maxlength: 8
          },
          firstchoice:{
            required: true
          },
          roomchoice1:{
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
          },
          idcopy:{
            required: true
          },
          proof:{
            required: true
          }

        }
      });
      //saves file name if valid
      $("#por").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings("#por").addClass("selected").html(fileName);

        });
        
      $("#idcopy").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings("#idcopy").addClass("selected").html(fileName);

        });

        $("#submit-btn").on("click", function() {

          $("#fillAll").removeClass('alert alert-danger form-control');
          if($('#res-form').valid()){
            $.ajax(
            {
              url: "./rec-transition.php",
              method: "POST",
              data: $("#res-form").serialize(),
              success: function(response){
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


document.getElementById('por').onchange = function (){
    var image=document.getElementById('por').value;
    if(image!=''){
      var checkimg = image.toLowerCase();
      if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.PDF|\.pdf)$/)){
          document.getElementById('err-message').innerHTML="The file types accepted are PDF, JPG, JPEG, and PNG";
          document.getElementById('por').value="";
      }else{
        document.getElementById('err-message').nnerHTML="";
      }
      var image=document.getElementById('por');
      var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
      if (size > 2){
          document.getElementById('err-message').innerHTML="Please Select Size Less Than 2 MB";
          document.getElementById('por').value="";
      } else {
            document.getElementById('err-message').innerHTML="";

      }
    }

}
document.getElementById('idcopy').onchange = function (){
    var image=document.getElementById('idcopy').value;
    if(image!=''){
      var checkimg = image.toLowerCase();
      if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.PDF|\.pdf)$/)){
          document.getElementById('error-message').innerHTML="The file types accepted are PDF, JPG, JPEG, and PNG";
          document.getElementById('idcopy').value="";
      }else{
        document.getElementById('error-message').nnerHTML="";
      }
      var image=document.getElementById('idcopy');
      var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
      if (size > 2){
          document.getElementById('error-message').innerHTML="Please select size less than 2 MB";
          document.getElementById('idcopy').value="";
      } else {
            document.getElementById('error-message').innerHTML="";

      }
    }

}
  </script>
  </body>
</html>
