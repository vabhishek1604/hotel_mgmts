<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title>Ramuji Water  Park Jabalpur | Water Park Jabalpur | Waterpark in Jabalpur</title>
        <?php //$this->head()  ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/bootstrap.min.css" />-->
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.html">
        <!-- ===== Google Fonts ===== -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans" rel="stylesheet">
        <!-- ===== CSS links ===== -->
        <link href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/responsive.css" rel="stylesheet" type="text/css"/>
        <!--[if lt IE 9]>
                    <script src="js/html5shiv.js"></script>
                    <script src="js/respond.min.js"></script>
                <![endif]-->
    </head>

    <body class="boxed_wrapper">
        <?php $this->beginBody(); ?>

        <!-- .preloader -->
        <div class="preloader"></div>
        <!-- /.preloader -->
        <!-- menu-area -->
        <header class="main-header">
            <!-- header upper -->
            <div class="header-top">
                <div class="container-fluid">
                    <ul class="top-left float_left in_block">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>Open Hours:  Mon - Sat  09.00 AM - 06.00 PM</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us:   0761-4923808</li>
                    </ul>
                    <ul class="social float_right in_block">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/member']) ?>" class="btn btn-warning btn-sm" style="color:#151219"><i class="fa fa-plus-circle"></i> <b>JOIN</b></a></li>                        
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/ticket']) ?>" class="btn btn-warning btn-sm" style="color:#151219"><i class="fa fa-ticket"></i> <b>GET TICKET</b></a></li>                        
                    </ul>         
                </div>
            </div><!-- end header upper -->

        </header>
        <!-- end menu-area -->
             <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/bootstrap.min.js"></script>
   

        <?php $this->render('/shared/_messages') ?>
        <?= $content; ?>



        <!-- main-footer -->
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                        <div class="footer-widget logo-widget">
                            <div class="footer-logo">
                                <a href="index-2.html"><figure><img src="<?php echo Yii::$app->request->baseUrl; ?>/web/images/footer-logo.png" alt=""></figure></a>
                            </div>
                            <div class="text font_14">
                                Ramuji Waterpark Pvt. Ltd is a company registered under the Indian Companies Act, 1956, having its registered office. 2nd Floor Rupali Chamber, Medicine Complex, Model Road, Jabalpur. Ramuji Waterpark is associated with Kabir Farms & Developers. Ramuji Waterpark Pvt.Ltd is known as The Pride of Mahakaushal and is an excellent water recreation paradise which is appealing to people belonging to all age groups.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 col-md-offset-1 footer-column">
                        <div class="service-widget footer-widget">
                            <div class="footer-title"><h3>Social Link</h3></div>
                            <ul class="list">
                                <li><a target="_blank" href="https://www.facebook.com/RamujiWaterPark/">Facebook</a></li>
                                <li><a target="_blank" href="https://twitter.com/ramujiwaterpark">Twitter</a></li>
                                   <li><a target="_blank" href="https://www.instagram.com/ramuji_wp/">Instagram</a></li>
                             
                                <li><a href="#">Youtube</a></li>
                                <li><a href="#">Google Plus</a></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 footer-column">
                        <div class="link-widget footer-widget">
                            <div class="footer-title"><h3>Quick Link</h3></div>
                            <ul class="list">
                                <li><a href="<?= Yii::$app->urlManager->createUrl(['/member']) ?>">Join</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-column">
                        <div class="contact-widget footer-widget">
                            <div class="footer-title"><h3>Contact</h3></div>
                            <div class="contact-box">
                                <div class="single-box">
                                    <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                                    <div class="text">Home Science College Road, Near Madan Mahal Police Station, 
                                        Napier Town, Jabalpur</div>
                                </div>
                                <div class="single-box">
                                    <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                                    <div class="text">Samdariya Vihar, Old Sheela Talkies
                                        South Civil Line, Jabalpur</div>
                                </div>
                                <div class="single-box">
                                    <div class="icon-box"><i class="fa fa-phone"></i></div>
                                    <div class="text">0761-4923808</div>
                                </div>
                                <div class="single-box">
                                    <div class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="text">info@ramujipark.com</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


        <!-- footer-bottom -->
        <section class="footer-bottom">
            <div class="conteiner">
                <div class="copyright font_14"><a href="#">Ramuji Waterpark Pvt.Ltd.</a> &COPY; All Rights Reserved. Design & Developed by <a href="http://cics.co.in/" target="_blank">CICS</a></div>
                <ul class="footer-social in_block">
                    <li><a target="_blank" href="https://www.facebook.com/RamujiWaterPark/"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/ramujiwaterpark"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </section>
        <!-- footer-bottom end -->




        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>


        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/owl.carousel.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/wow.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/isotope.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/validation.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/SmoothScroll.js"></script>
        <script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jQuery.style.switcher.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/html5lightbox/html5lightbox.js"></script> 
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>-->
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/gmaps.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/map-helper.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/bxslider.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/script.js"></script>
        <?php $this->endBody() ?> 
    </body>

</html>
<?php $this->endPage() ?>