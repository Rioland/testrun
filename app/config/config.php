<?php
  // $db_host = 'localhost';
  // $db_user = 'root';
  // $db_password = 'root';
  // $db_db = 'mew-wallet';

  $db_host = 'localhost';
  $db_user = 'jameswil_mew-wallet';
  $db_password = 'OAcL}A#toH~S';
  $db_db = 'jameswil_mew-wallet';
 
  $conn = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($conn->connect_error) {
    echo 'Errno: '.$conn->connect_errno;
    echo '<br>';
    echo 'Error: '.$conn->connect_error;
    exit();
  }



 
?>