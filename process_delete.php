<?php
require_once("conn.php");
require_once("env.php");
require_once("functions.php");
$pdo = connectDB($dbname, $user, $password);

deletePiano($pdo);
redirectTo("admin.php");

 ?>
