<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: http://localhost/ev's/home1/slogin.php");
exit(); }
?>