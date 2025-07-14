<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>DSD Budget</title>

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/bootstrap.min.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/nanoscroller.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/web/css/theme_styles.css" />

        <link type="image/x-icon" href="<?php echo Yii::$app->request->baseUrl; ?>/web/favicon.ico" rel="shortcut icon" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
                        <script src="js/html5shiv.js"></script>
                        <script src="js/respond.min.js"></script>
                <![endif]-->
    </head>
    <body id="error-page">
        <?php $this->beginBody() ?>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div id="error-box">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <?= $content; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/popper.min.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/bootstrap.js"></script>
        <script src="<?php echo Yii::$app->request->baseUrl; ?>/web/js/jquery.nanoscroller.min.js"></script>

        <?php $this->endBody() ?> 
    </body>

</html>

<?php $this->endPage() ?>