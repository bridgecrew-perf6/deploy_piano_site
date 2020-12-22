<?php
function insertPiano($pdo) {
 $sql = "INSERT INTO pianos
 (piano_id,model,name,description,in_stock,brand_id,type_id,img_url,video_url)
 VALUES
 (NULL, :model, :name,:description,:in_stock,:brand_id,:type_id,:img_url,:video_url);";
try {
  echo "<h1>type_id ".$_POST['type_id']."</h1>";
  $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
    $statement->execute( array (
      ':model'=> $_POST['model'],
      ':name'=>$_POST['name'],
      ':description'=>$_POST['description'],
      ':in_stock'=>true,
      ':brand_id'=>$_POST['brand_id'],
      ':type_id'=>$_POST['type_id'],
      ':img_url'=>$_POST['img_url'],
      ':video_url'=>$_POST['video_url']
    ));
    echo "data inserted OK";
    // header('location:index.html');
    } catch(PDOException $e) {
        echo "BAD insertion ". $e->getMessage();
    }
}

function updatePiano($pdo) {
  echo "piano_id=$_POST[piano_id]<br>";
 $sql = "UPDATE pianos SET
         name=:name,
         model=:model,
         description=:description,
         brand_id=:brand_id,
         type_id=:type_id,
         img_url=:img_url,
         video_url=:video_url
         WHERE piano_id = :id
         ;";
try {
  // $statement = $pdo->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
  // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $statement = $pdo->prepare($sql);
  $statement->execute( array (
    ':model'=> $_POST['model'],
    ':name'=>$_POST['name'],
    ':description'=>$_POST['description'],
    // ':in_stock'=>true,
    ':brand_id'=>$_POST['brand_id'],
    ':type_id'=>$_POST['type_id'],
    ':img_url'=>$_POST['img_url'],
    ':video_url'=>$_POST['video_url'],
    ':id'=>$_POST['piano_id']
  ));
    var_dump($statement);

      echo "data updated OK";
    // header('location:index.html');
    } catch(PDOException $e) {
        echo "BAD insertion ". $e->getMessage();
    }
}
function getPianos($pdo) {
  $sql = "SELECT * FROM pianos";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $pianos_data =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $pianos_data;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
function getPianosByBrand($pdo,$brand_id) {
  $sql = "SELECT * FROM pianos WHERE brand_id=$brand_id";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $pianos_data =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $pianos_data;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
function getPianosByType($pdo,$type_id) {
  $sql = "SELECT * FROM pianos WHERE type_id=$type_id";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $pianos_data =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $pianos_data;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
function getPiano($pdo, $id) {
  $sql = "SELECT * FROM pianos WHERE piano_id=:id";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
    $piano_data =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $piano_data;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
/*

*/
function dataDashboardPiano($pdo){
  $sql = "SELECT
    pianos.piano_id,pianos.model, pianos.name, pianos.description,
    types.name AS 'type',
    brands.name AS 'brand',
    pianos.img_url,pianos.video_url
   FROM pianos
    LEFT JOIN brands ON brands.brand_id = pianos.brand_id
    LEFT JOIN types ON types.type_id = pianos.type_id
    ;";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $pianos_data =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $pianos_data;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
function getBrands($pdo) {
  $sql = "SELECT brand_id,name FROM brands;";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $brands =
    $statement->fetchAll(PDO::FETCH_ASSOC);
    return $brands;
  } catch (PDOException $e) {
    echo "BAd getting " . $e->getMessage();
  }
}
function deletePiano($pdo) {
  $sql = "DELETE  FROM pianos WHERE piano_id=:id;";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>(int)$_POST['piano_id']));
    return $statement;
  } catch (PDOException $e) {
    echo "BAd DELETING " . $e->getMessage();
  }
}
// ADMIN
function login($pdo, $username, $password) {
  $sql = "SELECT * FROM admins WHERE username=:user AND password=:pass";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":user"=>$username,":pass"=>$password));
    // var_dump($statement);
    return ($statement);
  } catch(PDOException $e) {
    echo "BAd login query ". $e->getMessage();
  }
}
function adminIsLogged(){
  if (isset($_SESSION['admin_id']) || isset($_COOKIE['admin'])) return true;
}
function confirmLogin() {
  if(!adminIsLogged()) {
    // message with session
    header("location:login.php");
  }
}
function redirectTo($where) {
  header("location:$where");
}
 ?>
