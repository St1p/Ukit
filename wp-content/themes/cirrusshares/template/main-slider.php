<div class="main-slider">
    <?php echo $main->post_content; ?>
  <!--  <div class="wrap-slider"></div>

    <div class="slider-context">
        <h1>Open house</h1>
        <div class="slider-describe">
            <p>Join Ascension Air at Fort Lauderdale Executive Airport (FXE) and view our
                <a class="bold" href="">Eclipse 550</a> and
                <a href="">Cirrus SR22T</a>
            </p>
            <p> <a href="">GTS</a> aircraft, meet our team, and learn more about our incredible new cost-saving programs.

            </p>

        </div>
        <div class="slider-time">
            <p>Thursday, March 31, 2016</p>
            <p>10:00 AM to 6:00 PM</p>
        </div>
        <div class="slider-location">
            <p>Banyan Air Service (FXE) - Hangar 62</p>
            <p>5360 NW 20th Terrace</p>
            <p>Fort Lauderdale, Florida 33309</p>
            <p>Call (888) 99-ASCEND for more information</p>
        </div>
    </div>-->
    <?php echo do_shortcode('[owl-carousel category="main-slider" 
    singleItem="true" lazyEffect="true"
     autoPlay="true" responsive="true" itemsCustom="false" itemTitle="false"]'); ?>

</div>