<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/userProfile.css">
  <script src="js/userProfile.js"></script>
</head>
<body>
  <script>showUserProfile(); fetchImage();</script>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <h1>Welcome <?php //echo $r["fname"] . " " . $r["lname"]; ?></h1>

    <fieldset style="width:50%">
    <legend>Your Profile:</legend>
    <table>
      <tr>
        <td>
          <table>
            <tr>
              <th><label for="fname">First Name</label>:</th>
              <td id="fname"><br></td>
            </tr>
            <tr>
              <th><label for="lname">Last Name</label>:</th>
              <td id="lname"><br></td>
            </tr>
            <tr>
              <th><label for="birthdate">Date of Birth</label>:</th>
              <td id="birthdate"><br></td>
            </tr>
            <tr>
              <th><label for="gender">Gender</label>:</th>
              <td id="gender"><br></td>
            </tr>
            <tr>
              <th><label for="city">City</label>:</th>
              <td id="city"><br></td>
            </tr>
            <tr>
              <th><label for="country">Country</label>:</th>
              <td id="country"><br></td>
            </tr>
            <tr>
              <th><label for="religion">Religion</label>:</th>
              <td id="religion"><br></td>
            </tr>
            <tr>
              <th><label for="phone">Phone</label>:</th>
              <td id="phone"><br></td>
            </tr>
            <tr>
              <th><label for="email">Email</label>:</th>
              <td id="email"><br></td>
            </tr>
          </table>
        </td>
        <td>
            <img id='img' width="200" height="200" alt="Profile Picture">
        </td>
      </tr>
    </table>
    </fieldset>
    <button class="directbutton" onclick="redirectToeditPro();return false;">Edit Profile</button>
    <button class="directbutton" onclick="redirectTocngPass();return false;">Change Password</button>
    <button class="backButton" onclick="redirectToDash();return false;">Back</button>
    
  </center>
  <?php include 'footer.php'; ?>
</body>
</html>