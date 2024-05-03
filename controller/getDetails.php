<?php 
    require('sessionCheck.php');
    require_once("../model/pageModel.php");
    if($_GET['get'] == 'pic'){
        $username = $_SESSION['username'];
        $enteredPassword = $_SESSION['password'];
        $user = mysqli_fetch_assoc(login($username, $enteredPassword));
        header("Content-Type: image/jpeg");
        echo $user['picture'];      
    }
?>