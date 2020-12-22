<?php
require_once("conn.php");
require_once("env.php");
require_once("functions.php");
$pdo = connectDB($dbname, $user, $password);
// echo "<pre>".var_dump($_POST)."</pre>";
insertPiano($pdo);
//header('location:index.php');

// echo "<pre>";
// echo "</pre>";

// id,model, name, description,instock, brandid,typeid, img,video
// function insertPiano($pdo) {
//  $sql = "INSERT INTO pianos VALUES (NULL, :model, :name,:description,TRUE,3,2,:img_url,:video_url);";
// try {
//   // var_dump($_POST['model']);
//   $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
//     $statement->execute( array (
//       ':model'=> $_POST['model'],
//       ':name'=>$_POST['name'],
//       ':description'=>$_POST['description'],
//       ':img_url'=>$_POST['img_url'],
//       ':video_url'=>$_POST['video_url']
//     ));
//     echo "data inserted OK";
//     header('location:index.html');
//     } catch(PDOException $e) {
//         echo "BAD insertion ". $e->getMessage();
//     }
// }

// insertPiano($pdo);
// function getPianos($pdo) {
//   $sql = "SELECT * FROM pianos";
//   try {
//     $statement = $pdo->prepare($sql);
//     $statement->execute();
//     $pianos_data =
//     $statement->fetchAll(PDO::FETCH_ASSOC);
//     return $pianos_data;
//   } catch (PDOException $e) {
//     echo "BAd getting " . $e->getMessage();
//   }
// }
// $pianos_data = getPianos($pdo);
//
// echo "<pre>";
// // var_dump($pianos_data);
// echo "</pre>";
// foreach ($pianos_data as $arr) {
//   foreach ($arr as $key => $value) {
//     echo "$key: $value<br>";
//   }
//   echo "<br>";
// }
 ?>
