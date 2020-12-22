<?php
require_once("conn.php");
require_once("functions.php");
require_once('session.php');
confirmLogin();
// echo "<div class='mt-5'></div>admin_id is:".$_SESSION['admin_id']." username=".$_SESSION['username']."<br>";

$pdo = connectDB('piano_shop', 'admin', 'admin');

$pianos_data = dataDashboardPiano($pdo);
$brands = getBrands($pdo);

echo "<pre>";
  //var_dump($pianos_data);
echo "</pre>";
// foreach ($pianos_data as $piano) {
//   foreach ($piano as $key => $value) {
//     echo "$key: $value<br>";
//   }
//   echo "<br>";
// }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <!-- <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">CRUD dashboard bösendorfer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <ul class="nav nav-tabs">
                          <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overview">Overview</a></li>
                          <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#menu1">Create</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="overview" class="tab-pane fade in active">
                            <table class="table">
                              <th class="">
                                <tr>
                                  <td>id</td>
                                  <td>model</td>
                                  <td>name</td>
                                  <td>description</td>
                                  <td>type</td>
                                  <td>brand</td>
                                  <td>img</td>
                                  <td>video</td>
                                  <td>delete</td>
                                  <td>update</td>
                                </tr>
                              </th>
                              <tbody>

                                  <?php foreach ($pianos_data as $piano) {?>
                                    <tr>
                                    <?php foreach ($piano as $key => $value) {?>
                                      <td><?="$value"?></td>
                                      <?php  }
                                          // var_dump($piano['piano_id']);
                                      ?>

                                      <td>
                                        <form class="" action="process_delete.php" method="post">
                                          <input type="hidden" name="piano_id" value="<?=$piano['piano_id']?>">
                                          <input type="submit" name="delete"  value="delete" class="btn btn-danger">
                                        </form>
                                      </td>
                                      <td>
                                        <a href="update.php?id=<?=$piano['piano_id']?>" class="btn btn-warning">Update</a>
                                      </td>
                                    </tr>
                                 <?php }?>
                              </tbody>
                            </table>
                          </div>
                          <div id="menu1" class="tab-pane fade">
                            <!-- CREATE FORM   -->
                            <h3 class="mb-3">Create new piano</h3>
                            <form method="post" action="process_create.php">
                              <div class="form-row">
                                <div class="form-group">
                                  <label for="model">Model</label>
                                  <input type="text" class="form-control" name="model" id="model" placeholder="ymh-01">
                                </div>
                                <div class="form-group">
                                  <label for="name">name</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="yamaha grand">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group">
                                  <label for="description">description</label>
                                  <textarea name="description" rows="4" cols="80" id="description" class="form-control"></textarea>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group">
                                  <label for="img_url">img url</label>
                                  <input type="text" class="form-control" name="img_url" id="img_url" placeholder="yamaha grand">
                                </div>
                                <div class="form-group">
                                  <label for="video_url">video url</label>
                                  <input type="text" class="form-control" name="video_url" id="video_url" placeholder="yamaha grand">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group">
                                  <label for="brand">brand</label>
                                  <select class="form-control" name="brand_id">
                                    <?php foreach ($brands as $brand) { ?>
                                      <option value='<?="$brand[brand_id]";?>' >
                                        <?="$brand[brand_id] $brand[name]";?>
                                      </option>
                                    <?php
                                  }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="type_if">type</label>
                                  <select class="form-control" name="type_id">
                                    <option value="1">upright</option>
                                    <option value="2">grand piano</option>
                                  </select>
                                </div>
                                </div>

                              <div class="form-row">
                              <button type="submit" class="btn btn-primary">Create piano</button>
                            </form>
                          </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </main>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
