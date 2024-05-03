function redirectToHome() {
  window.location.href = 'homepage.php';
}
function validateLogin(){
  var hasError = false;

  if(document.getElementById('username').value == ''){
    document.getElementById('userError').innerHTML = 'Please Enter Username';
    hasError = true;
  }
  else{document.getElementById('userError').innerHTML = '';}

  if(document.getElementById('password').value == ''){
    document.getElementById('passError').innerHTML = 'Please Enter Passsword';
    hasError = true;
  }
  else{document.getElementById('passError').innerHTML = '';}

  return !hasError;
}