$(document).ready(function() {

  $("#btn-login").on("click", function(){
    //Inputs
  
    let email = $.trim($("#username").val());
    let password = $.trim($("#pwd").val());
    let role_checked =  $("input[name=optionRadio]").is(":checked");
    //stores the radio button value
    let role_value = $('input[name="optionRadio"]:checked').val()
    


    //Call validate function
    validateAll(email, password,role_checked, role_value);

    
  })
})

function validateAll(emailValue, passwordValue, role_checked, role_value){
    //Error message inputs
    let email_error = "#email_error";
    let password_error = "#pwd_error";
    
  //validate email
  if (emailValue ==='') {
      throwErrorMsg($("#username"), email_error, "Email is required!");
      email_error = false;
  }
  else if(!validEmail(emailValue)){
      throwErrorMsg($("#username"), email_error, "Email entered is not valid!");
      email_error = false;

  }
  else{
      successFunction($("#username"), email_error, '');
      email_error = true;
  }


  
  //validate radio button
  if (!role_checked) {
      $("#radio_error").html("Please select whether you are a student or a recruiter!");
  }
  else{
    $("#radio_error").html("");
    role_checked = true;
  }

  if(email_error && password_error && role_checked){

    $.ajax(
      {
        url: "./server/login_server.php",
        method: "POST",
        data:{
          login: 1,
          emailPHP: emailValue.toLowerCase(),
          passwordPHP: passwordValue,
          role_valuePHP: role_value.toLowerCase() 
        },
        success: function(response){
          // after getting a success response from the server, check which role is selected
          if(response === 'student'){
            window.location.href = "./student-profile/profile/student-profile.php";
          }else if(response === 'recruiter'){
            window.location.href = "./recruiter-profile.php";
          }
          else if(response === 'admin'){
            window.location.href = "./admin.php";
          }
          else if(response === 'not logged in'){
            window.location.href = "./login.php";
          }
          else{
            $("#reply-msg").html(response);
          }
          
        },
        error: function(response) {
          statusMsg  = 'Error';
          $("#reply-msg").html();
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
  console.log("Remove");
  
}

//Test for email validity
function validEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}