<?php
session_start();
require_once("../model/pageModel.php");

if(!empty($_SESSION)){
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $data = isset($_SESSION['data']) ? $_SESSION['data'] : [];
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['register']))  
  {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
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
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $answer1 = htmlspecialchars($_POST['answer1']);
    $answer2 = htmlspecialchars($_POST['answer2']);

    $errors = [];

    if (empty($fname)) {
        $errors['fname'] = "First Name is empty";
    }

    if (empty($lname)) {
        $errors['lname'] = "Last Name is empty";
    }

    if (empty($username)) {
        $errors['username'] = 'Username is empty';
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

    if (empty($answer1)) {
        $errors['answer1'] = "Answer is empty";
    }

    if (empty($answer2)) {
        $errors['answer2'] = "Answer is empty";
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

    if (empty($password)) {
        $errors['password'] = "Password is empty";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters";
    }
    
    if (empty($cpassword)) {
        $errors['cpassword'] = "Confirm Password is empty";
    } elseif ($password !== $cpassword) {
        $errors['cpassword'] = "Passwords do not match";
    }


    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = [
        'fname' => $fname,
        'lname' => $lname,
        'birthdate'=> $birthdate,
        'gender' => $gender,
        'religion' => $religion,
        'city' => $city,
        'country' => $country,
        'phone'=> $phone,
        'email' => $email,
        'password' => $password,
        'username' => $username,
        'answer1' => $answer1,
        'answer2' => $answer2,
       
    ];


    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        register($fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $hashedPassword, $username, $answer1, $answer2);
        
        session_destroy();
    } 
        header("Location: ../view/registration.php");
        exit;
}
}
?>
