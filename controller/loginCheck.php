<?php 
    session_start();
    require_once("../model/pageModel.php");

    if(isset($_POST['submit'])) 
    {
        $username = $_POST['username'];
        $enteredPassword = $_POST['password'];

        $result = login($username, $enteredPassword);

        if ($result->num_rows > 0) {
            $user = mysqli_fetch_assoc($result);
            
            // Check if the entered password matches the hashed password in the database
            if (password_verify($enteredPassword, $user['password'])) {
                setcookie('username', $username, 0, '/');
                setcookie('password', $user['password'], 0, '/');

                // Check if "Remember Me" is selected
                if (isset($_POST['remember'])) {
                    // Set cookies to remember login information for a month
                    setcookie('username', $username, time() + (24*60*60*30), '/');
                    setcookie('password', $user['password'], time() + (24*60*60*30), '/');
                }

                header('location:../view/tDashboard.php');
            } else {
              $_SESSION['passError']="Invalid Password";
              header("location:../view/login.php");
            }
        } else {
            echo "Invalid User";
        }
    }


?>