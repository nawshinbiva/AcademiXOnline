function redirectToDash() {
  window.location.href = 'tDashboard.php';
}
function redirectToNewQuiz() {
  window.location.href = 'createQuiz.php';
}

function showQuizzes() {
  let xhttp = new XMLHttpRequest();
  xhttp.open('GET', '../controller/quizCtrl.php?showQuizList=1', true); 
  xhttp.setRequestHeader("Content-type", "application/json");

  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          let quizzesData = JSON.parse(this.responseText);
          populateTable(quizzesData);
      }
  };

  xhttp.send();
}

function populateTable(quizzesData) {
  let table = document.getElementById('quizzesTable');

  if (quizzesData.length > 0) {
      
      let headerRow = table.insertRow();
      headerRow.innerHTML = "<th>Quiz Name</th>";

      
      quizzesData.forEach(function (quizData) {
          let row = table.insertRow();
          row.innerHTML = `<td>${quizData.quizName}</td>
            <td>
              <form style='display:inline;' action='viewQuizForm.php' method='GET'>
                  <input type='hidden' name='id' value='${quizData.quizId}'>
                  <input type='submit' value='View Form'>
              </form>
              <form style='display:inline;' onsubmit="deleteQuiz(${quizData.quizId}); return false;">
                <input type='submit' value='Delete'>
              </form>
            </td>`;
      });
  } else {
      
      let noQuizzesRow = table.insertRow();
      noQuizzesRow.innerHTML = "<td colspan='2'>No quiz data found.</td>";
  }
}

function deleteQuiz(quizId) {
  let confirmed = confirm("Are you sure you want to delete this quiz?");

  if (confirmed) {
    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', `../controller/deleteQuiz.php?id=${quizId}`, true);

    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();

    xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          let response = JSON.parse(this.responseText);

          if (response.status === 'success') {
            showQuizzes();
          } else {
            console.error('Error: ' + response.message);
          }
        } else {
          console.error('Error: ' + this.status);
        }
      }
    };
  }
}
