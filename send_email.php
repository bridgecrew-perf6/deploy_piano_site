<?php
require_once('functions.php');
require_once("session.php");
// send email
$dest = "mail@mail.com";
$sub = "piano contact";
//mail($dest, $sub, $_POST['customerMessage']);
echo "email sent<br>";
// crear la session para mostrar mensaje con bs alert
$_SESSION["contact"] = "OK";
redirectTo("index.php");

 ?>
