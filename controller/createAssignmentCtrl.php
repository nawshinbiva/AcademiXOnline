<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

$loggedInusername = $_SESSION['username'];

$result = teacherDetail($loggedInusername);

$assignmentNameErr = $instructionErr = $possiblePointsErr = $dueDateTimeErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate assignment name
    if (empty($_POST['assignment_name'])) {
        $assignmentNameErr = "Assignment Name is required";
    } else {
        $assignmentName = $_POST['assignment_name'];
    }

    // Validate instruction
    if (empty($_POST['instruction'])) {
        $instructionErr = "Instruction is required";
    } else {
        $instruction = $_POST['instruction'];
    }

    // Validate possible points
    if (empty($_POST['possible_points'])) {
        $possiblePointsErr = "Possible Points is required";
    } else {
        $possiblePoints = $_POST['possible_points'];
    }

    // Validate due date and time
    if (empty($_POST['due_date_time'])) {
        $dueDateTimeErr = "Due Date and Time is required";
    } else {
        $dueDateTime = $_POST['due_date_time'];
    }

    if (!empty($assignmentName) && !empty($instruction) && !empty($possiblePoints) && !empty($dueDateTime)) {
        $selected_students = $_POST['selected_students'];
        insertAssignment($assignmentName, $instruction, $possiblePoints, $dueDateTime, $loggedInusername, $selected_students);
        header('location: homeCtrl.php?goto=assignment');
    }
}
?>