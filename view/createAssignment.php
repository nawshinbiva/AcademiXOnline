<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiXOnline</title>
  <link rel="stylesheet" href="css/createAssignment.css">
  <script src="js/createAssignment.js"> </script>
</head>

<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <form method="post" action="../controller/createAssignmentCtrl.php" onsubmit=" return validateAssignment();" novalidate>
      <fieldset style="width:50%">
        <legend>
          <h2>Add New Assignment</h2>
        </legend>
        <table>
          <tr>
            <th>
              <label for="assignment_name">Assignment Name:</label>
            </th>
            <td>
              <input type="text" id="assignment_name" name="assignment_name"><br>
              <span id='assignmentNameErr'><?php //if(isset($_SESSION))echo $assignmentNameErr; ?></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="instruction">Instruction:</label>
            </th>
            <td>
              <textarea id='instruction' name="instruction" rows="4" cols="50"></textarea><br>
              <span id='instructionErr'><?php //if(isset($_SESSION))echo $instructionErr; ?></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="possible_points">Possible Points:</label>
            </th>
            <td>
              <input type="number" id="possible_points" name="possible_points"><br>
              <span id='possiblePointsErr'><?php //if(isset($_SESSION))echo $possiblePointsErr; ?></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="due_date_time">Due Date and Time:</label>
            </th>
            <td>
              <input type="datetime-local" id="due_date_time" name="due_date_time"><br>
              <span id='dueDateTimeErr'><?php //if(isset($_SESSION))echo $dueDateTimeErr; ?></span>
            </td>
          </tr>

        </table>
      </fieldset><br>
      <fieldset style="width:30%">
        <legend>Assign To:</legend>
        <table>
          <tr>
            <th>Students:</th>
          </tr>
          <tr>
            <td class="studentList">
            </td>
          </tr>
          <tr>
            <td class="studentList">
              <span id='listError'></span>
            </td>
          </tr>
        </table>
      </fieldset><br>
      <input type="submit" value="Add Assignment">
      <button class="backButton" onclick="redirectToAssignment();return false;">Back</button>
    </form><br>
  </center>
</body>

</html>