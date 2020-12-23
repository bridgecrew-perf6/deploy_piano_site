<?php
require_once('partials/head.php')
 ?>
<title>sFp Pianos</title>
</head>
<body>
  <?php require_once('partials/top_nav.php');?>
  <header class="container-fluid  align-items-center justify-content-center">
    <div class="row">
      <div class="col-12 mt-5">
        <h1 class="text-center text-white pb-5 heading hero-heading">Find the piano of your dreams</h1>
      </div>
      <!-- <div class="col-12 text-center">
        <div class="">
          <a href="" name="button" class="d-block h3 mb-5 hero-cta">Learn More</a>
        </div>
      </div> -->
    </div>
    <div class="row">
      <!-- <div class="col-12 mt-5">
        <h1 class="text-center text-white pb-5 heading hero-heading">Find the piano of your dreams</h1>
      </div> -->
      <div class="col-4 offset-4 text-center">
          <a href="" name="cta" class="d-block h3 mb-5 hero-cta">Learn More</a>
      </div>
    </div>
  </header>
  <main>
    <section id="about" class="container-fluid d-flex align-items-center justify-content-center about">
      <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
          <h2 class="text-white text-center d-5">A company you can trust </h2>
          <p class="text-white  copy-text">Choosing a piano is not an easy task.
            Since 1934 we have been helping our customers choose the right instrument to meet their needs.
          </p>
          <p class="text-white  copy-text d-none d-md-block">In our showroom, you can experiment with pianos from the best brands and be informed about your new partner on this journey. So do not hesitate and make an appointment, contact us and be happy!</p>
          <!-- <p class="text-white copy-text">We also collaborate with our community sponsoring
          students in our academy ..</p> -->
          <a href="" class="btn btn-info d-block d-md-inline mt-2">learn more about us</a>
          <!-- <a href="" class="btn btn-info">Learn more</a> -->
          <a href="" class="btn btn-success text-light d-block d-md-inline mt-2 mb-5">Contact us!</a>
        </div>
      </div>
    </section>
  </main>
  <?php require_once('partials/footer.php');?>
  <?php include_once("partials/modal_contact.html") ?>
  <?php require_once('partials/js_scripts.php');?>
</body>
</html>
