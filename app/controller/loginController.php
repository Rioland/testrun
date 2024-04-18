<?php
ob_start();
session_start();
require("../function.php");
require("../config/config.php");
$password = "";
$login = "";

$errors = array();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["login"])) {
        $errors['login'] = "Email or Username is required";
    } else {
        $login = sanitize_input($_POST["login"]);
    }

    // Validate Last Name
    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } else {
        $password = sanitize_input($_POST["password"]);
    }



    if (empty($errors)) {
        // Validate input to prevent SQL Injection
        $login = mysqli_real_escape_string($conn, $login);
        $password = mysqli_real_escape_string($conn, $password);


        // Check if login is email or username
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM users WHERE email='$login' AND password='$password'";
        } else {
            $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            $row = $result->fetch_assoc();

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            sendLoginEmail($row['email'],"".$row['first_name']." ".$row['last_name']);
            // Redirect to dashboard or any other page
            header("Location: account");
        } else {
            // Login failed
            $_SESSION["ERROR"] = "invalid login credentials";
            header("Location:./login");
        }

        $conn->close();
    } else {
        // Display errors
        $dd = "";
        foreach ($errors as $error) {
            $dd = $dd . " " . $error . "<br>";
            break;
        }
        $_SESSION["ERROR"] = $dd;
        header("Location:./login");
    }
} else {
    $_SESSION["ERROR"] = "invalid request method";
    header("Location:./login");
}
