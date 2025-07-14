<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestsliderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testslider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row">
    <div class="col-lg-2">
    <?= $form->field($model, 'slid_title')->textInput(['maxlength' => true, 'placeholder' => 'Search by Title'])?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'slid_desc')->textInput(['maxlength' => true, 'placeholder' => 'Search by Desc'])?>
    </div>
    <div class="col-lg-2">    
    <?= $form->field($model, 'slid_url')->textInput(['maxlength' => true, 'placeholder' => 'Search by URL'])?>
    </div>
    <div class="col-lg-2">
    <?= $form->field($model, 'slid_addedby')->textInput(['maxlength' => true, 'placeholder' => 'Search by Added'])?>
    </div>
    <?php // echo $form->field($model, 'slid_entrydt') ?>

    <?php // echo $form->field($model, 'slid_isactive') ?>
    <div class="col-lg-4" style="margin-top: 22px;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        <?= Html::a('Create Test Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
