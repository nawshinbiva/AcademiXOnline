<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/cngPass.css">
  <script src="js/cngPass.js"> </script>
</head>

<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>

    <form action="../controller/cngPassCtrl.php" onsubmit='return validatecngPass();' method="post" novalidate>
      <fieldset style="width:30%">
        <legend><b>Change Password</b></legend>
        <table>
          <tr>
            <th><label for="current_password">Current Password</label></th>
            <td>
              <input type="password" id="current_password" name="current_password"><br>
              <span id="currPassError">
                <?php if (isset($errors['current_password'])) {
                  echo $errors['current_password'];
                } ?></span><br>
            </td>
          </tr>
          <tr>
            <th><label for="new_password">New Password</label></th>
            <td>
              <input type="password" id="new_password" name="new_password"><br>
              <span id="newPassError">
                <?php if (isset($errors['new_password'])) {
                  echo $errors['new_password'];
                } ?></span><br>
            </td>
          </tr>
          <tr>
            <td><input type="submit" name="update_password" value="Change Password"></td>

          </tr>
        </table>
      </fieldset>
      <button class="backButton" onclick="redirectToProfile();return false;">Back</button>
    </form>

  </center>
  <?php include 'footer.php'; ?>
</body>

</html>