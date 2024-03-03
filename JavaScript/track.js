// Get references to navigation elements
var signIn = document.getElementById("sign-in");
var signUp = document.getElementById("sign-up");
var dashboard = document.getElementById("dashboard");
var signOut = document.getElementById("sign-out");

function toggleVisibility(val) {
  if (val == 1) {
    console.log('Successfully called.')
    signIn.style.display = "none";
    signUp.style.display = "none";
    dashboard.style.display = "block";
    signOut.style.display = "block";
  } else {
    signIn.style.display = "block";
    signUp.style.display = "block";
    dashboard.style.display = "none";
    signOut.style.display = "none";
  }

};
