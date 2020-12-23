<?php
require_once("conn.php");
require_once("functions.php");
require_once('session.php');
confirmLogin();
// echo "<div class='mt-5'></div>admin_id is:".$_SESSION['admin_id']." username=".$_SESSION['username']."<br>";

$pdo = connectDB('piano_shop', 'admin', 'admin');

$pianos_data = dataDashboardPiano($pdo);
$brands = getBrands($pdo);

 ?>
 <?php require_once("partials/admin_head.html");?>
    <body class="sb-nav-fixed">
    <?php require_once("partials/admin_nav.html");?>

        <!-- <div id="layoutSidenav">
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
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div> -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="" style="margin-top:10vh;">CRUD Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <ul class="nav nav-tabs">
                          <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overview">Overview</a></li>
                          <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#menu1">Create</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="overview" class="tab-pane fade-in active">
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
                                        <form class="" action="process_delete.php" method="post" >
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
                            <form method="post" action="process_create.php" enctype="multipart/form-data">
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
                                  <input type="file" name="banner_image" class="form-control-file" >
                                  <!-- <input type="text" class="form-control" name="img_url" id="img_url" placeholder="yamaha grand"> -->
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
                <?php include_once("partials/admin_footer.html")?>
            </div>
        </div>
        <?php require_once("partials/admin_js_scripts.html");?>
    </body>
</html>
