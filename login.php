<?php 
    error_reporting(0);
    // We need to use sessions, so you should always start sessions using the below code.
    include "./server/dbconnect_server.php";
    include('./includes/navbar_login.php');
    //If the user is not logged in redirect to the login page...
    if (isset($_SESSION['email'])) {
        if($_SESSION['role'] == 'admin'){
            header('Location: ./admin.php');
        }else if($_SESSION['role'] == 'student'){
            header('Location: ./student-profile/profile/student-profile.php');
        }else if($_SESSION['role'] == 'recruiter'){
            header('Location: ./recruiter-profile.php');
        }
    }

?>

<?php

?>

        <div class="main-content d-flex flex-grow-1">

            <div class="left flex-grow-1 image-box position-relative">
                <div class="image-filter position-absolute"></div>
                <div class="image-bg position-absolute" id="insertImgSlide"
                    style="background-image: url(./img/bathroom.jpg);">

                </div>
            </div>
            <div class="right w-50 d-flex justify-content-center align-items-center">
                <div class="formBx">
                    <h2>Login</h2>
                    <small id="reply-msg"></small>
                    <form >
                        <!-- Username textbox -->
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="text" id="username">
                            <span id="email_error" class="error-message"></span>
                        </div>
                        <!-- Password textbox -->
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password" id="pwd">
                            <span id="pwd_error" class="error-message"></span>
                        </div>
                        <!-- drop down -->
                        <div class="myradio-btn">
                            <span>I am signing in as a:</span>
                            <div class="radio-btn">
                                <input type="radio" class="input-radio-btn" id="optionRadio1" value="student" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio1">Student</label>
                                <input type="radio" class="input-radio-btn" id="optionRadio2" value="recruiter" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio2">Recruiter</label>
                                <input type="radio" class="input-radio-btn" id="optionRadio3" value="admin" name="optionRadio">
                                <label class="label-radio-btn" for="optionRadio3">Admin</label>
                            </div>
                            <span id="radio_error" class="error-message" style="color:red;display: inline-block; font-size:14px"></span>
                        </div>
                        <!-- Login Remember me checkbox -->
                        <div class="remember">
                            <label><input type="checkbox">Remember me</label>
                        </div>
                        <!-- submit button/Login button -->
                        <div class="inputBx">
                            <input type="button" value="Sign in" id="btn-login">
                        </div>
                        <!-- Sign up link -->
                        <div class="inputBx">
                            <p>Don't have an account? <a href="register.php">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/sweetalert2@11.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./js/nav.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/login-validation.js"></script>

    

</body>

</html>