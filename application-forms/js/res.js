$(document).ready(function(){

  $("#first_choice").change(function(){
    var firstchoice = $("#first_choice").children("option:selected").val();

 
    
    if(firstchoice == "13 5th Street Vrededorp"){
      $("#choices").removeClass('hide-other');
      $("#choices").addClass('border-color');
      
      $.ajax(
        {
        url: "./residence1.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices").html(response);
        },
      }
      );
    }
    else if(firstchoice == "19 Rus Road, Vredepark"){
      $("#choices").removeClass('hide-other');
      $("#choices").addClass('border-color');

      $.ajax(
        {
        url: "./residence2.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices").html(response);
        },
      }
      );
    }
    else if(firstchoice == "43/45 Aanbloom Street, Jan Hofmeyer"){
      $("#choices").removeClass('hide-other');
      $("#choices").addClass('border-color');

      $.ajax(
        {
        url: "./residence3.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices").html(response);
        },
      }
      );
    }
    else if(firstchoice == "3 Pypie Draai, Jan Hofmeyer"){
      $("#choices").removeClass('hide-other');
      $("#choices").addClass('border-color');

      $.ajax(
        {
        url: "./residence4.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices").html(response);
        },
      }
      );
    }
    else if(firstchoice == "50 Auckland Avenue, Auckland park"){
      $("#choices").removeClass('hide-other');
      $("#choices").addClass('border-color');

      $.ajax(
        {
        url: "./residence5.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices").html(response);
        },
      }
      );
    }else{
      $("#choices").html('');
      $("#choices").addClass('hide-other');

    }
  });


  //Secondchoice residence address and room number
  
  $("#second_choice").change(function(){
    var firstchoice = $("#second_choice").children("option:selected").val();

 
    
    if(firstchoice == "13 5th Street Vrededorp"){
      $("#choices2").removeClass('hide-other');
      $("#choices2").addClass('border-color');
      
      $.ajax(
        {
        url: "./residence1.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices2").html(response);
        },
      }
      );
    }
    else if(firstchoice == "19 Rus Road, Vredepark"){
      $("#choices2").removeClass('hide-other');
      $("#choices2").addClass('border-color');

      $.ajax(
        {
        url: "./residence2.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices2").html(response);
        },
      }
      );
    }
    else if(firstchoice == "43/45 Aanbloom Street, Jan Hofmeyer"){
      $("#choices2").removeClass('hide-other');
      $("#choices2").addClass('border-color');

      $.ajax(
        {
        url: "./residence3.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices2").html(response);
        },
      }
      );
    }
    else if(firstchoice == "3 Pypie Draai, Jan Hofmeyer"){
      $("#choices2").removeClass('hide-other');
      $("#choices2").addClass('border-color');

      $.ajax(
        {
        url: "./residence4.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices2").html(response);
        },
      }
      );
    }
    else if(firstchoice == "50 Auckland Avenue, Auckland park"){
      $("#choices2").removeClass('hide-other');
      $("#choices2").addClass('border-color');

      $.ajax(
        {
        url: "./residence5.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices2").html(response);
        },
      }
      );
    }else{
      $("#choices2").html('');
      $("#choices2").addClass('hide-other');

    }
  });

  //Third choice residence address and room number
  $("#third_choice").change(function(){
    var firstchoice = $("#third_choice").children("option:selected").val();

 
    
    if(firstchoice == "13 5th Street Vrededorp"){
      $("#choices3").removeClass('hide-other');
      $("#choices3").addClass('border-color');
      
      $.ajax(
        {
        url: "./residence1.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices3").html(response);
        },
      }
      );
    }
    else if(firstchoice == "19 Rus Road, Vredepark"){
      $("#choices3").removeClass('hide-other');
      $("#choices3").addClass('border-color');

      $.ajax(
        {
        url: "./residence2.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices3").html(response);
        },
      }
      );
    }
    else if(firstchoice == "43/45 Aanbloom Street, Jan Hofmeyer"){
      $("#choices3").removeClass('hide-other');
      $("#choices3").addClass('border-color');

      $.ajax(
        {
        url: "./residence3.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices3").html(response);
        },
      }
      );
    }
    else if(firstchoice == "3 Pypie Draai, Jan Hofmeyer"){
      $("#choices3").removeClass('hide-other');
      $("#choices3").addClass('border-color');

      $.ajax(
        {
        url: "./residence4.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices3").html(response);
        },
      }
      );
    }
    else if(firstchoice == "50 Auckland Avenue, Auckland park"){
      $("#choices3").removeClass('hide-other');
      $("#choices3").addClass('border-color');

      $.ajax(
        {
        url: "./residence5.php",
        method: "GET",
        dataType: "html",
        success: function(response){
          $("#choices3").html(response);
        },
      }
      );
    }else{
      $("#choices3").html('');
      $("#choices3").addClass('hide-other');

    }
  });
});