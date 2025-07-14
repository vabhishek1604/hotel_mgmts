<?php

use app\models\Booking;
use kartik\widgets\DatePicker;
use yii\helpers\Html;
use yii\web\View;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;



/* @var $this View */
/* @var $model Booking */

$this->title = 'Create Booking';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][1] = 'dashboard';
$this->params['breadcrumbs'][2] = 'dashboard_dashboard';
