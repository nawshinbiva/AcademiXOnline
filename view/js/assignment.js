function redirectToDash() {
  window.location.href = 'tDashboard.php';
}
function redirectToNewAss() {
  window.location.href = 'createAssignment.php';
}

function showAssignments() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/assignmentCtrl.php', true); // Replace with the actual path to your PHP script
  xhttp.setRequestHeader("Content-type", "application/json");

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          let assignments = JSON.parse(this.responseText);
          populateTable(assignments);
      }
  };

  xhttp.send();
}

function populateTable(assignments) {
  let table = document.getElementById('assignmentsTable');
  //table.innerHTML = ""; // Clear existing table content

  if (assignments.length > 0) {
      // Create table header
      let headerRow = table.insertRow();
      headerRow.innerHTML = "<th>Assignment Name</th><th>Instruction</th><th>Possible Points</th><th>Due Date and Time</th><th>Assigned Students</th>";

      // Populate table rows with assignment data
      assignments.forEach(function (assignment) {
          let row = table.insertRow();
          row.innerHTML = `<td>${assignment.assignmentName}</td><td>${assignment.instruction}</td><td>${assignment.possiblePoints}</td><td>${assignment.dueDateTime}</td><td>${assignment.students.join("<br>")}</td>`;
      });
  } else {
      // Display a message when no assignments are found
      let noAssignmentsRow = table.insertRow();
      noAssignmentsRow.innerHTML = "<td colspan='5'>No assignments found.</td>";
  }
}
