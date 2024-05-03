function redirectToDash() {
  window.location.href = 'tDashboard.php';
}

function showCourses() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/viewCoursesCtrl.php', true);

  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        let courses = JSON.parse(this.responseText);
        let searchQuery = document.getElementById('searchInput').value.toLowerCase(); 

        if (courses.length > 0) {
            let firstRow = `<tr>
                <th>Chapter Number</th>
                <th>Chapter Name</th>
                <th>Description</th>
                <th>Lectures</th>
                <th>Actions</th>
            </tr>`;
            document.getElementById('table').innerHTML = firstRow;

            let tableContent = "";

            for (let i = 0; i < courses.length; i++) {
                let row = `<tr>
                    <td>${courses[i].chapter_number}</td>
                    <td>${courses[i].chapter_name}</td>
                    <td>${courses[i].description}</td>
                    <td>`;

                if (courses[i].lectures.length > 0) {
                    row += "<ul>";
                    for (let j = 0; j < courses[i].lectures.length; j++) {
                        row += `<li><a href='${courses[i].lectures[j].lecture_path}' target='_blank'>${courses[i].lectures[j].lecture_name}</a></li>`;
                    }
                    row += "</ul>";
                } else {
                    row += "No lectures uploaded for this chapter.";
                }

                row += `</td>
                    <td>
                        <button onclick="location.href='../view/editCourse.php?course_id=${courses[i].course_id}'">Edit</button> |
                        <button onclick="deleteCourse(${courses[i].course_id})">Delete</button>
                    </td>
                </tr>`;

                // Check if the search query matches any course details or if the query is empty
                if (searchQuery === '' || 
                courses[i].chapter_number.toString().toLowerCase().includes(searchQuery) ||
                courses[i].chapter_name.toString().toLowerCase().includes(searchQuery) ||
                courses[i].description.toString().toLowerCase().includes(searchQuery)) {

                    tableContent += row;
                }
            }

            document.getElementById('table').innerHTML += tableContent;
        } else {
            document.getElementById('table').innerHTML = "<p>No courses uploaded yet.</p>";
        }
      } 
      else {
        console.error('Error: ' + this.status);
      }
    }
  }
}

function deleteCourse(courseId) {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', `../controller/deleteCourse.php?course_id=${courseId}`, true);

  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        let response = JSON.parse(this.responseText);

        if (response.status === 'success') {
          //alert(response.message); // or use a more user-friendly notification
          showCourses(); // Refresh the course list after successful deletion
        } else {
          console.error('Error: ' + response.message);
        }
      } else {
        console.error('Error: ' + this.status);
      }
    }
  };
}
