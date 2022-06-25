// prevent the user from entering more than maximum length of the id number and phone number
$(document).ready(function(){

  $("#id_number").keypress(function(){
    if(this.value.length == 13){
      return false;
    }
  });

  $("#phone_number").keypress(function(){
    if(this.value.length == 10){
      return false;
    }
  });

  $("#kin_phone").keypress(function(){
    if(this.value.length == 10){
      return false;
    }
  });
  
  $("#student_number").keypress(function(){
    if(this.value.length == 15){
      return false;
    }
  });
  $("#comp_year").keypress(function(){
    if(this.value.length == 4){
      return false;
    }
  });

  
});


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
