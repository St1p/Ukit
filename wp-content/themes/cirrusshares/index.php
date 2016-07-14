<?php
/*
Template Name: main
*/
?>


<!DOCTYPE html>
<html lang="en">
  <?php include("template/head.php")?>
  <title>Cirrusshares-Main</title>
  </head>
  <?php $main = get_post(97);
  ?>

  
  <body>

  <?php include("template/header.php")?>

  <?php include("template/main-slider.php")?>

  <div class="presentation-wrap">
      <div class="container">
          <div class="row">

              <?php $get_main_photo = get_posts(array( "category" => 6 )); ?>

              <div class="col-xs-12 col-sm-4 col-md-4">
                  <a href="/index.php/cirrus-sr22t-gt/ ‎">
                  <div class="presentation-block">
                      <?php echo get_the_post_thumbnail($get_main_photo[0]); ?>
                      <div class="presentation-block"></div>
                      <div class="presentation-block-title">
                          <h2> <?php echo $get_main_photo[0]->post_title; ?></h2>
                          <p><?php echo $get_main_photo[0]->post_content?></p>
                      </div>
                      
                      <!--<a href=""><img src="<?php /*bloginfo('template_directory'); */?>/img/eclipse.jpg" alt=""></a>-->
                  </div>
                  </a>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-4">
                  <a href="index.phpindex.php/cirrus-sr20/ ‎">
                      <div class="presentation-block">
                          <?php echo get_the_post_thumbnail($get_main_photo[1]); ?>
                          <div class="presentation-block"></div>
                          <div class="presentation-block-title">
                              <h2> <?php echo $get_main_photo[1]->post_title; ?></h2>
                              <p><?php echo $get_main_photo[1]->post_content?></p>
                          </div>

                          <!--<a href=""><img src="<?php /*bloginfo('template_directory'); */?>/img/eclipse.jpg" alt=""></a>-->
                      </div>
                  </a>
              </div>

              <div class="col-xs-12 col-sm-4 col-md-4">
                  <a href="index.php/cirrus-sr22t-gt">
                      <div class="presentation-block">
                          <?php echo get_the_post_thumbnail($get_main_photo[2]); ?>
                          <div class="presentation-block"></div>
                          <div class="presentation-block-title">
                              <h2> <?php echo $get_main_photo[2]->post_title; ?></h2>
                              <p><?php echo $get_main_photo[2]->post_content?></p>
                          </div>

                          <!--<a href=""><img src="<?php /*bloginfo('template_directory'); */?>/img/eclipse.jpg" alt=""></a>-->
                      </div>
                  </a>
              </div>

              <!--<div class="col-sx-4 col-sm-4 col-md-4">

                  <div class="presentation-block">
                      <a href=""><img src="<?php /*bloginfo('template_directory'); */?>/img/cirrus.jpg" alt=""></a>
                  </div>
              </div>

              <div class="col-sx-4 col-sm-4 col-md-4">

                  <div class="presentation-block">
                      <a href=""><img src="<?php /*bloginfo('template_directory'); */?>/img/hours.jpg" alt=""></a>
                  </div>
              </div>
-->

              <form action="/index.php/company" method="GET">
                  <input type="text" name="text1" size="20" maxlength="50">
                  <p><input type="submit"></p>
              </form>
          </div>
      </div>
  </div>

    <?php include("template/footer.php")?>
  </body>
</html>