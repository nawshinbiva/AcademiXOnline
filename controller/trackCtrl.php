<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");


$studentsData = array();

$studentsResult = getStudents();

if ($studentsResult->num_rows > 0) {
    while ($studentRow = $studentsResult->fetch_assoc()) {
        $studentData = array(
            'studentName' => $studentRow['student_name'],
            'quiz1' => is_numeric($studentRow['quiz1_score']) ? $studentRow['quiz1_score'] : 0,
            'quiz2' => is_numeric($studentRow['quiz2_score']) ? $studentRow['quiz2_score'] : 0,
            'quiz3' => is_numeric($studentRow['quiz3_score']) ? $studentRow['quiz3_score'] : 0,
            'assignment1' => is_numeric($studentRow['assignment1_score']) ? $studentRow['assignment1_score'] : 0,
            'assignment2' => is_numeric($studentRow['assignment2_score']) ? $studentRow['assignment2_score'] : 0
        );

        $totalMarks = $studentData['quiz1'] + $studentData['quiz2'] + $studentData['quiz3'] + $studentData['assignment1'] + $studentData['assignment2'];
        $studentData['totalMarks'] = $totalMarks;
        $studentData['percentage'] = ($totalMarks / 50) * 100; // Assuming total marks are 50

        $studentsData[] = $studentData;
    }
}
header('Content-Type: application/json');
echo json_encode($studentsData);

?>