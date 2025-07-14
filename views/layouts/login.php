<?php

use app\assets\AppAsset;
use app\models\Company;
use yii\helpers\Html;

AppAsset::register($this);
$this->title = Company::getCompanyData('company_name');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?= Html::csrfMetaTags() ?>
        <title><?= isset($this->title) ? Html::encode($this->title) : 'DSD Budget' ?></title>
        <?php $this->head() ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>DSD Budget</title>


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/nanoscroller.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/theme_styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/media.css" />

          <link type="image/x-icon" href="<?php echo Yii::$app->request->baseUrl; ?>/web/favicon.ico" rel="shortcut icon" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
                    <script src="js/html5shiv.js"></script>
                    <script src="js/respond.min.js"></script>
                <![endif]-->
    </head>
    <style>
        #login-box {
            margin: 10px auto 20px;
            max-width: 825px;
        }
        #login-logo{
            padding: 17px 0;
        }
    </style>
    <body class="pace-done theme-whbl">
        <?php $this->beginBody() ?>

       

  <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/popper.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/bootstrap.js"></script>
    
        <?php $this->render('/shared/_messages') ?>
        <?= $content; ?>





          <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.nanoscroller.min.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/scripts.js"></script>

        <?php $this->endBody() ?> 
    </body>

</html>


<?php $this->endPage() ?>