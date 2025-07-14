<?php

use app\models\Company;
use app\models\Slider;
use yii\helpers\Html;

//AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wp.shahinator.com/html/prashad/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 May 2020 06:53:33 GMT -->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="" />
    <!-- Custom Css-->
    <meta property="og:title" content="<?= $this->title ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site Title -->
    <title><?= $this->title ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon"
        href="<?php echo Yii::$app->request->baseUrl . Company::getCompanyData('company_favicon'); ?>"
        type="image/x-icon">


    <!-- All CSS -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo Yii::$app->request->baseUrl; ?>/web/assets/css/floating-wpp.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/nice-select.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/slick.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/meanmenu.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/style.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/website/responsive.css">
</head>

<body>
    <script type="text/javascript">
    base_url = '<?php echo Yii::$app->urlManager->createUrl("/"); ?>';
    img_url = '<?php echo Yii::$app->request->baseUrl; ?>';
    </script>
    <!--[if lte IE 9]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->


    <!--********************************
          ***** Code Start From Here *****
          ******************************** -->


    <!-- preloader -->
    <div class="preloader"></div>


    <!-- Scroll To Top Button -->
    <button class="scrollToTop"><i class="fas fa-arrow-up"></i></button>


    <!-- Header top -->
    <div class="header-top-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <!-- header top text -->
                    <div class="header-top-text d-none d-md-block wow fadeInLeft" data-wow-delay="0.3s">
                        <p>Welcome to <?php echo Company::getCompanyData('company_name'); ?> Group</p>
                    </div>
                    <!-- header top text end -->
                </div>

                <div class="col-md-8 col-lg-9">
                    <!-- header top right -->
                    <div class="header-top-right text-center text-sm-right">
                        <!-- Header top contact -->
                        <ul class="header-top-contact wow fadeIn" data-wow-delay="0.3s">
                            <li><a href="tel:+919300221111"><i class="fas fa-phone-alt"></i>+91-9300221111</a>
                            </li>
                            <li><a href="mailto:<?php echo Company::getCompanyData('official_email_id'); ?>"><i
                                        class="far fa-envelope"></i><?php echo Company::getCompanyData('official_email_id'); ?></a>
                            </li>
                        </ul>
                        <!-- header top social -->

                        <ul class="header-top-social wow fadeIn">
                            <li><a href="<?php echo Company::getCompanyData('company_facebook'); ?>" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo Company::getCompanyData('company_linkedin'); ?>" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>

                        </ul>
                        <!-- Header top links -->
                        <!--                            <ul class="header-top-links wow fadeInRight" data-wow-delay="0.3s">
                                <li><a href="<?php // Yii::$app->urlManager->createUrl(["admin"]); ?>">Sign In</a></li>
                                <li><a href="sign-up.html">Sign Up</a></li>
                            </ul>-->
                    </div>
                    <!-- header top right -->
                </div>


            </div>
        </div>
    </div>
    <!-- Header top end -->

    <!-- Header Area -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-xl-3 wow fadeInLeft" data-wow-delay="0.3s">
                    <!-- Header Logo -->
                    <div class="header-logo">
                        <a href="<?= Yii::$app->urlManager->createUrl(["web/index"]); ?>"><img
                                src="<?php echo Yii::$app->request->baseUrl . Company::getCompanyData('company_logo'); ?>"
                                class="img-fluid" alt="Prashad"></a>
                    </div>
                    <!-- Header Logo end -->
                </div>
                <div class="col-lg-10 col-xl-9 position-static">
                    <!-- main menu area -->
                    <nav class="main-menu-area text-right mobile-menu-active">
                        <ul class="main-menu">
                            <?php
                                $menues = app\models\Menues::find()->where(['menu_status' => 1, 'menu_parent' => 0])->orderBy(['menu_order' => SORT_ASC])->all();
                                foreach ($menues as $menu) {
                                    if ($menu->menu_pageurl == '#') {
                                        $sub_menues = app\models\Menues::find()->where(['menu_status' => 1, 'menu_parent' => $menu->menu_id])->orderBy(['menu_order' => SORT_ASC])->all();
                                        ?>
                            <li><a href="#"><?= $menu->menu_title; ?></a>
                                <ul class="sub-menu">
                                    <?php foreach ($sub_menues as $sub_menu) { ?>
                                    <li><a
                                            href="<?= Yii::$app->urlManager->createUrl(["$sub_menu->menu_pageurl"]); ?>"><?= $sub_menu->menu_title; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } else { ?>
                            <li><a
                                    href="<?= Yii::$app->urlManager->createUrl(["$menu->menu_pageurl"]); ?>"><?= $menu->menu_title; ?></a>
                            </li>
                            <?php }} ?>
                            <!--<li><a href="submit-property.html" class="property-btn">Submit Property</a></li>-->
                        </ul>
                    </nav>
                    <!-- main menu area end -->
                    <!-- Mobile Menu Container -->
                    <div class="mobile-menu-container"><span class="sr-only">Mobile Menu Will Add Here.</span></div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area end -->

    <?php $this->render('/shared/_messages') ?>
    <?= $content; ?>


    <!-- Footer Area -->
    <footer>

        <!-- footer top -->
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10  wow fadeInUp" data-wow-delay="0.3s">
                        <div class="footer-top-area">
                            <form action="#"
                                class="footer-top-form d-lg-flex align-items-center justify-content-center">
                                <h4>Subscribe Our Newsletter</h4>
                                <input type="text" placeholder="Enter Your Email">
                                <button type="submit">Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer top end -->

        <!-- footer Wid area -->
        <div class="footer-wid-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-5  wow fadeInLeft" data-wow-delay="0.3s">
                        <!-- single footer wid -->
                        <div class="single-footer-wid footer-about">
                            <a href="index-2.html"><img style="height:40px;"
                                    src="<?php echo Yii::$app->request->baseUrl . Company::getCompanyData('company_logo'); ?>"
                                    alt="Footer Logo" class="img-fluid"></a>
                            <p
                                style="text-align: justify; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 400;">
                                DNG Group is a well-established and reputable brand in the Real Estate
                                Sector with a rich history of providing exceptional services to its customers over the
                                past 21 years. The group has a significant presence in the Real Estate Sector in CENTRAL
                                INDIA and is dedicated to offering affordable housing solutions to a wide range of
                                customers.</p>
                            <p>For More About Project Call - <a href="tel:+919300221111">Mr. Manish
                                    Agarwal</a> Our Additional General Manager & For More About DNG
                                Group Call - <a href="+919893974467">Mr. Atul Chaudhary </a>Our General Manager.</p>

                            <a href="tel:+919300221111" class="def-btn"><i
                                    class="fas fa-phone-alt"></i>+91-9300221111</a>

                        </div>
                        <!-- single footer wid end -->
                    </div>

                    <div class="col-4 col-md-4 col-lg-4 col-xl-2 offset-md-1 offset-lg-1 offset-xl-0  wow fadeIn"
                        data-wow-delay="0.3s" style="margin-left:256px; margin-top: 75px;">
                        <!-- single footer wid -->
                        <div class="single-footer-wid">
                            <h4>Navigation</h4>
                            <ul class="footer-links">
                                <?php
                                    foreach ($menues as $menu) {
                                        ?>
                                <li><a
                                        href="<?= Yii::$app->urlManager->createUrl(["$menu->menu_pageurl"]); ?>"><?= $menu->menu_title; ?></a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <!-- single footer wid end -->
                    </div>

                    <div class="col-6 col-md-4 col-lg-5 col-xl-2 offset-md-2 offset-lg-3 offset-xl-0  wow fadeInRight"
                        data-wow-delay="0.3s" style="margin-left:26px; margin-top: 75px;">
                        <!-- single footer wid -->
                        <div class="single-footer-wid">
                            <h4>Property</h4>
                            <ul class="footer-links">
                                <li><a
                                        href="<?= Yii::$app->urlManager->createUrl(["projects/government-projects"]); ?>">Government
                                        Projects</a></li>
                            </ul>
                            <ul class="footer-links">
                                <li><a
                                        href="<?= Yii::$app->urlManager->createUrl(["projects/construction-projects"]); ?>">Construction
                                        Projects</a></li>
                            </ul>
                            <ul class="footer-links">
                                <li><a
                                        href="<?= Yii::$app->urlManager->createUrl(["projects/residential-projects"]); ?>">Residential
                                        Projects</a></li>
                            </ul>
                            <ul class="address-links">
                                <li><i class="fas fa-phone-alt" style="color:#ec3323; margin-right: 8px;"></i><a
                                        href="tel:+919893974467" style="color:white;text-align: justify;">Mr.
                                        Atul
                                        Chaudhary <span style="margin-left: 24px;">(G.M)</span></a></li>
                                <li><i class="fas fa-phone-alt" style="color:#ec3323; margin-right: 8px;"></i><a
                                        href="tel:+919300221111 " style="color:white;">Mr. Manish Agrawal <span
                                            style="margin-left: 24px;">(A.G.M)</span> </a></li>
                            </ul>
                            <br>
                            <ul class="footer-social-links">
                                <li><a style="background-color:red;"
                                        href="<?php echo Company::getCompanyData('company_facebook'); ?>"
                                        target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <!--<li><a href="<?php // echo Company::getCompanyData('company_twitter'); ?>"><i class="fab fa-twitter"></i></a></li>-->
                                <li><a style="background-color:red; href="
                                        <?php echo Company::getCompanyData('company_twitter'); ?>" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <!--<li><a href="<?php // echo Company::getCompanyData('company_skype'); ?>"><i class="fab fa-google-plus-g"></i></a></li>-->
                            </ul>
                        </div>

                        <!-- single footer wid end -->
                    </div>

                </div>
            </div>
        </div>
        <!-- footer Wid area end -->

        <!-- Footer Copyright -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12  wow fadeInLeft" data-wow-delay="0.3s">
                        <!-- copyright text -->
                        <div class="copyright-text text-center" align="center">
                            <p><span>&copy; <?php echo Company::getCompanyData('company_name'); ?></span> 2023 Developed
                                by <a href="http://cics.co.in/" target="_blank">CICS</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Copyright end -->
        <div id="myButton"></div>
    </footer>

    <!-- Footer Area end -->
    <!-- Code end -->
    <!-- All JavaScript -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/bootstrap.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery-ui.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/waypoints.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery.nice-select.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/slick.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery.meanmenu.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery.counterup.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/jquery.fancybox.min.js"></script>
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/wow.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <!-- Main Js -->
    <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/website/main.js"></script>

</body>

</html>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/assets/js/floating-wpp.js"></script>
<script type="text/javascript">
$(function() {
    $('#myButton').floatingWhatsApp({
        phone: '919300221111',
        popupMessage: 'Hello, how can we help you?',
        message: "I'm looking to buy a property...",
        showPopup: true,
        showOnIE: false,
        position: 'right',
        autoOpen: true,
        autoOpenTimer: 7000,
        headerTitle: 'Welcome to DNG Builders!',
        headerColor: '#ec3323',
        buttonImage: '<img src="<?php echo Yii::$app->request->baseUrl; ?>/web/images/whatsapp-icon.png" />'
    });
});
</script>