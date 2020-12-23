<?php
 /**
 * Inserta un piano en tabla pianos, los datos vienen de $_POST
 *
 * @param $pdo   instancia de PDO
 * @param $piano_img_path la ruta completa de la imagen
 *
 * @throws PDOException si no puede insertar el piano
 */
function insertPiano($pdo, $piano_img_path) {
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
      ':img_url'=>$piano_img_path,
      ':video_url'=>$_POST['video_url']
    ));
    echo "data inserted OK";
    } catch(PDOException $e) {
        echo "BAD insertion ". $e->getMessage();
    }
}

/**
* Actualiza un piano en tabla pianos, los datos vienen de $_POST
*
* @param $pdo   instancia de PDO
* @param $piano_img_path la ruta completa de la imagen
*
* @throws PDOException si no puede actualizar el piano
*/
function updatePiano($pdo, $piano_img_path) {
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
  $statement = $pdo->prepare($sql);
  $statement->execute( array (
    ':model'=> $_POST['model'],
    ':name'=>$_POST['name'],
    ':description'=>$_POST['description'],
    ':brand_id'=>$_POST['brand_id'],
    ':type_id'=>$_POST['type_id'],
    ':img_url'=>$piano_img_path,
    ':video_url'=>$_POST['video_url'],
    ':id'=>$_POST['piano_id']
  ));
    var_dump($statement);

      echo "data updated OK";
      redirectTo("admin.php");
    } catch(PDOException $e) {
        echo "BAD insertion ". $e->getMessage();
    }
}

/**
* Devuelve todos los pianos en un array asociativo
*
* @param $pdo   instancia de PDO
*
* @throws PDOException si no puede traer el piano
*/
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

/**
* Devuelve todos los pianos de una marca en un array asociativo
*
* @param $pdo   instancia de PDO
* @param $brand_id entero identificador de marca
* @throws PDOException si no puede traer los pianos
*/
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

/**
* Devuelve todos los pianos de un tipo en un array asociativo
*
* @param $pdo   instancia de PDO
* @param $type_id entero identificador de tipo
* @throws PDOException si no puede traer los pianos
*/
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

/**
* Devuelve todos los datos de un piano en un array asociativo
*
* @param $pdo   instancia de PDO
* @param $id entero identificador de piano
* @throws PDOException si no puede traer los pianos
*/
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

/**
* Devuelve todos los pianos en un array asociativo que
* trae las marcas y el tipo
* @param $pdo   instancia de PDO
*
* @throws PDOException si no puede traer los pianos
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

/**
* Devuelve todos las marcas en un array asociativo
*
* @param $pdo   instancia de PDO
* @throws PDOException si no puede traer las marcas
*/
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

/**
* Borra un piano cuyo id es pasado por $_POST
*
* @param $pdo   instancia de PDO
* @throws PDOException si no puede borrar el piano
*/
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
// function login($pdo, $username, $password) {
//   $sql = "SELECT * FROM admins WHERE username=:user AND password=:pass";
//   try {
//     $statement = $pdo->prepare($sql);
//     $statement->execute(array(":user"=>$username,":pass"=>$password));
//     // var_dump($statement);
//     return ($statement);
//   } catch(PDOException $e) {
//     echo "BAd login query ". $e->getMessage();
//   }
// }
/**
* Busca un usuario (admin) en la tabla admins
*
* @param $pdo   instancia de PDO
* @param $username el nombre de usuario a buscar
* @throws PDOException si no puede traer al usuario
*/
function findUser($pdo, $username) {
  $sql = "SELECT * FROM admins WHERE username=:user";
  try {
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":user"=>$username));
    // var_dump($statement);
    return ($statement);
  } catch(PDOException $e) {
    echo "BAd login query ". $e->getMessage();
  }
}

/**
* Determina si el admin est logueado
* @return true si lo esta, false caso contrario
*/
function adminIsLogged(){
  if (isset($_SESSION['admin_id']) || isset($_COOKIE['admin'])) return true;
  else return false;
}

/**
* Confirma que el admin este logueado, redirige a login si no lo esta
*
*/
function confirmLogin() {
  if(!adminIsLogged()) {
    header("location:login.php");
  }
}

/**
* Redirige a una pagina pasado por parametro
* @param $where a donde redirigir
*/
function redirectTo($where) {
  header("location:$where");
}

/**
* Sube una image pasada por formulario, y la renombra
* @return la ruta de la imagen
*/
function uploadImage() {
  $image_name=$_FILES['banner_image']['name'];
  $temp = explode(".", $image_name);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $imagepath="img/".$newfilename;
  move_uploaded_file($_FILES["banner_image"]["tmp_name"],$imagepath);
  // echo "uploading image: $imagepath<br>";
  return $imagepath;
}
 ?>
