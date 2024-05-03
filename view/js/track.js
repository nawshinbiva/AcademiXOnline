function redirectToDash() {
  window.location.href = 'tDashboard.php';
}

function showStudents() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/trackCtrl.php', true); // Replace with the actual path to your PHP script
  xhttp.setRequestHeader("Content-type", "application/json");

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          let studentsData = JSON.parse(this.responseText);
          populateTable(studentsData);
      }
  };

  xhttp.send();
}

function populateTable(studentsData) {
  let table = document.getElementById('studentsTable');

  if (studentsData.length > 0) {
      // Create table header
      let headerRow = table.insertRow();
      headerRow.innerHTML = "<th>Student Name</th><th>Quiz 1</th><th>Quiz 2</th><th>Quiz 3</th><th>Assignment 1</th><th>Assignment 2</th><th>Total Marks</th><th>Percentage</th><th>Certificate</th>";

      // Populate table rows with student data
      studentsData.forEach(function (studentData) {
          let row = table.insertRow();
          row.innerHTML = `<td>${studentData.studentName}</td><td>${studentData.quiz1}</td><td>${studentData.quiz2}</td><td>${studentData.quiz3}</td><td>${studentData.assignment1}</td><td>${studentData.assignment2}</td><td>${studentData.totalMarks}</td><td>${studentData.percentage}%</td><td><a href='../view/certificate.php?studentName=${studentData.studentName}&percentage=${studentData.percentage}'>Generate</a></td>`;
      });
  } else {
      // Display a message when no students are found
      let noStudentsRow = table.insertRow();
      noStudentsRow.innerHTML = "<td colspan='9'>No student data found.</td>";
  }
}
