<?php
  function connectDB($dbname, $user, $password) {
    try {
      $database = new PDO("mysql:host=127.0.0.1;dbname=$dbname;charset=utf8",$user,$password);
      $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "connection OK";
      return $database;
      } catch(PDOException $e) {
        echo "connection FAILED ". $e->getMessage();
        return false;
      }
  }
?>
