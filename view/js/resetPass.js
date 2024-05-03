function validateReset() {
  var hasError = false;

  if (document.getElementById('new_password').value == '') {
    document.getElementById('newPassError').innerHTML = 'Please Enter New Password';
    hasError = true;
  } else {
    document.getElementById('newPassError').innerHTML = '';
  }

  if (document.getElementById('confirm_password').value == '') {
    document.getElementById('confPassError').innerHTML = 'Please Re-enter Password';
    hasError = true;
  } else {
    document.getElementById('confPassError').innerHTML = '';
  }

  

  return !hasError; 
}