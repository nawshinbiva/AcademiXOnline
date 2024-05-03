<?php 
    require('sessionCheck.php');
    require_once("../model/pageModel.php");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $loggedInusername = $_SESSION['username'];

    teacherDetailUpdate($fname, $lname, $birthdate, 
                        $gender, $religion, $city, 
                        $country, $phone, $email, 
                        $loggedInusername);

    header('location: homeCtrl.php?goto=userProfile');
    echo 'hello';
?>