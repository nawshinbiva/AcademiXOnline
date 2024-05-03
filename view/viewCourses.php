<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/viewCourse.css">
  <script src="js/viewCourses.js"> </script>
</head>
<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <h2>Your Uploaded Courses</h2>
    <input id='searchInput' type="text" onchange="showCourses();">
    <div class="table-container">
      <table id='table'></table>
      <script>showCourses();</script>
    </div>
    
    <button class="backButton" onclick="redirectToDash();return false;">Back</button>
  </center>
  
  <?php include 'footer.php'; ?>
  
</body>
</html>