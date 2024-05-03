<?php 
    session_start();
    if(!isset($_COOKIE['username'])){
        session_destroy();
        header("location:homeCtrl.php?goto=login");
    }
    else{
        $_SESSION['username']=$_COOKIE['username'];
        $_SESSION['password']=$_COOKIE['password'];
    }

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }
    else{header("location:homeCtrl.php?goto=login");}
?>