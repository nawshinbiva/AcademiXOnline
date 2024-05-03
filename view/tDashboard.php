<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/tDash.css">
  <script src='js/userProfile.js'></script>
</head>
<body>
    <script>fetchImage()</script>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
        <div class="dash">
            <h1>Welcome to Your Dashboard</h1>
            <div class="profile-picture">
                <a href='../controller/homeCtrl.php?goto=userProfile'>
                <img id="img" alt="User Image" width='250px' height='250px'>
                </a>
            </div>

            <div class="dashList">
                <ul>
                    <li><i class="fas fa-plus" style="color: #d80375;"></i><a href='../controller/homeCtrl.php?goto=addCourse'> Add New Course</a></li>
                    <li><i class="fas fa-list" style="color: #d80375;"></i><a href='../controller/homeCtrl.php?goto=viewCourses'> View Course List</a></li>
                    <li><i class="fas fa-clipboard-check" style="color: #d80375;"></i><a href='../controller/homeCtrl.php?goto=assignment'> Assignments</a></li>
                    <li><i class="fas fa-pen" style="color: #d80375;"></i><a href='../controller/homeCtrl.php?goto=quiz'> Quizzes</a></li>
                    <li><i class="fas fa-chart-line" style="color: #d80375;"></i><a href='../controller/homeCtrl.php?goto=track'> Track Student's Progress</a></li>
                </ul>
            </div>
        </div>
    </center>
    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>