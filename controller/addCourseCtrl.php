<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");



$loggedInusername = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['publish'])) {
    $errors = [];

    $chapter_number = isset($_POST['chapter_number']) ? intval($_POST['chapter_number']) : 0;
    if (empty($chapter_number)) {
        $errors['chapter_number'] = "Chapter number is empty.";
    }

    $chapter_name = isset($_POST['chapter_name']) ? $_POST['chapter_name'] : '';
    if (empty($chapter_name)) {
        $errors['chapter_name'] = "Chapter name is empty.";
    }

    $lectures = isset($_FILES['lectures']) ? $_FILES['lectures'] : [];
    if (empty($lectures['name'][0])) {
        $errors['lecture'] = 'Please upload at least one lecture';
    }

    $description = $_POST['description'];

    if (empty($errors)) {
        $errors['lecture'] = addCourse($loggedInusername, $chapter_number, $chapter_name, $description, $lectures);
    }else {
        echo $errors['lecture'];
    }
    
}

?>