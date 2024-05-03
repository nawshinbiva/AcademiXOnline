<?php
    require('sessionCheck.php');

    if($_GET['goto'] == 'login'){
        header('location: ../view/login.php');
    }

    if($_GET['goto'] == 'register'){
        header('location: ../view/registration.php');
    }

    if($_GET['goto'] == 'forgotPass'){
        header('location: ../view/forgotPass.php');
    }

    if($_GET['goto'] == 'home'){
        header('location: ../view/homepage.php');
    }

    if($_GET['goto'] == 'addCourse'){
        header('location: ../view/addCourse.php');
    }

    if($_GET['goto'] == 'assignment'){
        header('location: ../view/assignment.php');
    }

    if($_GET['goto'] == 'viewCourses'){
        header('location: ../view/viewCourses.php');
    }

    if($_GET['goto'] == 'quiz'){
        header('location: ../view/quiz.php');
    }

    if($_GET['goto'] == 'track'){
        header('location: ../view/track.php');
    }

    if($_GET['goto'] == 'userProfile'){
        header('location: ../view/userProfile.php');
    }

    if($_GET['goto'] == 'dashboard'){
        header('location: ../view/tDashboard.php');
    }

    if($_GET['goto'] == 'logout'){
        header('location: logout.php');
    }


    

?>