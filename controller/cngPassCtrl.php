
<?php
require("sessionCheck.php");
require("../model/pageModel.php");

$errors = []; 

$loggedInusername = $_SESSION['username'];

$user = teacherDetail($loggedInusername);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_password"])) {
    $current_password = isset($_POST["current_password"]) ? $_POST["current_password"] : '';
    $newPassword = isset($_POST["new_password"]) ? $_POST["new_password"] : '';

    if (empty($current_password)) {
        $errors['current_password'] = 'Current Password is empty';
    }

    if (empty($newPassword)) {
        $errors['new_password'] = "New Password is required.";
    }

    // Check if the entered current password matches the hashed password from the database
    if (!password_verify($current_password, $user['password'])) {
        $errors['current_password'] = "Incorrect current password. Please try again.";
    }

    if (empty($errors)) { 
        // Update the password in the session
        $_SESSION['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        changePass($newPassword, $loggedInusername);
        header("location:homeCtrl.php?goto=userProfile");
    }
}

?>