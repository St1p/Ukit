<?php
/*
Template Name: company
*/
?>


<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Company</title>
<?php $company = get_post(20); ?>
</head>



<body>

<?php include("template/header.php")?>



<div class="company-wrap">
    <div class="container">

        <div class="row">

            <div class="col-sx-9 col-sm-9 col-md-9">
                <h1><?php echo $company->post_title; ?></h1>


                <?php echo $company->post_content; ?>



<!--
               <div class="company-content">


                    <p>Ascension Air is the fastest growing provider of Cirrus SR22T Timeshares and the only company
                        in the U.S. to offer Personally-Flown Jet Timeshares. It is no wonder why so many reputable
                        sources such as Forbes, CNBC, BusinessWeek, and Inc. Magazine, among others, have highlighted
                        Ascension Air for revolutionizing aircraft ownership.
                    </p>

                </div>

                <div class="company-content">

                    <p>Our innovative platforms provide unprecedented availability to a fleet of meticulously maintained
                        aircraft at a price point comparable to that of sole ownership of a substantially older and technologically
                        inferior airplane. But that’s only part of what makes us unique. Our On-Site Concierge Service provided by
                        Ascension Air’s Aircraft Coordinators makes flying more enjoyable and far less stressful. Providing aircraft
                        pre-flight inspections, baggage loading, valet parking, and more, our team creates an experience unlike any other.
                    </p>
                </div>

                <div class="company-content">

                    <p>Operating in Atlanta and South Florida, we are currently expanding into other markets and are well
                        on our way to becoming the number one Personally-Flown Aircraft Timeshare company in the country.
                    </p>

                </div>

                <div class="company-content">

                    <p>
                        For more information on Ascension Aircraft and the other services we provide, please
                        <a href="">click here.</a>
                    </p>

                </div>
-->

            </div>

            <div class="col-sx-3 col-sm-3 col-md-3">


            </div>



        </div>

    </div>
</div>

<?php include("template/footer.php")?>
</body>
</html>