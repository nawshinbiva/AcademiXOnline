<?php
    require("../controller/quizCtrl.php");
    questions();
?>
<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz - Questions</title>
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

        legend {
            color: rgb(231, 103, 172);
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        th {
            color: rgb(231, 103, 172);
        }

        th, td {
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
        span {
            color: rgb(151, 2, 81);
        }
        

        

    </style>
</head>

<body>
<div class="header">
        <?php include 'header.php'; ?>
    </div>
    <center>
    <h1>Create Questions</h1>
    <form method="post" action="" novalidate>
        <?php for ($i = 1; $i <= $numQuestions; $i++) { ?>
            <fieldset style="width:30%">
                <legend>Question <?php echo $i; ?></legend>
                <?php if (isset($errorMessages[$i]['question_text'])) { ?>
                    <div><?php echo $errorMessages[$i]['question_text']; ?></div>
                <?php } ?>
                <?php if (isset($errorMessages[$i]['correct_option'])) { ?>
                    <div><?php echo $errorMessages[$i]['correct_option']; ?></div>
                <?php } ?>
                <label for="question_<?php echo $i; ?>">Question:</label>
                <input type="text" name="question_<?php echo $i; ?>" value="<?php echo isset($_POST["question_$i"]) ? $_POST["question_$i"] : ''; ?>"><br><br>
                <label for="marks_<?php echo $i; ?>">Marks:</label>
                <input type="number" name="marks_<?php echo $i; ?>" value="<?php echo isset($_POST["marks_$i"]) ? $_POST["marks_$i"] : ''; ?>"><br><br>
                <label>Answer Options:</label><br>
                <?php for ($j = 1; $j <= 4; $j++) { ?>
                    <label>
                        <input type="radio" name="correct_option_<?php echo $i; ?>" value="<?php echo $j; ?>" <?php if (isset($_POST["correct_option_$i"]) && $_POST["correct_option_$i"] == $j) echo 'checked'; ?>>
                        Option <?php echo $j; ?>
                        <input type="text" name="option_<?php echo $i; ?>_<?php echo $j; ?>" value="<?php echo isset($_POST["option_$i" . "_$j"]) ? $_POST["option_$i" . "_$j"] : ''; ?>" ><br>
                    </label>
                <?php } ?>
            </fieldset>
        <?php } ?><br>

        <button type="submit">Create Quiz</button>
    </form><br>
    <form action="createQuiz.php" method="GET">
        <input type="submit" value="Back">
    </form>
    </center>
    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>


