<?php 
    error_reporting(0);
    include('./includes/navbar_register.php');
    
    // We need to use sessions, so you should always start sessions using the below code.
    //If the user is not logged in redirect to the login page...
   

?>


<div class="left flex-grow-1 image-box position-relative">
                <div class="image-filter position-absolute"></div>
                <div class="image-bg position-absolute" id="insertImgSlide"
                    style="background-image: url(./img/bathroom.jpg);">

                </div>
            </div>
            <div class="right w-50 d-flex justify-content-center align-items-center">
                <div class="formBx">
                    <h2>Register</h2>
                    <small id="response-msg"></small>
                    <form >
                        <!-- First name -->
                        <div class="inputBx">
                            <span>First Name</span>
                            <input type="text" name="first_name" id="first_name">
                            <span id="fname_error" class="error-message"></span>
                        </div>
                        <!-- Last Name -->
                        <div class="inputBx">
                            <span>Last Name</span>
                            <input type="text" name="last_name" id="last_name" >
                            <span id="lname_error" class="error-message"></span>

                        </div>
                        <!-- Username textbox -->
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="email" name="email" id="email">
                            <span id="email_error" class="error-message"></span>

                        </div>
                        <!-- Password textbox -->
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password" name="password" id="password">
                            <span id="pwd_error" class="error-message"></span>

                        </div>
                        <!-- Repeat Password -->
                        <div class="inputBx">
                            <span>Repeat Password</span>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                            <span id="Cpwd_error" class="error-message"></span>

                        </div>

                         <!-- Radio selection -->
                         <div class="myradio-btn">
                            <span>I am registering as a:</span>
                            <div class="radio-btn">
                                <input type="radio" class="input-radio-btn" id="optionRadio1" value="student" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio1">Student</label>
                                <input type="radio" class="input-radio-btn" id="optionRadio2" value="recruiter" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio2">Recruiter</label>
                            </div>
            
                            <span id="radio_error" class="error-message" style="color:red;display: inline-block; font-size:14px"></span>
                            
                        </div>
                        <!-- Password conditions -->
                        <div class="remember">
                            <p> Password must contain 8-digits and must consist of uppercase, lowercase and special
                                characters</p>
                        </div>
                        <!-- submit button/sign up button -->
                        <div class="inputBx">
                            <input type="button" value="Sign up" name="submit" id="btn-register">
                        </div>
                        <!-- Sign in link -->
                        <div class="inputBx">
                            <p>You have an account? <a href="login.php">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/register-validation.js"></script>

    

</body>

</html>
