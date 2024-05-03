<?php
    require("sessionCheck.php");
    require_once("../model/pageModel.php");

    $loggedInusername = $_SESSION['username'];

    $response = array();

    if (isset($_GET['id'])) {
        $quiz_id = $_GET['id'];

        if (deleteQuiz($quiz_id, $loggedInusername)) {
            $response['status'] = 'success';
            $response['message'] = 'Quiz deleted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error deleting quiz.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid request. Quiz ID not provided.';
    }

    echo json_encode($response);

?>
