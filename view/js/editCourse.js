function redirectToViewCourses() {
  window.location.href = 'viewCourses.php';
}

// editCourse.js

// Function to retrieve current course data
function getCourseData(courseId) {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', `../controller/getCourseData.php?course_id=${courseId}`, true);

  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        let courseData = JSON.parse(this.responseText);

        // Populate form fields
        document.getElementById("chapter_number").value = courseData.chapter_number;
        document.getElementById("chapter_name").value = courseData.chapter_name;
        document.getElementById("description").value = courseData.description;

        // Display existing lectures
        let existingLectures = courseData.existing_lectures;
        let lecturesList = document.getElementById("existingLecturesList");

        if (existingLectures.length > 0) {
          let lecturesHTML = "<ul>";
          for (let i = 0; i < existingLectures.length; i++) {
            let lecture = existingLectures[i];
            lecturesHTML += `<li><a href='${lecture.lecture_path}' target='_blank'>${lecture.lecture_name}</a></li>`;
          }
          lecturesHTML += "</ul>";
          lecturesList.innerHTML = lecturesHTML;
        } else {
          lecturesList.innerHTML = "No existing lectures for this chapter.";
        }
      } else {
        console.error('Error: ' + this.status);
      }
    }
  };
}

// Function to update course data and upload new lectures
function updateCourseData() {
  // Fetch the course ID from the URL
  let urlParams = new URLSearchParams(window.location.search);
  let courseId = urlParams.get('course_id');

  // Perform additional validation if needed

  // Create a FormData object for the form
  let formData = new FormData(document.querySelector('form'));

  // Make an AJAX request to update course data
  let xhttp = new XMLHttpRequest();
  xhttp.open('POST', `../controller/updateCourseData.php?course_id=${courseId}`, true);

  xhttp.send(formData);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        // Handle success response if needed
        console.log('Course data updated successfully.');
      } else {
        // Handle error response if needed
        console.error('Error: ' + this.status);
      }
    }
  };
}

// Example usage: Assuming you have a variable courseId with the current course ID
let urlParams = new URLSearchParams(window.location.search);
let courseId = urlParams.get('course_id');
getCourseData(courseId);
