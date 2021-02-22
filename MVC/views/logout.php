<?php
session_start();
unset($_SESSION["UserData"]);
header("Location:login.php");
?>