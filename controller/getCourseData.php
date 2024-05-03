<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

$loggedInusername = $_SESSION['username'];

if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);

    $course_result = getCourse($course_id, $loggedInusername);

    if ($course_result->num_rows > 0) {
        $course_data = $course_result->fetch_assoc();

        // Fetch existing lecture data
        $lecture_result = getLecture($course_id);
        $existing_lectures = array();

        if ($lecture_result->num_rows > 0) {
            while ($lecture_row = $lecture_result->fetch_assoc()) {
                $existing_lectures[] = array(
                    'lecture_name' => $lecture_row['lecture_name'],
                    'lecture_path' => $lecture_row['lecture_path']
                );
            }
        }

        $response = array(
            'chapter_number' => $course_data['chapter_number'],
            'chapter_name' => $course_data['chapter_name'],
            'description' => $course_data['description'],
            'existing_lectures' => $existing_lectures
        );

        echo json_encode($response);
        exit();
    }
}

// Return an empty response or an error message
echo json_encode(['error' => 'Invalid request or course not found.']);
?>
