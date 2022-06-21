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

  $("#phone_number2").keypress(function(){
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

