<?php
/*
Template Name: plane-3
*/
?>

<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Eclipse 550</title>
</head>
<?php $plane_3 = get_post(143); ?>
<?php $plane_3_prise = get_posts(array( "category" => 9 )); ?>

<body>

<?php include("template/header.php")?>

<div class="plane-parameters-block">

    <!--get photo-->
    <?php echo get_the_post_thumbnail($plane_3_prise[0],'style=max-width:100%;height:400px;')?>

    <?php echo $plane_3->post_content; ?>



    <!--eclipse-slider-->
    <?php echo do_shortcode('[cycloneslider id="slider-of-plane-3" ]'); ?>
    <!--end-eclipse-slider-->


    <!--get  prise-->
    <p><?php echo $plane_3_prise[0]->post_content?></p>

</div>

<?php include("template/footer.php")?>
</body>
</html>