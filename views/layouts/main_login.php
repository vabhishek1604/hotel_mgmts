<?php

use app\models\Company;

//AppAsset::register($this);
$this->title = Company::getCompanyData('company_name');
?>
<?php $this->beginPage() ?>
<!doctype html>
<html class="no-js">

<!-- Mirrored from optimisticdesigns.herokuapp.com/veneto/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 12:13:16 GMT -->

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= $this->title; ?> &middot; Sign In </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!--<link rel="shortcut icon" href="/favicon.ico">-->
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/css/veneto-admin.min.css">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/web/demo/css/demo.css">
    <link rel="stylesheet"
        href="<?php echo Yii::$app->request->baseUrl; ?>/web/dist/assets/font-awesome/css/font-awesome.css">


    <!--[if lt IE 9]>
        <script src="dist/assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="dist/assets/libs/respond/respond.min.js"></script>
        <![endif]-->

</head>

<body class="body-sign-in">
    <?php $this->beginBody() ?>


    <?= $content; ?>


</body>

<!-- Mirrored from optimisticdesigns.herokuapp.com/veneto/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 12:13:16 GMT -->

</html>

<?php $this->endPage() ?>