<?php
require_once("conn.php");
require_once("env.php");
require_once("functions.php");
$pdo = connectDB($dbname, $user, $password);
// var_dump($_POST);
$piano_img_path = uploadImage();
updatePiano($pdo, $piano_img_path);
redirectTo("admin.php");

 ?>
