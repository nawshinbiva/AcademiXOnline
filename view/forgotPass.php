<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/forgotPass.css">
  <script src="js/forgotPass.js"> </script>
</head>

<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <form method="POST" action='../controller/forgotPassCtrl.php' onsubmit='return validateforgotPass();' novalidate>
      <fieldset style="width:30%">
        <legend><b>Forgot Password</b></legend>
        <?php if (isset($_SESSION['error_message'])) { ?>
          <p style="color: red;"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message'])?></p>
        <?php } ?>
        <table>
          <tr>
            <th>
              <label for="username">Username</label>
            </th>
            <td>:
              <input type="text" id="username" name="username"><br>
              <span id="userError"></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="answer1">In what city were you born?</label>
            </th>
            <td>:
              <input type="text" id="answer1" name="answer1"><br>
              <span id="ans1Error"></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="answer2">What was the name of your first school?</label>
            </th>
            <td>:
              <input type="text" id="answer2" name="answer2"><br>
              <span id="ans2Error"></span>
            </td>
          </tr>
          <tr>
            <th>
              <input type="submit" name="submit" value="Submit">
            </th>
            <td>
              <a href="login.php">Back to Login</a><br>
            </td>
          </tr>
        </table>
      </fieldset>
    </form>
  </center>
  <?php include 'footer.php'; ?>
</body>

</html>