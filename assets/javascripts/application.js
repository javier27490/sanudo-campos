document.addEventListener("DOMContentLoaded", function(){
  if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var message           = document.getElementById("message");
    var mobileMessageDiv  = document.getElementById('mobile-message');

    // remove <br>
    message.nextElementSibling.remove();
    message.nextElementSibling.remove();
    message.nextElementSibling.remove();

    // remove message
    message.remove();

    // add at <div id='mobile-message'></div>
    mobileMessageDiv.append(message);
  }
});
