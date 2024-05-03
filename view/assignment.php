<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/assignment.css">
  <script src="js/assignment.js"> </script>
</head>
<body>
  <script> showAssignments() </script>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
  <h2>Assigned Assignments</h2>

  <div class="table-container">
    <table id='assignmentsTable' border="1">
    </table>
  </div>
      
  <button class="backButton" onclick="redirectToNewAss();return false;">Add New Assignment</button>
  <button class="backButton" onclick="redirectToDash();return false;">Back</button>
  </center>
  <?php include 'footer.php'; ?>
</body>
</html>