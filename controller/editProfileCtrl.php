<?php
    require("sessionCheck.php");
    require("../model/pageModel.php");

    $errors = [];

    $loggedInusername = $_SESSION['username'];
    $r = teacherDetail($loggedInusername);

    if (isset($_POST['update_profile'])) {
        // Validation logic
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^\d{4}-\d{2}-\d{2}$/'
            ]
        ]);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        // Check for empty fields
        if (empty($fname)) {
            $errors['fname'] = "First Name is empty";
        }

        if (empty($lname)) {
            $errors['lname'] = "Last Name is empty";
        }

        if (empty($birthdate)) {
            $errors['birthdate'] = 'Date of Birth is empty';
        }

        if (empty($gender)) {
            $errors['gender'] = 'Gender is empty';
        }

        if (empty($religion)) {
            $errors['religion'] = "Religion is empty";
        }

        if (empty($city)) {
            $errors['city'] = "City is empty";
        }

        if (empty($country)) {
            $errors['country'] = "Country is empty";
        }

        if (empty($phone)) {
            $errors['phone'] = "Phone is empty";
        } elseif (!preg_match("/^[\d\s\-\(\)]{10,}$/", $phone)) {
            $errors['phone'] = "Invalid phone number format";
        }
        

        if (empty($email)) {
            $errors['email'] = "Email is empty";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }

    // If there are no errors, update the database
        if (empty($errors)) {
            teacherDetailUpdate($fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $loggedInusername);
        }
    }
?>