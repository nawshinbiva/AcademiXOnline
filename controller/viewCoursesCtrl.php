<?php 
    require("sessionCheck.php");
    require_once("../model/pageModel.php");
    
    $loggedInusername = $_SESSION['username'];
    
    $result = getCourses($loggedInusername);

    $courses = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_id = $row['id'];
            $chapter_number = $row['chapter_number'];
            $chapter_name = $row['chapter_name'];
            $description = $row['description'];

            $lecture_result = getLecture($course_id);

            $lectures = array();
            if ($lecture_result->num_rows > 0) {
                while ($lecture_row = $lecture_result->fetch_assoc()) {
                    $lecture_name = $lecture_row['lecture_name'];
                    $lecture_path = $lecture_row['lecture_path'];

                    $lectures[] = array(
                        "lecture_name" => $lecture_name,
                        "lecture_path" => $lecture_path
                    );
                }
            }

            $courses[] = array(
                "course_id" => $course_id,
                "chapter_number" => $chapter_number,
                "chapter_name" => $chapter_name,
                "description" => $description,
                "lectures" => $lectures
            );
        }
    }

    echo json_encode($courses);
?>
