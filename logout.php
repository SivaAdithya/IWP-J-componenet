<?php
session_start();
$_SESSION = array();

session_destroy();

header("location: lohin_1.php");
die();
?>