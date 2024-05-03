<?php
require("../controller/quizCtrl.php");
createQuiz();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Quiz</title>
  <style>
    body {
      background-color: #add8e6;
      color: rgb(0, 0, 0);
      font-family: Arial, sans-serif;
      margin: 0;
    }

    h1 {
      color: rgb(231, 103, 172);
    }

    fieldset {
      width: 30%;
      margin: 20px;
      padding: 20px;
      border: 1px solid rgb(173, 216, 230);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 168, 247, 0.7);
      background-color: white;
    }



    table {
      width: 100%;
    }

    th {
      color: rgb(231, 103, 172);
    }

    th,
    td {
      padding: 10px;
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

    button {
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

    button:hover {
      background-color: rgb(199, 0, 99);
    }

    button:active {
      background-color: rgb(191, 248, 51);
    }

    input[type="submit"] {
      width: 20%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 10px;
      margin-left: 3px;
      margin-right: 3px;
      align-items: center;
      box-sizing: border-box;
      background-color: rgb(231, 103, 172);
      color: rgb(255, 255, 255);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.1s;
    }

    input[type="submit"]:hover {
      background-color: rgb(199, 0, 99);
    }

    input[type="submit"]:active {
      background-color: rgb(191, 248, 51);
    }

    span {
      color: rgb(151, 2, 81);
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
    <h1>Create a New Quiz</h1>
    <form method="post" action="" novalidate>
      <fieldset style="width:30%">

        <table>
          <tr>
            <th>
              <label for="quiz_name">Quiz Name:</label>
            </th>
            <td>
              <input type="text" id="quiz_name" name="quiz_name" value="<?php echo isset($_POST['quiz_name']) ? $_POST['quiz_name'] : ''; ?>">
              <span><?php echo $quizNameError; ?></span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="num_questions">Number of Questions:</label>
            </th>
            <td>
              <input type="number" id="num_questions" name="num_questions" min="1" value="<?php echo isset($_POST['num_questions']) ? $_POST['num_questions'] : ''; ?>">
              <span><?php echo $numQuestionsError; ?></span>
            </td>
          </tr>
        </table>
      </fieldset><br>

      <button type="submit">Next</button>
    </form><br>
    <form action="quiz.php" method="GET">
      <input type="submit" value="Back">
    </form>
  </center>
  <div class="footer">
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>