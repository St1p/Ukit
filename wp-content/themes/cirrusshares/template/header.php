
<?php $logo = get_posts(array( "category" => 8 )); ?>


<header class="header-navigation">
  
    <div class="container hedrer-wrap">
        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6">

                <div class="logo">
                    <a href="/">
                        <?php    echo get_the_post_thumbnail($logo[0]);?>
                  <!--  <img src="<?php /*bloginfo('template_directory'); */?>/img/logo.png" alt="logo">-->
                    </a>
                </div>

                <div class="logo-message">

                    <p>Aircraft Timeshares & Management</p>

                </div>

            </div>


            <div class="col-xs-12 col-sm-6 col-md-6">

                <div class="menu-container">

                    <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>

                </div>

            </div>




        </div>
    </div>

</header>