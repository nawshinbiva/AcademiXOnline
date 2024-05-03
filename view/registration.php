<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/registration.css">
  <script src="js/reg.js"> </script>
</head>
<body>
  <center>
  <h1>Register to continue!</h1>
  <form method="post" action='../controller/registrationAction.php' onsubmit="return validateReg();" novalidate>
    <fieldset style="width:50%">
    <legend><b>Registration Form</b></legend>
    <table>
      <tr>
        <td>
          <table>
            <tr>
              <th><label for="fname">First Name</label></th>
              <td>
              <input type="text" id="fname" name="fname" value="<?php if(isset($data['fname'])) echo $data['fname']; ?>"><br>
              <span id="fnameError"><?php if(isset($errors['fname'])) { echo $errors['fname']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="lname">Last Name</label></th>
              <td>
              <input type="text" id="lname" name="lname" value="<?php if(isset($data['lname'])) echo $data['lname']; ?>"><br>
              <span id="lnameError"><?php if(isset($errors['lname'])) { echo $errors['lname']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="username">Username</label></th>
              <td>
              <input type="text" id="username" name="username" value="<?php if(isset($data['username'])) echo $data['username']; ?>"><br>
              <span id="userError"><?php if(isset($errors['username'])) { echo $errors['username']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="birthdate">Date of Birth</label></th>
              <td>
              <input type="date" id="birthdate" name="birthdate" value="<?php if(isset($data['birthdate'])) echo $data['birthdate']; ?>">
              <br>
              <span id="birthdateError"><?php if(isset($errors['birthdate'])) { echo $errors['birthdate']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="gender">Gender</label></th>
              <td>
              <input type="radio" id="male" name="gender" value="Male" <?php if(isset($data['gender']) && $data['gender'] === 'Male') echo 'checked'; ?>>
              <label for="male">Male</label>

              <input type="radio" id="female" name="gender" value="Female" <?php if(isset($data['gender']) && $data['gender'] === 'Female') echo 'checked'; ?>>
              <label for="female">Female</label>

              <input type="radio" id="others" name="gender" value="Others" <?php if(isset($data['gender']) && $data['gender'] === 'Others') echo 'checked'; ?>>
              <label for="others">Others</label>

              <br>                                
              <span id="genderError"><?php if(isset($errors['gender'])) { echo $errors['gender']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="city">City</label></th>
              <td>
              <input type="text" id="city" name="city" value="<?php if(isset($data['city'])) echo $data['city']; ?>"><br>
              <span id="cityError"><?php if(isset($errors['city'])) { echo $errors['city']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="country">Country</label></th>
              <td>
              <input type="text" id="country" name="country" value="<?php if(isset($data['country'])) echo $data['country']; ?>"><br>
              <span id="countryError"><?php if(isset($errors['country'])) { echo $errors['country']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="religion">Religion</label></th>
              <td>
              <select name="religion" id="religion" value="<?php if(isset($data['religion'])) echo $data['religion']; ?>">
                  <option value="Islam">Islam</option>
                  <option value="Hinduism">Hinduism</option>
                  <option value="Christianity">Christianity</option>
                  <option value="Buddhism">Buddhism</option>
              </select> 
              <br>                               
              <span id="religionError"><?php if(isset($errors['religion'])) { echo $errors['religion']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="phone">Phone</label></th>
              <td>
              <input type="tel" id="phone" name="phone" value="<?php if(isset($data['phone'])) echo $data['phone']; ?>"><br>
              <span id="phoneError"><?php if(isset($errors['phone'])) { echo $errors['phone']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="email">Email</label></th>
              <td>
              <input type="email" id="email" name="email" value="<?php if(isset($data['email'])) echo $data['email']; ?>"><br>
              <span id="emailError"><?php if(isset($errors['email'])) { echo $errors['email']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="password">Password</label></th>
              <td>
              <input type="password" id="password" name="password" ><br>
              <span id="passError"><?php if(isset($errors['password'])) { echo $errors['password']; } ?></span><br>
              </td>
            </tr>
            <tr>
              <th><label for="cpassword">Confirm Password</label></th>
              <td>
              <input type="password" id="cpassword" name="cpassword" ><br>
              <span id="cpassError"><?php if(isset($errors['cpassword'])) { echo $errors['cpassword']; } ?></span><br>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <img src="profile.jpg" alt="Profile Picture">
        </td>
      </tr>
    </table>
    </fieldset>
    <fieldset style="width:40%">
    <legend>Security Questions</legend>
    <table>
      <tr>
        <th>
          <label for="answer1">In what city were you born?</label>
        </th>
        <td>
          <input type="text" id="answer1" name="answer1" value="<?php if (isset($data['answer1'])) echo $data['answer1']; ?>"><br>
        </td>
      </tr>
      <tr>
        <th>
          <label for="answer2">What was the name of your first school?</label>
        </th>
        <td>
          <input type="text" id="answer2" name="answer2" value="<?php if (isset($data['answer2'])) echo $data['answer2']; ?>"><br>
        </td>
      </tr>
    </table>
    </fieldset><br>
    
    <input type="submit" name="register" value="Register">
    <p>Already have an account? <a href='../controller/homeCtrl.php?goto=login'>Log In</a></p>
    <button class="backButton" onclick="redirectToHome();return false;">Back to Home</button>
  </form>
  </center>
  
    <?php include 'footer.php'; ?>
  
</body>
</html>