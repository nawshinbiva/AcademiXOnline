<?php
    require("sessionCheck.php");
    require_once("../model/pageModel.php");

    $loggedInusername = $_SESSION['username'];

    $response = array();

    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];

        $result = deleteCourse($course_id, $loggedInusername);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Course deleted successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error deleting course.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid request. Course ID not provided.';
    }

    echo json_encode($response);

?>
