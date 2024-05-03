function validateforgotPass() {
  var hasError = false;

  if (document.getElementById('username').value == '') {
    document.getElementById('userError').innerHTML = 'Please Enter Username';
    hasError = true;
  } else {
    document.getElementById('userError').innerHTML = '';
  }

  if (document.getElementById('answer1').value == '') {
    document.getElementById('ans1Error').innerHTML = 'Please Enter Answer';
    hasError = true;
  } else {
    document.getElementById('ans1Error').innerHTML = '';
  }

  if (document.getElementById('answer2').value == '') {
    document.getElementById('ans2Error').innerHTML = 'Please Enter Answer';
    hasError = true;
  } else {
    document.getElementById('ans2Error').innerHTML = '';
  }

  return !hasError; 
}