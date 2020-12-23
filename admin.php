<?php
require_once("conn.php");
require_once("functions.php");
require_once('session.php');
require_once("env.php");
confirmLogin();

$pdo = connectDB('piano_shop', $user, $password);

$pianos_data = dataDashboardPiano($pdo);
$brands = getBrands($pdo);

 ?>
 <?php require_once("partials/admin_head.html");?>
    <body class="sb-nav-fixed">
    <?php require_once("partials/admin_nav.html");?>
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
