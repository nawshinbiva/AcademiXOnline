<?php
    session_start();
    require_once("../model/pageModel.php");


    if (isset($_POST['submit'])) {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            $username = $_SESSION['reset_username'];

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $result = resetPass($hashed_password, $username);

            if ($result) {
                header('location: login.php');
            } else {
                $error_message = "Password reset failed. Please try again.";
            }
        } else {
            $error_message = "Password and confirmation do not match.";
        }
    }
?>