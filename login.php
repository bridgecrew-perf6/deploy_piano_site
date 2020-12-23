<?php
require_once('conn.php');
require_once('functions.php');
require_once('session.php');
if(isset($_POST) && !empty($_POST)) {
  $pdo = connectDB('piano_shop', 'admin', 'admin');

  $user = $_POST['username'];
  $pass = $_POST['password'];


  $statement = findUser($pdo,$user); // id, user and password
  $validUser = $statement->fetchAll(PDO::FETCH_ASSOC);

  if (count($validUser) == 1) {
    if (password_verify($pass, $validUser[0]['password'])){ // password is ok
      $_SESSION['admin_id'] = $validUser[0]['admin_id'];
      $_SESSION['username'] = $validUser[0]['username'];
      if(isset($_POST['remember'])) {
        //set 5 min cookie
        setcookie("admin",$validUser[0]['username'],time()+300);
      }

    } else { // password not OK
      echo "<script> alert('invalid credentials!');</script>";
      redirectTo("login.php");
    }

    redirectTo("admin.php");
  }
  else {
    // echo "invalid user<br>";
    echo "<script> alert('invalid credentials!');</script>";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>sFp Admin panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUser">user</label>
                                                <input class="form-control py-4" id="inputUser" type="text" name="username" placeholder="Enter username" />
                                                <div class="form-group">
                                            </div>
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" name="remember" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; piano shop 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
