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

  // check other option if selected and remove hide-option class
  
  $("select.institution").change(function(){
    var selectedinstitution = $(this).children("option:selected").val();

    if(selectedinstitution == "Other"){
      $("#other-institution").removeClass("hide-other");
    }
    else{
      $("#other-institution").addClass("hide-other");
    }


    
  });

      // var selectedresidence = $("select.residence").children("option:selected").val();
      // $.ajax({
      //   URL: "./res-form.php",
      //   method: "POST",
      //   data:{
      //     residence: selectedinstitution
      //   },
      //   success: function(response){
      //     alert(response);
      //   },
      //   dataType: "text",
      // });

});


