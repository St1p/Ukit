<?php
/*
Template Name: locations
*/
?>


<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Location</title>
</head>
<?php $location = get_post(16); ?>


<body>

<?php include("template/header.php")?>


<div class="locations-img">
    <img src="<?php bloginfo('template_directory'); ?>/img/location-img.png" alt="">
</div>

<div class="location-content">
    <div class="container">
        <div class="row">


            <?php echo $location->post_content; ?>
<!--
            <div class="col-sx-12 col-sm-5 col-md-5">

                <div class="location-block">
                    <h1>ATLANTA</h1>
                    <div class="location-content">
                        <p>DeKalb-Peachtree Airport (PDK)</p>
                        <p>2007 Flightway Drive</p>
                        <p>Atlanta, GA 30341</p>
                        <p>Also Serving: RYY, FTY, and LZU</p>
                    </div>
                </div>

            </div>

            <div class="col-sx-12 col-sm-7 col-md-7">

                <div class="location-block">
                    <h1>SOUTH FLORIDA</h1>
                    <div class="location-content">
                        <p>Fort Lauderdale Executive Airport (FXE)</p>
                        <p>5540 NW 21 Terrace</p>
                        <p>Fort Lauderdale,‎ FL‎ 33309</p>
                        <p>Also Serving: BCT, OPF, and PMP</p>
                    </div>
                </div>

            </div>-->
        </div>
    </div>
</div>

<?php include("template/footer.php")?>
</body>
</html>