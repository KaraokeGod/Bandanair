<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();

   echo 'You are being logged out';
   header('Refresh: 1; URL = login.php');
?>
