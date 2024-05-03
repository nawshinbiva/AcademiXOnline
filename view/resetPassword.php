<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/resetPass.css">
  <script src="js/resetPass.js"> </script>
</head>
<body>
<div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
        <form method="POST" novalidate>
            <fieldset style="width:30%">
                <legend><b>Reset Password</b></legend>
                <?php if (isset($error_message)) { ?>
                    <p style="color: red;"><?php echo $error_message; ?></p>
                <?php } ?>
                <table>
                    <tr>
                        <th>
                            <label for="new_password">New Password</label>
                        </th>
                        <td>:
                            <input type="password" id="new_password" name="new_password"><br>
                            <span id="newPassError"></span>
                          </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="confirm_password">Confirm Password</label>
                        </th>
                        <td>:
                            <input type="password" id="confirm_password" name="confirm_password"><br>
                            <span id="confPassError"></span>
                          </td>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" name="submit" value="Reset Password">
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