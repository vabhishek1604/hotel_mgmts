<?php

namespace kartik\date;

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\StudentLogin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-login-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'st_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter your name']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'st_username')->textInput(['maxlength' => true, 'placeholder' => 'Enter your userename']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'st_email')->textInput(['maxlength' => true, 'placeholder' => 'Enter your userename', 'type' => 'email']) ?>
        </div>
    </div>
    <div class="row">


        <div class="col-lg-4">
            <?= $form->field($model, 'st_password')->textInput(['maxlength' => true, 'placeholder' => 'Enter your password', 'type' => 'password']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'st_gender')->dropDownList(['Select' => 'Select', 'Male' =>  'Male', 'Female' => 'Female',]) ?>
        </div>


        <div class="col-lg-4">
            <?= $form->field($model, 'st_dob')->textInput(['type' => 'date']) ?>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4">
            <?= $form->field($model, 'st_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Enter your mobile number']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'st_address')->textInput(['maxlength' => true, 'placeholder' => 'Enter your address']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'margin-top:22px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>