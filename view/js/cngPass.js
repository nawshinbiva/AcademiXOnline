function redirectToProfile() {
  window.location.href = 'userProfile.php';
}
function validatecngPass() {
  var hasError = false;

  if (document.getElementById('current_password').value == '') {
    document.getElementById('currPassError').innerHTML = 'Please Enter Current Password';
    hasError = true;
  } else {
    document.getElementById('currPassError').innerHTML = '';
  }

  if (document.getElementById('new_password').value == '') {
    document.getElementById('newPassError').innerHTML = 'Please Enter New Password';
    hasError = true;
  } else {
    document.getElementById('newPassError').innerHTML = '';
  }


  return !hasError; 
}