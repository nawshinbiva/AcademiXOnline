function redirectTocreateQuiz() {
  window.location.href = 'createQuiz.php';
}

function validateForm() {
  let hasError = false;

  // Loop through each question
  for (let i = 1; i <= <?php echo $numQuestions; ?>; i++) {
    // Validate question text
    let questionText = document.getElementsByName(`question_${i}`)[0].value.trim();
    if (questionText === '') {
      hasError = true;
      alert(`Please enter text for Question ${i}`);
      return false; // Stop validation on the first error
    }

    // Validate marks
    let marks = document.getElementsByName(`marks_${i}`)[0].value.trim();
    if (marks === '' || isNaN(marks)) {
      hasError = true;
      alert(`Please enter a valid number for Marks in Question ${i}`);
      return false; // Stop validation on the first error
    }

    // Validate correct option
    let correctOption = document.querySelector(`input[name="correct_option_${i}"]:checked`);
    if (!correctOption) {
      hasError = true;
      alert(`Please select a correct option for Question ${i}`);
      return false; // Stop validation on the first error
    }

    // Validate answer options
    for (let j = 1; j <= 4; j++) {
      let optionText = document.getElementsByName(`option_${i}_${j}`)[0].value.trim();
      if (optionText === '') {
        hasError = true;
        alert(`Please enter text for Option ${j} in Question ${i}`);
        return false; // Stop validation on the first error
      }
    }
  }

  return !hasError; // Return true if there are no errors
}