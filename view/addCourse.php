<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/addCourse.css">
  <script src="js/addCourse.js"> </script>
</head>
<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
      <form method="post" action='../controller/addCourseCtrl.php' enctype="multipart/form-data" onsubmit="return validateAddCourse();" novalidate>
        <fieldset style="width:50%">
          <legend>Course Information:</legend>
          <table>
            <tr>
              <th>
                <label for="chapter_number">Chapter No:</label>
              </th>
              <td>
                <input type="number" name="chapter_number" id="chapter_number" value="<?php echo isset($_POST['chapter_number']) ? $_POST['chapter_number'] : ''; ?>">
                <span id="chNumError"><?php if(isset($errors['chapter_number'])) { echo $errors['chapter_number']; } ?></span>
                
              </td>
            </tr>

            <tr>
              <th>
                <label for="chapter_name">Chapter Name:</label>
              </th>
              <td>
                <input type="text" name="chapter_name" id="chapter_name" value="<?php echo isset($_POST['chapter_name']) ? $_POST['chapter_name'] : ''; ?>">
                <span id="chNameError"><?php if(isset($errors['chapter_name'])) { echo $errors['chapter_name']; } ?></span>
                
              </td>
            </tr>

            <tr>
              <th>
                <label for="description">Description:</label>
              </th>
              <td>
                <textarea name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
              </td>
            </tr>
          </table>
        </fieldset>

        <fieldset style="width:50%">
          <legend>Lecture Uploads</legend>
          <table>
            <tr>
              <th>
                <label for="lectures">Lectures:</label>
              </th>
              <td>
                <input id='lectures' type="file" name="lectures[]" multiple accept=".ppt, .pptx, .docx, .pdf"><br>
                <span id="lectureError"><?php if(isset($errors['lecture'])) { echo $errors['lecture']; } ?></span>
              </td>
            </tr>
          </table>
        </fieldset><br>
          <input type="submit" name="publish" value="Publish">
          <button class="backButton" onclick="redirectToDash();return false;">Back</button>
      </form>
    </center>
    <div class="footer">
      <?php include 'footer.php'; ?>
    </div>
</body>
</html>