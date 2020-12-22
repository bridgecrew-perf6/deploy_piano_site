<?php
require_once("conn.php");
require_once("env.php");
require_once("functions.php");
$pdo = connectDB($dbname, $user, $password);
// var_dump($_POST);
updatePiano($pdo);
header('location:index.php');
redirectTo("index.php");

 ?>
