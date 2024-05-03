<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/track.css">
  <script src="js/track.js"> </script>
</head>
<body>
  <script>showStudents();</script>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <fieldset style="width:60%">
    <legend><h1>Student Scores</h1></legend>
    <table id='studentsTable' border="1">
    </table>
    </fieldset><br>
    <button class="backButton" onclick="redirectToDash();return false;">Back</button>
  </center>
  <?php include 'footer.php'; ?>
</body>
</html>