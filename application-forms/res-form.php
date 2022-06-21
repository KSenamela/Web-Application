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
  </head>

  <body>
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
    <!-- MDB -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="./js/validation-apply.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>
</html>
