$(document).ready(function(){

  $("#msg-go a").click(function(){

    $.ajax({
      url: './msg.php',
      method: 'POST',
      dataType: 'text',
      data: {
        msg: 1
      },success: function(response){
        
        window.location.href = './messages.php';
      },
      error: function(response){
        alert(response);
      },
    })
  });
});