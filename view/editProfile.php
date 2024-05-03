<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/editProfile.css">
  <script src="js/editProfile.js"> </script>
</head>

<body>
  <script>showUserProfile();fetchImage();</script>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <h1>Edit Your Profile</h1>

    <form class="display" action='../controller/updateProfileCtrl.php' onsubmit='return validateProfileEdit();' method="post" novalidate>
      <fieldset style="width:50%">
        <legend>Edit Your Profile:</legend>
        <table>
          <tr>
            <td>
              <table>
                <tr>
                  <th><label for="fname">First Name</label></th>
                  <td>: <input type="text" id="fname" name="fname">
                    <br>
                    <span id='fnameError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="lname">Last Name</label></th>
                  <td>: <input type="text" id="lname" name="lname">
                    <br>
                    <span id='lnameError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="birthdate">Date of Birth</label></th>
                  <td>: <input type="date" id="birthdate" name="birthdate">
                    <br>
                    <span id='birthdateError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="gender">Gender</label></th>
                  <td>:
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>

                    <input type="radio" id="others" name="gender" value="Others">
                    <label for="others">Others</label>

                    <br>
                    <span id='genderError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="city">City</label></th>
                  <td>: <input type="text" id="city" name="city">
                    <br>
                    <span id='cityError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="country">Country</label></th>
                  <td>: <input type="text" id="country" name="country">
                    <br>
                    <span id='countryError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="religion">Religion</label></th>
                  <td>:
                    <select name="religion" id="religion">
                      <option value="Islam">Islam</option>
                      <option value="Hinduism">Hinduism</option>
                      <option value="Christianity">Christianity</option>
                      <option value="Buddhism">Buddhism</option>
                    </select>
                    <br>
                    <span id='religionError'></span>
                    <br>
                  </td>
                </tr>

                <tr>
                  <th><label for="phone">Phone</label></th>
                  <td>
                    : <input type="tel" id="phone" name="phone" >
                    <br>
                    <span id='phoneError'></span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <th><label for="email">Email</label></th>
                  <td>
                    : <input type="email" id="email" name="email">
                    <br>
                    <span id='emailError'></span>
                    <br>
                  </td>
                </tr>
              </table>
            </td>
            <td>
              <img id='img' alt="Profile Picture" width='200px'>
            </td>
          </tr>
        </table>
      </fieldset><br>
      <input type="submit" name="update_profile" value="Update Profile">
      <button class="backButton" onclick="redirectTouserProfile();return false;">Back</button>
    </form>
    
  </center>
  <?php include 'footer.php'; ?>
</body>

</html>