function redirectToDash() {
  window.location.href = 'tDashboard.php';
}

function validateAddCourse() {
  var hasError = false;

  if (document.getElementById('chapter_number').value == '') {
    document.getElementById('chNumError').innerHTML = 'Please Enter Chapter Number';
    hasError = true;
  } else {
    document.getElementById('chNumError').innerHTML = '';
  }

  if (document.getElementById('chapter_name').value == '') {
    document.getElementById('chNameError').innerHTML = 'Please Enter Chapter Name';
    hasError = true;
  } else {
    document.getElementById('chNameError').innerHTML = '';
  }

  if (document.getElementById('lectures').value == '') {
    document.getElementById('lectureError').innerHTML = 'Please Upload a Lecture File';
    hasError = true;
  } else {
    document.getElementById('lectureError').innerHTML = '';
  }

  return !hasError; 
}

