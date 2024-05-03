<?php 
    session_start();
    require_once("../model/pageModel.php");
    
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $answer1 = htmlspecialchars($_POST['answer1']);
    $answer2 = htmlspecialchars($_POST['answer2']);

    $result = forgetPass($username, $answer1, $answer2);

    if ($result->num_rows > 0) {
        $_SESSION['reset_username'] = $username; // Store username in a session for resetPassword.php
        header('location: ../view/resetPassword.php');
    } else {
        $_SESSION['error_message'] = "Incorrect answers. Please try again.";
        header('location: homeCtrl.php?goto=forgotPass');
    }

?>