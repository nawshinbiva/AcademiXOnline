<?php

require("../controller/quizCtrl.php");
viewQuiz($loggedInusername);
?>

<!DOCTYPE html>
<html>

<head>
  <title>View Quiz Form</title>
  <style>
    body {
      background-color: #add8e6;
      color: rgb(0, 0, 0);
      font-family: Arial, sans-serif;
      margin: 0;
    }

    h1,
    h2,
    h3 {
      color: rgb(231, 103, 172);
    }

    fieldset {
      width: 70%;
      margin: 20px;
      padding: 20px;
      border: 1px solid rgb(173, 216, 230);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 168, 247, 0.7);
      background-color: white;
    }

    legend {
      color: rgb(231, 103, 172);
    }

    label {
      display: block;
      margin-top: 10px;
      margin-bottom: 5px;
      color: rgb(231, 103, 172);
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 10px;
      box-sizing: border-box;
      border-color: rgb(231, 103, 172);
      border-style: solid;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="text"]:hover,
    input[type="number"]:focus,
    input[type="number"]:hover {
      border-color: rgb(216, 3, 117);
      box-shadow: 0 0 8px rgba(216, 3, 117, 0.5);
      outline: none;
    }

    button,
    input[type="submit"] {
      width: 20%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 10px;
      margin-left: 30px;
      margin-right: 30px;
      box-sizing: border-box;
      background-color: rgb(231, 103, 172);
      color: rgb(255, 255, 255);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.1s;
    }

    button:hover,
    input[type="submit"]:hover {
      background-color: rgb(199, 0, 99);
    }

    button:active,
    input[type="submit"]:active {
      background-color: rgb(191, 248, 51);
    }

    .header {
      position: fixed;
      top: 0;
      width: 100%;
    }

    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;

    }
  </style>
</head>

<body>
  <div class="header">
    <?php include 'header.php'; ?>
  </div>
  <center>
    <fieldset style="width:30%">
      <legend>
        <h1>Quiz: <?php echo $quiz['quiz_name']; ?></h1>
      </legend>
      <?php
      options($resQuestions);
      ?>

    </fieldset><br>

    <form action="quiz.php" method="GET">
      <input type="submit" value="Back">
    </form>
  </center>
  <div class="footer">
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>