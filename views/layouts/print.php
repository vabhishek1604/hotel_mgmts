<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= \app\models\Utils::getProjectDetail('project_title'); ?></title>
        <?php $this->head() ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
        <head>
      

<!--        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />-->

        <?php $this->head() ?>
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/veneto-admin.min.css">
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/custom.css">
        <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/demo/css/demo.css">
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
    <body>
        <?php $this->beginBody() ?>
   
        <div style="min-height: 400px">

            <?= $content; ?>
        </div>
  

        <?php $this->endBody() ?>
    </body>
</html>


<?php $this->endPage() ?>