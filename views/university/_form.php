<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'u_name')->dropDownList(['RGPV Bhopal' => 'RGPV Bhopal',], ['prompt' => '']) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'u_branch')->dropDownList(['ECE' => 'ECE', 'EEE' => 'EEE', 'IT' => 'IT', 'CSE' => 'CSE', 'MECH' => 'MECH',], ['prompt' => '']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'st_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'st_mobile')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'st_image')->fileInput(['type' => 'file', 'class' => 'form-control file-loading']) ?>

        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'st_dob')->textInput(['maxlength' => true, 'type' => 'date']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'st_address')->textInput(['rows' => 4]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'branch_desc')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'style' => 'background-color:#149314; ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>