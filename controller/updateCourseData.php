<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

$loggedInusername = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);
    $new_description = isset($_POST['new_description']) ? $_POST['new_description'] : '';
    $new_lectures = isset($_FILES['new_lectures']) ? $_FILES['new_lectures'] : [];

    // Update course data and upload new lectures
    $updateResult = updateCourse($new_description, $course_id, $loggedInusername, $new_lectures);

    // Handle success or error response (echo or redirect as needed)
    if ($updateResult === true) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => $updateResult]);
    }
}
?>
