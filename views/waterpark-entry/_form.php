<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\WaterparkEntry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waterpark-entry-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'w_name')->textInput(['maxlength' => true, 'placeholde' => 'Enter your name']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'w_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Enter your mobile number']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'w_email')->textInput(['maxlength' => true, 'placeholder' => 'Enter your email']) ?>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4">
            <?= $form->field($model, 'w_password')->textInput(['maxlength' => 10, 'placeholder' => 'Enter your password', 'type' => 'password']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'w_gender')->dropDownList(['Select' => 'Select', 'Male' =>  'Male', 'Female' => 'Female',]) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'w_date')->textInput(['type' => 'date']) ?>

        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'background-color:#149314; margin-left:18px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>