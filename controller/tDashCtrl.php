<?php
    require("../controller/sessionCheck.php");
    require_once("../model/pageModel.php");


    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }


    $loggedInusername = $_SESSION['username'];

    $userData = teacherDetail($loggedInusername);

    $picture = 'data:image/jpeg;base64,'.base64_encode( $userData['picture'] ).'';
?>