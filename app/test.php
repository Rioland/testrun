<?php
require("./config/config.php");
require("./function.php");

 $hh="bc1qw85ccsdad4as6c2mjdea0fvtev8ua0ecaxvasu";
echo $_SESSION["user_id"];
echo  updateBTCAddress($conn, $_SESSION["user_id"], $hh);
?>