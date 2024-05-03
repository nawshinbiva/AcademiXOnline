<?php 
    require("sessionCheck.php");
    require_once("../model/pageModel.php");

    $loggedInusername = $_SESSION['username'];

    $quizzes = fetchQuiz($loggedInusername);
    
    $quizNameError = $numQuestionsError = '';
    
    function createQuiz(){
        global $loggedInusername;
        global $quizNameError; 
        global $numQuestionsError;

        // Initialize $numQuestions
        $numQuestions = 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quizName = $_POST['quiz_name'];
            $numQuestions = $_POST['num_questions'];

            // Validate quiz name
            if (empty($quizName)) {
                $quizNameError = "Quiz Name is required";
            }

            // Validate number of questions
            if (empty($numQuestions) || $numQuestions < 0) {
                $numQuestionsError = "Number of Questions must be a positive integer";
            }

            if (empty($quizNameError) && empty($numQuestionsError)) {
                $quizId = insertQuiz($quizName, $loggedInusername);
                header("Location: questions.php?quizId=$quizId&numQuestions=$numQuestions");
                exit();
            }
        }
    }

    $numQuestions = 0;
    $errorMessages = [];
    function questions(){
        global $numQuestions;
        global $errorMessages;
        // Get quizId and numQuestions from the URL parameters
        $quizId = $_GET['quizId'];
        $numQuestions = $_GET['numQuestions'];

        $hasError = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            for ($i = 1; $i <= $numQuestions; $i++) {
                $questionText = $_POST["question_$i"];
                $marks = $_POST["marks_$i"];
                $correctOption = isset($_POST["correct_option_$i"]) ? $_POST["correct_option_$i"] : '';

                if (empty($correctOption)) {
                    $hasError = true;
                    $errorMessages[$i]['correct_option'] = "Please choose a correct option for Question $i.";
                }

                if (empty($questionText)) {
                    $hasError = true;
                    $errorMessages[$i]['question_text'] = "Please enter a question for Question $i.";
                }

                if (!$hasError) {
                    createQuestion($i, $quizId, $questionText, $marks, $correctOption);
                }
            }

            if (!$hasError) {
                header('Location: quiz.php');
                exit();
            }
        }
    }

    $quiz = $resQuestions = null;
    function viewQuiz($loggedInusername){
        global $quiz;
        global $resQuestions;

        // Get the quiz ID from the URL parameter
        $quizId = $_GET['id'];

        $quiz = getQuiz($quizId, $loggedInusername);
        $resQuestions = getQuestions($quizId);
    }
    
    function options($resQuestions){
        $questionNumber = 1;
        while ($question = mysqli_fetch_assoc($resQuestions)) {
            echo "<fieldset>";
            echo "<legend><h3>Question $questionNumber</h3></legend>";
            echo "<table>";
            
            echo "<tr>";
            echo "<td>{$question['question_text']}</td>";
            echo "<td>({$question['marks']})</td>";
            echo "</tr>";
            
            $resOptions = getOptions($question['question_id']);
            
            echo "<tr><td>Options:</td></tr>";
            while ($option = $resOptions->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$option['option_text']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        
            echo "</fieldset>";
            $questionNumber++;
        }
    }
    
?>