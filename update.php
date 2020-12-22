<?php
require_once('conn.php');
require_once('functions.php');
$pdo = connectDB('piano_shop', 'admin', 'admin');
$piano = getPiano($pdo,$_GET['id']);
$brands = getBrands($pdo);
// echo "<pre>".var_dump($piano)."</pre>";
// if(isset($_POST)&& !empty($_POST)) {
//   echo "by POST<br>";
// }
 ?>
 <form method="post" action="process_update.php" enctype="multipart/form-data">
   <input type="hidden" name="piano_id" value="<?=$piano[0]['piano_id'];?>">
   <div class="form-row">
     <div class="form-group">
       <label for="model">Model</label>
       <input type="text" class="form-control" name="model" id="model" value="<?=$piano[0]['model'];?>">
     </div>
     <div class="form-group">
       <label for="name">name</label>
       <input type="text" class="form-control" name="name" id="name" value="<?=$piano[0]['name'];?>">
     </div>
   </div>
   <div class="form-row">
     <div class="form-group">
       <label for="description">description</label>
       <textarea name="description" rows="4" cols="80" id="description" class="form-control">
        <?=$piano[0]['description'];?>
       </textarea>
     </div>
   </div>

   <div class="form-row">
     <div class="form-group">
       <label for="img_url">img url</label>
       <input type="file" name="banner_image" >
       <!-- <input type="text" class="form-control" name="img_url" id="img_url" value="$piano[0]['img_url'];"> -->
     </div>
     <div class="form-group">
       <label for="video_url">video url</label>
       <input type="text" class="form-control" name="video_url" id="video_url" value="<?=$piano[0]['video_url'];?>">
     </div>
   </div>
   <div class="form-row">
     <div class="form-row">
       <div class="form-group">
         <label for="brand">brand</label>
         <select class="form-control" name="brand_id">
           <?php foreach ($brands as $brand) { ?>
             <option value='<?="$brand[brand_id]";?>' >
               <?="$brand[name]";?>
             </option>
           <?php
         }
           ?>
           </select>
       </div>
       <div class="form-group">
         <label for="type_id">type</label>
         <select class="form-control" name="type_id">
           <option value="1">upright</option>
           <option value="2">grand piano</option>
         </select>
       </div>
       </div>

   <div class="form-row">
   <button type="submit" class="btn btn-primary">update piano</button>
 </form>
