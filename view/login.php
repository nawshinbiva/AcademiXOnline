<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/login.css">
  <script src="js/login.js"> </script>
</head>
<body>
  <center>
  <form method="POST" action='../controller/loginCheck.php' onsubmit="return validateLogin();" novalidate>
    <fieldset>
      <legend><b>Log In</b></legend>
      <table>
      <tr>
        <th>
            <label for="username">Username</label>
        </th>

        <td>
            <input type="text" id="username" name="username"><br>
            <span id="userError"></span>
        </td>
      </tr>
    
      <tr>
        <th>
            <label for="password">Password</label>
        </th>

        <td>
            <input type="password" id="password" name="password"><br>
            <span id="passError"><?php if(isset($_SESSION['passError'])){echo $_SESSION['passError']; unset($_SESSION['passError']);} ?></span>
        </td>
      </tr>

      <tr>
        <th>
            <input type="checkbox" id="remember" name="remember">  
        </th>

        <td>
            <label for="remember">Remember Me</label>
        </td>
      </tr>

      <tr>
        <th>
          <input type="submit" name="submit" value="Log In">
        </th>

        <td>
          <a href='../controller/homeCtrl.php?goto=forgotPass'>Forgot Password?</a><br>
        </td> 
      </tr>
      </table>
    </fieldset>
    <p>Don't have an account? <a href='../controller/homeCtrl.php?goto=register'>Sign Up</a></p>
    <button class="backButton" onclick="redirectToHome();return false;">Back to Home</button>
  </form>
  </center>
  
    <?php include 'footer.php'; ?>
  
</body>
</html>