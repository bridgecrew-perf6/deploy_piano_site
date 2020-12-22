<?php
require_once("conn.php");
require_once("env.php");
require_once("functions.php");
$pdo = connectDB($dbname, $user, $password);
// echo "<pre>".var_dump($_POST)."</pre>";
$piano_img_path = uploadImage();
insertPiano($pdo, $piano_img_path);
redirectTo("admin.php");

 ?>
