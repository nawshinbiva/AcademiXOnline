<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

// Function to retrieve the student list
function getStudentList() {
    $result = getStudents();
    $studentList = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $studentList .= '<input type="checkbox" name="selected_students[]" value="' . $row['student_id'] . '"> ' . $row['student_name'] . '<br>';
        }
    }

    return $studentList;
}

// Output the student list
echo getStudentList();
?>
