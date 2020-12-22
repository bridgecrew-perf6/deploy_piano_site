<?php
echo "<pre>";
  var_dump($_POST);
echo "</pre>";
// send email
$dest = "joeluniversidades@gmail.com";
$sub = "piano contact";
mail($dest, $sub, $_POST['customerMessage']);
echo "email sent<br>";

 ?>
