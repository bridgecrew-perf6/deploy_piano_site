<?php
// just examples, not real credentials
  function connectDB() {
    try {
      $database = new PDO("mysql:host=127.0.0.1;dbname=db_name","root","root");
      $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "connection OK";
      return $database;
      } catch(PDOException $e) {
        echo "connection FAILED ". $e->getMessage();
      }
  }
  $pdo = connectDB();

  function insertData($pdo) {

  try {
    $statement = $pdo->prepare(
      "INSERT INTO usuarios VALUES (NULL, 'maria'),
                                   (NULL, 'micaela'),
                                   (NULL, 'camila'),
                                   (NULL, 'elga');"
    );
    $statement->execute();
    echo "data inserted OK";
  } catch(PDOException $e) {
      echo "BAD insertion ". $e->getMessage();
  }

  }
  //insertData($pdo);

?>
