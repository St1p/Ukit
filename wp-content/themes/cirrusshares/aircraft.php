<?php
/*
Template Name: aircraft
*/
?>


<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Aircraft</title>
</head>
<?php $aircraft = get_post(9); ?>

<body>

<?php include("template/header.php")?>



<div class="aircraft-wrap">
    <div class="container">

        <div class="row">

            <div class="aircraft-title">
                <?php echo $aircraft->post_title; ?>
            </div>

            <?php echo $aircraft->post_content; ?>

        

    </div>
</div>

<?php include("template/footer.php")?>
</body>
</html>