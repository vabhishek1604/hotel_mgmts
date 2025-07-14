<?php

use app\assets\AppAsset;
use app\models\Company;
use app\models\Users;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php
$user = Users::findOne(Yii::$app->user->id);
$comp_name = Company::getCompanyData('company_name');
$comp_logo = Company::getCompanyData('company_logo');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= isset($this->title) ? Html::encode($this->title) : 'Ramuji Water Park' ?></title>


        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   
        <?php // $this->head() ?>
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/veneto-admin.min.css">
     <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/custom.css">
           <!--<link rel="stylesheet" href="<?php // echo Yii::$app->request->baseUrl; ?>/web/demo/css/demo.css">-->
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/font-awesome/css/font-awesome.css">

        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css"/>
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/plugins/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/plugins/morris.min.css">
        <link href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/tab.css" rel="stylesheet" type="text/css"/>

        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/bootstrap-datetimepicker.min.css" />-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/nifty-component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/loader.css" />

        <link type="image/x-icon" href="<?php echo Yii::$app->request->baseUrl; ?>/web/favicon.ico" rel="shortcut icon" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
            <link href="<?php echo Yii::$app->request->baseUrl; ?>/dist/css/animate.css" rel="stylesheet" type="text/css"/>

        <!--[if lt IE 9]>
                    <script src="js/html5shiv.js"></script>
                    <script src="js/respond.min.js"></script>
                <![endif]-->
        
            <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/bs3/js/bootstrap.min.js"></script>
       <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/JsBarcode.all.min.js"></script>
     
     <script src="<?php echo Yii::$app->request->baseUrl; ?>/dist/js/bootbox.min.js" type="text/javascript"></script>
     <script src="<?php echo Yii::$app->request->baseUrl; ?>/dist/js/selfalert.js" type="text/javascript"></script>
    </head>
    <body class="">
        <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                    <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>
                    <a class="navbar-brand hidden-xxs" href="#">
                        <span class="sc-visible">                            
                           <?php if(!empty($comp_name)){ echo strtoupper($comp_name); }?>
                        </span>
                        <span class="sc-hidden">
                            <span class="bold"><?php if(!empty($comp_name)){ echo $comp_name;}else{ echo 'SUPERADMIN';}?></span>
                            
                        </span>
                    </a>
                </div>
                <?php //echo $this->render('_top_right_menu', array('user' => $user)) ?>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                   
                        <li class="dropdown" style="margin-right: 25px;">
                            <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                                <span class="hidden-xs"><?php echo strtoupper(Users::getUsername()) . " (" . strtoupper(Users::getRole()) . ")"; ?></span>
                            </a>

                            <ul class="dropdown-menu pull-right-xs">
                                <!-- User image -->
                                <li class="arrow"></li>
                                <li>  Last Login  </li>
                                <li><?php echo date('d-m-Y h:i:s'); ?></li>
                                <li>   <a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>">Sign out</a> </li>
                            </ul>
                        </li>
                </ul>
            </nav>
        </header>
        <div class="page-wrapper">
              <?php
            if (!empty($user)) {
                echo $this->render('_sidemenu', array('user' => $user, 'params' => $this->params['menu'],'comp_name'=>$comp_name,'comp_logo'=>$comp_logo));
            }
            ?>
            <?php // echo $this->render('_sidemenu', array('user' => $user,'params'=>$this->params['breadcrumbs'])) ?>
            <div class="page-content">
                <div class="page-subheading page-subheading-md">
                    <?=
                    Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => Yii::t('yii', 'Home'),
                            'url' => Yii::$app->homeUrl,
                        ],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                </div>	
                <div class="container-fluid-md">				
                    <?php $this->render('/shared/_messages') ?>
                    <?= $content; ?>
                </div>
            </div>
        </div>

<!--    
-->        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/jquery-navgoco/jquery.navgoco.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/js/main.js"></script>

        <!--
        <script src="dist/assets/plugins/flot/excanvas.min.js"></script>
        <![endif]
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/demo/js/demo.js"></script>

        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/jquery-jvectormap/maps/world_mill_en.js"></script>-->

        <!--[if gte IE 9]>>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/rickshaw/js/vendor/d3.v3.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/rickshaw/rickshaw.min.js"></script>
        <! [endif]-->

<!--      <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/demo/js/dashboard.js"></script>-->
     


<!--<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/popper.min.js"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/modernizr.custom.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/classie.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/modalEffects.js"></script>-->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->
<!-- <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/scripts.js"></script>-->

        <?php $this->endBody() ?> 
    </body>

</html>


<?php $this->endPage() ?>