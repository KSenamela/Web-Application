$(document).ready(function() {
  var fd = new FormData();
  $("#image").on("change", function(){
      var files = $('#image')[0].files[0];
      fd.append('image', files);
      $.ajax({
              url: "./avatar.php",
              method: "POST",
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                  //after getting a success response from the server, show user a sweetAlert and redirect to login
                  if(response === 'success'){
                      window.location.href = "../login.php";
                  }else{
                      alert(response);
                  // $("#fillAll").html(response);
                  // $("#fillAll").addClass('alert alert-danger form-control');

                  }
                  
              },
              dataType: "text"
      });
  });
});