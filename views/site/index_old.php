<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = Yii::t('app', 'Admin Dashboard');
$menu_status = "dashboard";
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][1] = $menu_status;
?>

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div id="content-header" class="clearfix">
                <div class="float-left">
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(["site/index"]); ?>">Home</a></li>
                        <li class="active"><span><?= Html::encode($this->title) ?></span></li>
                    </ol>
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["patient/create"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-users"></i>
                    <span class="headline">Patient Registration</span>
                    <span class="value">UHID</span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["patient/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-address-book-o"></i>
                    <span class="headline">Patient Records</span>
                    <span class="value"></span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["patientvisit/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-handshake-o"></i>
                    <span class="headline">Patient Visit</span>
                    <span class="value"></span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["opd/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-stethoscope"></i>
                    <span class="headline">OPD</span>
                    <span class="value"></span>
                </div>
            </a>
        </div>
    </div>
  <div class="row">
      <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["ipd/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-bed"></i>
                    <span class="headline">IPD</span>
                    <span class="value"></span>
                </div>
            </a>
        </div>
      <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["ipd/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-bars"></i>
                    <span class="headline">XRay</span>
                    <span class="value"></span>
                </div>
            </a>
        </div>
      <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["ipd/index"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-heartbeat"></i>
                    <span class="headline">Pathology</span>
                      <span class="value"></span>
                
                </div>
            </a>
        </div>
      <div class="col-lg-3 col-sm-6 col-12">
            <a href="<?= Yii::$app->urlManager->createUrl(["#"]); ?>">
                <div class="main-box infographic-box colored emerald-bg">
                    <i class="fa fa-list"></i>
                    <span class="headline">Reports</span>
                    <span class="value">View</span>
                </div>
            </a>
        </div>
      
        </div>


</div>