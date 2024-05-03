<?php
require("../controller/quizCtrl.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Quizzes</title>
  <style>
    body {
      background-color: #add8e6;
      color: rgb(0, 0, 0);
      font-family: Arial, sans-serif;
      margin: 0;
    }



    h2 {
      color: rgb(231, 103, 172);
    }

    table {
      width: 60%;
      border-collapse: collapse;
    }

    th,
    td {

      padding: 10px;
      text-align: center;
      background-color: #add8e6;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    th {
      background-color: #add8e6;
      color: white;
    }

    td {
      background-color: rgb(247, 206, 227);
      color: rgb(0, 168, 247);
    }

    button {
      padding: 8px;
      margin: 3px;
      background-color: rgb(231, 103, 172);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.1s;
    }

    button:hover {
      background-color: rgb(199, 0, 99);
    }

    a {
      color: rgb(151, 2, 81);
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    button:active {
      background-color: rgb(191, 248, 51);
    }

    input[type="submit"] {
      width: 150px;
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

    <h2>Quiz  Directory</h2>

    <table>
      <tr>
        <th>Quiz Name</th>


      </tr>

      <?php
      while ($row = $quizzes->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['quiz_name']}</td>";
        echo "<td><form style='display:inline;' action='viewQuizForm.php' method='GET'>";
        echo "<input type='hidden' name='id' value='{$row['quiz_id']}'>";
        echo "<input type='submit' value='View Form'></form>";

        echo "<form style='display:inline;' action='../controller/deleteQuiz.php' method='GET'>";
        echo "<input type='hidden' name='id' value='{$row['quiz_id']}'>";
        echo "<input type='submit' value='Delete'></form></td>";
        echo "</tr>";
      }
      ?>
    </table>



    <form action="createQuiz.php" method="GET">
      <input type="submit" value="Add New Quiz">
    </form>

    <form action="tDashboard.php" method="GET">
      <input type="submit" value="Back">
    </form>
  </center>
  <div class="footer">
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>