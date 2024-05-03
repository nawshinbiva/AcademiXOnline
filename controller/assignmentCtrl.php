<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

$loggedInusername = $_SESSION['username'];


$assignments = array();

$result = getAssignment($loggedInusername);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $assignment = array(
            'assignmentName' => $row['assignment_name'],
            'instruction' => $row['instruction'],
            'possiblePoints' => $row['possible_points'],
            'dueDateTime' => $row['due_date_time'],
            'students' => array()
        );

        $studentsResult = getStudentAssigned($row['assignment_id']);

        if ($studentsResult->num_rows > 0) {
            while ($studentRow = $studentsResult->fetch_assoc()) {
                $assignment['students'][] = $studentRow['student_name'];
            }
        }

        $assignments[] = $assignment;
    }
}
header('Content-Type: application/json');
echo json_encode($assignments);

?>