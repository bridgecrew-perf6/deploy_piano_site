<?php
require_once('session.php');
$_SESSION['admin_id'] = null;
$_SESSION['username'] = null;

session_destroy();
header('location:login.php');
 ?>
