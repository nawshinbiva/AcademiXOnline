function redirectToHome() {
  window.location.href = 'homepage.php';
}

function validateReg(){
  var hasError = false;

  if(document.getElementById('fname').value == ''){
    document.getElementById('fnameError').innerHTML = 'Please Enter First Name';
    hasError = true;
  }
  else{document.getElementById('fnameError').innerHTML = '';}

  if(document.getElementById('lname').value == ''){
    document.getElementById('lnameError').innerHTML = 'Please Enter Last Name';
    hasError = true;
  }
  else{document.getElementById('lnameError').innerHTML = '';}

  if(document.getElementById('username').value == ''){
    document.getElementById('userError').innerHTML = 'Please Enter Username';
    hasError = true;
  }
  else{document.getElementById('userError').innerHTML = '';}

  if(document.getElementById('birthdate').value == ''){
    document.getElementById('birthdateError').innerHTML = 'Please Enter Date of Birth';
    hasError = true;
  }
  else{document.getElementById('birthdateError').innerHTML = '';}

  var genderOptions = document.getElementsByName('gender');
  var gender = true;

  for (var i = 0; i < genderOptions.length; i++) {
    if (genderOptions[i].checked) {
      gender = false;
      break;
    }
  }

  if (gender) {
    hasError = true;
    document.getElementById('genderError').innerHTML = 'Please select a gender';
  } else {
    document.getElementById('genderError').innerHTML = '';
  }

  if(document.getElementById('city').value == ''){
    document.getElementById('cityError').innerHTML = 'Please Enter City';
    hasError = true;
  }
  else{document.getElementById('cityError').innerHTML = '';}

  if(document.getElementById('country').value == ''){
    document.getElementById('countryError').innerHTML = 'Please Enter Country';
    hasError = true;
  }
  else{document.getElementById('countryError').innerHTML = '';}

  if(document.getElementById('religion').value == ''){
    document.getElementById('religionError').innerHTML = 'Please Enter Religion';
    hasError = true;
  }
  else{document.getElementById('religionError').innerHTML = '';}

  if(document.getElementById('phone').value == ''){
    document.getElementById('phoneError').innerHTML = 'Please Enter Phone Number';
    hasError = true;
  }
  else{document.getElementById('phoneError').innerHTML = '';}

  if(document.getElementById('email').value == ''){
    document.getElementById('emailError').innerHTML = 'Please Enter Email Address';
    hasError = true;
  }
  else{document.getElementById('emailError').innerHTML = '';}

  if(document.getElementById('password').value == ''){
    document.getElementById('passError').innerHTML = 'Please Enter Password';
    hasError = true;
  }
  else{document.getElementById('passError').innerHTML = '';}

  if(document.getElementById('cpassword').value == ''){
    document.getElementById('cpassError').innerHTML = 'Please Enter Confirm Password';
    hasError = true;
  }
  else{document.getElementById('cpassError').innerHTML = '';}

  return !hasError;
}