function redirectTouserProfile() {
  window.location.href = 'userProfile.php';
}

function fetchImage(){
  
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/getDetails.php?get=pic', true);

  
  xhttp.responseType = 'blob';

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
          if (this.status == 200) {
              
              document.getElementById('img').src=URL.createObjectURL(this.response);
          } else {
              console.error('Error: ' + this.status);
          }
      }
  };
  xhttp.send();
}

function showUserProfile() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/userProfileCtrl.php', true);

  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        
        if (this.responseText.trim() !== "") {
          try {
            let user = JSON.parse(this.responseText);

            document.getElementById("fname").value = user['fname'];
            document.getElementById("lname").value = user['lname'];
            document.getElementById("birthdate").value = user['birthdate'];
            
            
            let genderRadio = document.getElementsByName("gender");
            for (let i = 0; i < genderRadio.length; i++) {
              if (genderRadio[i].value === user['gender']) {
                genderRadio[i].checked = true;
              }
            }

            document.getElementById("city").value = user['city'];
            document.getElementById("country").value = user['country'];
            document.getElementById("religion").value = user['religion'];
            document.getElementById("phone").value = user['phone'];
            document.getElementById("email").value = user['email'];
          } catch (e) {
            console.error('Error parsing JSON: ' + e.message);
          }
        } else {
          console.error('Error: Empty JSON response');
        }
      } else {
        console.error('Error: ' + this.status);
      }
    }
  }
}

function validateProfileEdit(){
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

  return !hasError;
}