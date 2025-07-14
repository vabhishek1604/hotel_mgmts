<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'type')->dropDownList([ 'Government' => 'Government', 'Educational' => 'Educational', 'Residencial' => 'Residencial',], ['prompt' => 'Select']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'desc')->textInput(['maxlength' => true,'placeholder'=> 'Description']) ?>
            <?php // $form->field($model, 'isactive')->textInput() ?>
        </div>
        <div class="col-lg-4" style="margin-top: 25px;">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
