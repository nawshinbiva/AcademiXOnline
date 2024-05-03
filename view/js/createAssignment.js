function redirectToAssignment() {
  window.location.href = 'assignment.php';
}
function validateAssignment() {
  var hasError = false;

  if (document.getElementById('assignment_name').value == '') {
    document.getElementById('assignmentNameErr').innerHTML = 'Please Enter Assignment Name';
    hasError = true;
  } else {
    document.getElementById('assignmentNameErr').innerHTML = '';
  }

  if (document.getElementById('instruction').value == '') {
    document.getElementById('instructionErr').innerHTML = 'Please Enter Instructions';
    hasError = true;
  } else {
    document.getElementById('instructionErr').innerHTML = '';
  }


  if (document.getElementById('possible_points').value == '') {
    document.getElementById('possiblePointsErr').innerHTML = 'Please Enter Possible Points';
    hasError = true;
  } else {
    document.getElementById('possiblePointsErr').innerHTML = '';
  }


    let dueDateTimeInput = document.getElementById('due_date_time');

    if (dueDateTimeInput.value === '') {
    document.getElementById('dueDateTimeErr').innerHTML = 'Please Set Due Date and Time';
    hasError = true;
    } else {
    document.getElementById('dueDateTimeErr').innerHTML = '';
    }


  let selectedStudents = document.querySelectorAll('.studentList input[type="checkbox"]:checked');

  if (selectedStudents.length === 0) {
    document.getElementById('listError').innerHTML = 'Please Select Students';
    hasError = true;
  } else {
    document.getElementById('listError').innerHTML = '';
  }

  return !hasError; 
}

// createAssignment.js

// Function to retrieve and display the student list
function showStudentList() {
    // Make an asynchronous request to get the student list from the server
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/getStudentList.php', true);
  
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Update the content of the studentList element with the retrieved data
        document.querySelector('.studentList').innerHTML = this.responseText;
      }
    };
  
    xhttp.send();
  }
  
  // Call the function when the page is loaded
  document.addEventListener('DOMContentLoaded', function () {
    showStudentList();
  });
  