<?php
require("sessionCheck.php");
require_once("../model/pageModel.php");

if (isset($_SESSION['username'])) {
    $loggedInusername = $_SESSION['username'];

    $r = teacherDetail($loggedInusername);

    if ($r !== false) {
        // Exclude binary data or handle it separately if needed
        unset($r['picture']);
        header('Content-Type: application/json');
        echo json_encode($r);
    } else {
        // Add some debug information
        echo json_encode(['error' => 'Failed to retrieve user details']);
    }
} else {
    header('Location: login.php');
    exit();
}
?>
