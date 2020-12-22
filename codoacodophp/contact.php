<?php
if(isset($_POST)) {
  if(!empty($_POST)){
    $to = "joeluniversidades@gmail.com";
    $subject = "piano contact";
    $from = $_POST['email'];
    $msg = $_POST['text'];
    $headers =  "From: $from \r\n" ;
    // 'Reply-To: webmaster@example.com' . "\r\n" .
    // 'X-Mailer: PHP/' . phpversion();
    echo "Sending message!<br>";
    // echo "to = $to,<br> from = $from<br>, msg = $msg<br>";
    // if (
      mail($to, $subject, $msg, $headers);
    // ){
      // echo "Message sent :)<br>";
    // }
    // else {
    //   echo "Message NOt sent :(<br>";
    // }
  }
  else {
    echo "Message not sended";
  }

}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact us</title>
  </head>
  <body>
    <h2>Contact us</h2>
    <form class="" action="contact.php" method="post">
      <label for="email">email</label>
      <input type="email" name="email" id="email"><br>
      <label for="name">name</label>
      <input type="text" name="name" id="name"><br>
      <label for="text">Your message: </label>
      <textarea name="text" rows="8" cols="80"></textarea>
      <input type="submit" name="submit" value="Send">
    </form>

  </body>
</html>
