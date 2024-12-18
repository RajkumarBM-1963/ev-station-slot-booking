<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location:http://localhost/ev/home1/login.php ");
exit(); }
?>

