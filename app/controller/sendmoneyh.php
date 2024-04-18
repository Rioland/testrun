<?php   
ob_start();
session_start();
require("../function.php");
require("../config/config.php");
$currentUserID = $_SESSION["user_id"];
 
$receiverEmail ="";
$description="";
$amount="";

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["recipients"])) {
        $errors['recipients'] = "Recipients Email is required";
    } else {
        $receiverEmail = sanitize_input($_POST["recipients"]);
    }


    if (empty($_POST["amount"])) {
        $errors['amount'] = "Amount is required";
    } else {
        $amount = sanitize_input($_POST["amount"]);
    }

    if (empty($_POST["desc"])) {
        $description['desc'] = "Description is required";
    } else {
        $description = sanitize_input($_POST["desc"]);
    }
  
    if (empty($errors)) { 
        // Call the transferFunds function
        $result = transferFunds($conn, $currentUserID, $receiverEmail, $amount, $description);
        // exit($result);
        // Check the result
        if ($result === true) {
            $_SESSION["MESSAGE"] ="Transfer successful";
            header("Location:./send-money");
        } else {
            $_SESSION["ERROR"]= "Transfer failed: " . $result;
            header("Location:./send-money");
        }
        


    } else {
        // Display errors
        $dd = "";
        
        foreach ($errors as $error) {
            $dd = $dd . " " . $error . "<br>";
            break;
        }
        $_SESSION["ERROR"] = $dd;
        // exit( $_SESSION["ERROR"]);
        header("Location:./send-money");
    }


} else {
    $_SESSION["ERROR"] = "invalid request method";
    header("Location:./send-money");
}






?>