<?php
/*
Template Name: terms-of-use
*/
?>


<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<title>Cirrusshares-Terms-of-Use</title>
</head>
<?php $term = get_post(112); ?>


<body>

<?php include("template/header.php")?>


<div class="terms_of_use-wrap">
    <div class="container">
        <div class="row">

            <h1><?php echo $term->post_title; ?></h1>

            <?php echo $term->post_content; ?>
            <!--<div class="terms_of_use-block">
                <h1>term of use</h1>
                <p>This website and the content contained within it are owned by Ascension or its partners. Your use of the website 
                    is expressly governed by the terms and conditions stated below (the "Terms of Use"). By using this website, 
                    you are agreeing to be bound, without limitation or qualification, by the Terms of Use. If you do not agree with 
                    or want to be bound by these Terms, you should not use this website. Remember, any use of this website means that
                    you are expressly agreeing to the Terms of Use.</p>
                <p>Updating the Terms of Use. This website may be updated at any time and without advance notice. Each
                    time that you return to this website, you must re-review the Terms of Use to make sure that the
                    Terms are still acceptable to you. Your failure to return to this part of the website and re-review
                    the Terms of Use is not an acceptable excuse for claiming that you are not bound by such new
                    Terms.</p>
                <p>Personal Use of Web Site. You are authorized to use this website for lawful purposes only. You are
                    authorized to view and download (when available) single copies of materials on the website solely
                    for your personal use, but not for commercial purposes. You are not authorized, without the prior
                    written consent of Ascension to modify, copy, download redistribute, retransmit, display, reproduce,
                    publish, or sell any information, text, graphics, pictures, software products or services that this
                    website may display or otherwise contain. You also expressly agree that you shall not, without the
                    prior written consent of Ascension, create a link from any other website to this website, nor
                    otherwise affiliate you nor any other business, directly or indirectly, by inference with this
                    website. All materials contained in this website are considered copyrighted materials by either
                    Ascension or, in certain circumstances, by other third parties when so indicated, and the materials
                    are covered by copyright laws of the United States of America, various state laws and the laws of
                    other countries. The trademarks, logos and service marks (the "Marks") displayed upon the website
                    are owned by Ascension or third parties. You are prohibited from use of these Marks without the
                    express written permission of Ascension or the third party owner.</p>
                <p>Ascension Disclaimer of Liability. Ascension makes no representations about the accuracy,
                    reliability, the completeness or timeliness of anything contained on the website or about the
                    specific results to be obtained from using the website, nor any of the content or materials that can
                    be downloaded from the website. This website may contain typographical errors or inaccuracies for
                    which Ascension shall have no liability. Any use of or reliance on the website, any downloaded
                    materials, or statements contained in the website are being done at your own risk. This website may
                    contain certain specifications, representations, colors, list of equipment, use of materials and
                    model references, which are not warranted or guaranteed to be true or accurate.</p>
                <p>Link to Other Web Sites. This website may contain links to other web sites. Ascension makes no
                    representations, warrantees or other claims, and shall not be held liable for the content of such
                    web sites. Those web sites shall be governed by their own terms and conditions and privacy
                    statements.</p>
                <p>PRIVACY POLICY</p>
                <p>This website is provided solely for information purposes and is not warranted or guaranteed in any
                    way. By using this website, you are agreeing to the following terms and conditions. Please note that
                    the terms and conditions are subject to change at any time; we encourage you to check back
                    frequently for changes, updates and alterations.</p>
                <p>Terms and Conditions</p>
                <p>Your Privacy Is Important to Us The information you provide to us – including your name, email
                    address, phone number and such information as the type of airplane you own – will not be shared with
                    any third party. We use the information you provide only to help us know how to serve you
                    better.</p>
                <p>User Restrictions</p>
                <p>By using, accessing and/or downloading the information contained in this website, you acknowledge you
                    will not store, reproduce or otherwise make use of information in any manner that is in violation of
                    any federal, state or local laws or regulations, including any copyright, secrecy, defamation,
                    decency or export la</p>
                <p>You are authorized to view, download and print any information on the website, solely for your
                    own personal and noncommercial use, subject to all copyright, trademark and other proprietary
                    notices. Any other use of materials on this website, including: (1) reproduction, except as authorized
                    herein; (2) modifications; (3) distributions; (4) republication; (5) transmission; (6) re-transmission;
                    (7) or public showing, without the prior written permission of Ascension, is strictly prohibited.</p>
                <p>To obtain permission to reuse or republish electronically (or to download or otherwise copy) any material
                    copyrighted by Ascension, or if you believe that your copyright has been infringed, please contact Ascension.</p>

            </div>-->

        </div>
    </div>
</div>

<?php include("template/footer.php")?>
</body>
</html>