<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/editCourse.css">
  <script src="js/editCourse.js"> </script>
</head>
<body>
<div class="header">
        <?php include 'header.php'; ?>
    </div>
    <center>
        <form method="post" enctype="multipart/form-data" onsubmit="updateCourseData();" novalidate>
            <fieldset style="width:50%">
                <legend>Edit Course Information</legend>
                <table>
                    <tr>
                        <th>
                            <label for="chapter_number">Chapter Number:</label>
                        </th>
                        <td>
                            <input type="text" id='chapter_number' readonly>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label for="chapter_name">Chapter Name:</label>
                        </th>
                        <td>
                            <input type="text" id='chapter_name' readonly>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <label for="description">Description:</label>
                        </th>
                        <td>
                            <textarea name="new_description" id='description'></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset style="width:50%">
              <legend>Existing Lecture</legend>
              <ul id="existingLecturesList"></ul>
            </fieldset>
            
            <fieldset style="width:50%">
                <legend>Edit Lecture</legend>
                <table>
                    <tr>
                        <th>
                            <label for="new_lectures">New Lecture:</label>
                        </th>
                        <td>
                            <input type="file" name="new_lectures[]" multiple>
                            <?php if (isset($errors['new_lecture'])) {
                                echo $errors['new_lecture'];
                            } ?>
                        </td>
                    </tr>
                </table>
            </fieldset><br>
            <input type="submit" name="update" value="Update">
            <button class="backButton" onclick="redirectToViewCourses();return false;">Back</button>
            </form>
    </center>
    <?php include 'footer.php'; ?>
</body>
</html>