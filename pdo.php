<?php
/**
 * Does something interesting
 *
 * @param Place   $where  Where something interesting takes place
 * @param integer $repeat How many times something interesting should happen
 *
 * @throws Some_Exception_Class If something interesting cannot happen
 * @author Monkey Coder <mcoder@facebook.com>
 * @return Status
 */
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
