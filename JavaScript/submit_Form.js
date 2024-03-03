
function signupform_submit() {
    var fname = getElementById('FName').value;
    var lname = getElementById('LName').value;
    var dob = getElementById('DOB').value;
    var email = getElementById('Email').value;
    var username = getElementById('Username').value;
    var password = getElementById('Password').value;

    if (fname == '' || lname == '' || dob == '' || email == '' || username == '' || password == ''){
        alert('Fill all the field.')
    } else {
        var signup_form = document.getElementById("signup_form");
        signup_form.submit();
}
    }

    

function loginform_submit(){

    var login_form = document.getElementById("login_form");
    
    login_form.submit();
}