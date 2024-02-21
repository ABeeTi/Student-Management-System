// signinvalid.js

$(document).ready(function() {
  $("#loginForm").submit(function(event) {
      event.preventDefault(); // Prevent the default form submission

      var username = $("#username").val();
      var password = $("#password").val();

      $.ajax({
          type: "POST",
          url: "signinvalid.php",
          data: { username: username, password: password },
          success: function(response) {
              if (response.trim() === "Yes") {
                  alert("Successfully Logged In. You are being redirected to your Dashboard.");
                  window.location.href = "studenteasy.html";
              } else {
                  alert("Wrong Credentials.");
              }
          }
      });
  });
});
