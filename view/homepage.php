<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/home.css">
</head>
<body>
  <div class='heading'>
    <center>
      <img src="media/LOGO2.png" alt="AcademiXOnline" style="width: 15%;">
    </center>
    <?php if(isset($_SESSION['username'])){ ?>
      <div class='login'><a href='../controller/homeCtrl.php?goto=dashboard'>Dashboad</a> &nbsp; &nbsp; <a href='../controller/homeCtrl.php?goto=logout'>Logout</a></div>
    <?php }else{ ?>
      <div class='login'><a href='../controller/homeCtrl.php?goto=login'>Login</a>/<a href='../controller/homeCtrl.php?goto=register'>Register</a></div>
    <?php } ?>  
  </div>
  
  <div class='bd'>
    <center>
      <img src="media/homebg.png" style="width: 55%; margin-top:10px;">
    </center>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>