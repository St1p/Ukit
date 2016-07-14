<?php
/*
Template Name: contact
*/
?>


<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Contact</title>
</head>
<?php $contact = get_post(22); ?>

<body>

<?php include("template/header.php")?>



<div class="contact-wrap">
    <div class="container">
        <div class="row">

                <?php echo $contact->post_content; ?>


         <!--       <div class="col-sx-3 col-sm-3 col-md-3">
                
                <div class="contact-content">

                    <p>2007 Flightway Drive</p>
                    <p>Atlanta, GA 30341</p>
                
                </div>

                <div class="contact-content">
                    <p class="decoration">info@ascensionaircraft.com</p>

                </div>
                
                <div class="contact-content">

                    <p>Phone: (404) 991-2362</p>
                    <p>Toll-Free: (888) 99-ASCEND</p>

                </div>

            </div>

            <div class="col-sx-9 col-sm-9 col-md-9">


                    <div class="contact-img">
                        <img src="<?php /*bloginfo('template_directory'); */?>/img/contact-img.jpg" alt="">
                    </div>
            </div>
-->
        </div>

        <div class="row">

            <div class="col-sx-12 col-sm-6 col-md-6">

                <div class="contact-map-block">
                    <?php echo do_shortcode('[huge_it_maps id="1"]'); ?>
                </div>

            </div>

            <div class="col-sx-12 col-sm-6 col-md-6">

                <?php echo do_shortcode('[ninja_forms id=1] '); ?>

            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php")?>
</body>
</html>