<?php
/*
Template Name: plane-2
*/
?>

<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Eclipse 550</title>
</head>
<?php $plane_2 = get_post(40); ?>
<?php $plane_2_prise = get_posts(array( "category" => 8 )); ?>

<body>

<?php include("template/header.php")?>

<div class="plane-parameters-block">

    <!--get photo-->
    <?php echo get_the_post_thumbnail($plane_2_prise[0],'style=max-width:100%;height:400px;')?>

    <?php echo $plane_2->post_content; ?>



    <!--eclipse-slider-->
    <?php echo do_shortcode('[cycloneslider id="slider-of-plane-2" ]'); ?>
    <!--end-eclipse-slider-->


    <!--get  prise-->
    <p><?php echo $plane_2_prise[0]->post_content?></p>

</div>

<?php include("template/footer.php")?>
</body>
</html>