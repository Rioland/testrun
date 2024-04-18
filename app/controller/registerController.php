<?php
ob_start();
session_start();
require("../function.php");
require("../config/config.php");
$firstName = $lastName = $email = $username = $country = $phone = $cpassword = $password = "";
$agreeTerms = 0;

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    if (empty($_POST["firstName"])) {
        $errors['firstName'] = "First Name is required";
    } else {
        $firstName = sanitize_input($_POST["firstName"]);
    }

    // Validate Last Name
    if (empty($_POST["lastName"])) {
        $errors['lastName'] = "Last Name is required";
    } else {
        $lastName = sanitize_input($_POST["lastName"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }
    }

    // Validate Username
    if (empty($_POST["username"])) {
        $errors['username'] = "Username is required";
    } else {
        $username = sanitize_input($_POST["username"]);
    }

    // Validate Country
    if (empty($_POST["country"])) {
        $errors['country'] = "Country is required";
    } else {
        $country = sanitize_input($_POST["country"]);
    }

    // Validate Phone Number
    if (empty($_POST["phone"])) {
        $errors['phone'] = "Phone Number is required";
    } else {
        $phone = sanitize_input($_POST["phone"]);
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } else {
        $password = sanitize_input($_POST["password"]);
        if (strlen($password) < 6) {
            $errors['password'] = "Password must be at least 6 characters";
        }
    }
    if (empty($_POST["cpassword"])) {
        $errors['cpassword'] = "Confirm Password is required";
    } else {
        $password = sanitize_input($_POST["cpassword"]);
        if (strlen($password) < 6) {
            $errors['cpassword'] = "Password must be at least 6 characters";
        }
    }
    if ($_POST["cpassword"] != $_POST["password"]) {
        $errors['cpassword'] = "Confirm Password not match";
    } else {
        $password = sanitize_input($_POST["cpassword"]);
    }

    // Check if Terms checkbox is checked
    if (empty($_POST["terms"])) {
        $errors['terms'] = "You must agree to the terms and conditions";
    } else {
        $agreeTerms = 1;
    }

    if (isEmailOrUsernameTaken($conn, $email, $username)) {
        $errors['emailtaken'] = "Email or Username is already taken";
    }

    // If no errors, proceed with inserting into database
    if (empty($errors)) {

     
        // SQL to insert data into users table
        $sql = "INSERT INTO users (first_name, last_name, email, username, country, phone, password, agree_terms)
                    VALUES ('$firstName', '$lastName', '$email', '$username', '$country', '$phone', '$password', '$agreeTerms')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["MESSAGE"] = "account created successfully";
            $token=generateToken(32);
            $liink ="http://".$_SERVER['SERVER_NAME']."/verify-account?token=".$token;
           if(updateVerificationToken($conn, $email,$token)==true){
            sendWelcomeEmail($email,$liink,"".$firstName." ".$lastName);
           }
            header("Location:./register");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION["ERROR"] = "Error: " . $sql . "<br>" . $conn->error;
            header("Location:./register");
        }
    } else {
        // Display errors
        $dd = "";
        foreach ($errors as $error) {
            $dd = $dd . " " . $error;
            break;
        }
        $_SESSION["ERROR"] = $dd;
        header("Location:./register");
    }
} else {
    $_SESSION["ERROR"] = "invalid request method";
    header("Location:./register");
}

$conn->close();
