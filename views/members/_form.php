<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'mem_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter your name']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'mem_username')->textInput(['maxlength' => true, 'placeholder' => 'Enter username',]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'mem_email')->textInput(['maxlength' => true, 'placeholder' => 'Enter your email', 'type' => 'email']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'mem_password')->textInput(['maxlength' => true, 'type' => 'password']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('  Save', ['class' => 'btn btn-success fa fa-save']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>