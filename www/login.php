<?php
// Set some session variables
  session_start();
  $_SESSION['usrname'] = strip_tags($_POST['usrname']);
  header("Location: index.php");
?>