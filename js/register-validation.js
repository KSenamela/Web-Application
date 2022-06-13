$(document).ready(function() {

  $("#btn-register").on("click", function(){
    //Inputs
    let fname = $.trim($("#first_name").val());
    let lname = $.trim($("#last_name").val());
    let email = $.trim($("#email").val());
    let password = $.trim($("#password").val());
    let password_confirmation = $.trim($("#password_confirmation").val());
    let role_checked =  $("input[name=optionRadio]").is(":checked");
    //stores the radio button value
    let role_value = $('input[name="optionRadio"]:checked').val();

    //Call validate function
    validateAll(fname, lname, email, password, password_confirmation, role_checked, role_value);

    
  })
})

function validateAll(firstNameValue, lastNameValue, emailValue, passwordValue, repeatPasswordValue, role_checked, role_value){

    //Error message inputs
    let fname_error = "#fname_error";
    let lname_error = "#lname_error";
    let email_error = "#email_error";
    let password_error = "#pwd_error";
    let password_confirmation_error = "#Cpwd_error";

    

    //Validate first name
    if (firstNameValue ==='') {
      throwErrorMsg($("#first_name"), fname_error,"First name is required!");
      
    }
    else if(firstNameValue.length < 2) {
      throwErrorMsg($("first_name"), fname_error,"First name is too short!");
      
    }else if(!/^[a-zA-Z]+$/.test(firstNameValue.toLowerCase())){
      throwErrorMsg($("#first_name"), fname_error,"First name must contain only letters!");
      
    }
    else{
        successFunction($("#first_name"), fname_error, '');
        fname_error = true;
    }

    //validate last name
    if (lastNameValue ==='') {
        throwErrorMsg($("#last_name"), lname_error, "Last name is required!");
        lname_error = false;
    }
    else if(lastNameValue.length < 2) {
      throwErrorMsg($("#last_name"), lname_error,"First name is too short!");
      lname_error = false;

    }
    else if(!/^[a-zA-Z]+$/.test(lastNameValue.toLowerCase())){
      throwErrorMsg($("#last_name"), lname_error,"First name must contain only letters!");
      lname_error = false;
    }
    else{
        successFunction($("#last_name"), lname_error, '');
        lname_error = true;

    }

    //validate email
    if (emailValue ==='') {
        throwErrorMsg($("#email"), email_error , "Email is required!");

    }
    else if(!validEmail(emailValue)){
        throwErrorMsg($("#email"), email_error , "Email entered is not valid!");
    }
    else{
        successFunction($("#email"), email_error , '');
    }

    //validate password
    if(passwordValue === ''){
        throwErrorMsg($("#password"), password_error, "Password is required");
      
    }
    else if(passwordValue.length < 8){
        throwErrorMsg($("#password"), password_error, "Password is short, 8 alphanumeric character password is required!");

    }
    else if(!alphanumericPasswordCheck(passwordValue)){
        throwErrorMsg($("#password"), password_error, "Password is weak, 8 alphanumeric character password is required!");

    }
    else if (passwordValue !== repeatPasswordValue && repeatPasswordValue !== '' && passwordValue !== '') {
        throwErrorMsg($("#password"), password_error, "Passwords don't Match!");

    }
    else{
        successFunction($("#password"), password_error, '');
        password_error = true;

    }

    //validate repeat password
    if(repeatPasswordValue === ''){
        throwErrorMsg($("#password_confirmation"), password_confirmation_error, "Repeat Password is required");
    }
    else if(repeatPasswordValue.length < 8){
      throwErrorMsg($("#password_confirmation"), password_confirmation_error, "Repeat Password is short");
    }
    else if(passwordValue !== repeatPasswordValue && repeatPasswordValue !== '' && passwordValue !== ''){
        throwErrorMsg($("#password_confirmation"), password_confirmation_error, "Passwords don't Match!");
    }
    else{
        successFunction($("#password_confirmation"), password_confirmation_error, '');
        password_confirmation_error = true;
    }

    //validate radio button
    if (!role_checked) {
        $("#radio_error").html("Please select whether you are a student or a recruiter!");
        role_checked = false;
    }
    else{
      $("#radio_error").html("");
      role_checked = true;
  }

  //Send a post request to php with ajax request

    if(fname_error && lname_error  && email_error  && password_error  && password_confirmation_error && role_checked ){
          $.ajax(
            {
              url: "./server/register_server.php",
              method: "POST",
              data:{
                register: 1,
                fnamePHP: firstNameValue.toLowerCase(),
                lnamePHP: lastNameValue.toLowerCase(),
                emailPHP: emailValue.toLowerCase(),
                passwordPHP: passwordValue,
                password_confirmationPHP: repeatPasswordValue,
                role_valuePHP: role_value 
              },
              success: function(response){
                //after getting a success response from the server, show user a sweetAlert and redirect to login
                if(response === 'success'){
                  Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful!',
                    text: 'Please verify your email before you login!',
                  }).then(function(){
                    window.location.href = "./login.php";
                  })
                }else{
                  $("#response-msg").html(response);
                }
                
              },
              dataType: "text"
            }
          )
        }
  }

//display error message and color input box red
function throwErrorMsg(input, errorMsgTag,errorMsg){
  $(errorMsgTag).html(errorMsg);
  $(input).addClass("inputColorHidden");
}

//Remove error message and red color on input box if all is well
function successFunction(input, errorMsgTag,errorMsg){
  $(errorMsgTag).html(errorMsg);
  $(input).removeClass("inputColorHidden");
  
}
//Test for email validity
function validEmail(email) {
return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

//alphanumeric Password check function
function alphanumericPasswordCheck(password) {
  let regularExpression = /^(?=.*[a-zA-Z])(?=.*[0-9]).+$/;
  let valid = regularExpression.test(password);
  return valid;
}