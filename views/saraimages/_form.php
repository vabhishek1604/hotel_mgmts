<?php

use app\models\Saraimages;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Saraimages */
/* @var $form ActiveForm */
?>

<div class="saraimages-form">
    
    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'placeholder' => 'Add Image Title']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'description')->textarea(['rows' => 2, 'placeholder' => 'Add Image Description']) ?>
    </div>   
    <div class="col-lg-3">
    <?= $form->field($model, 'image')->fileInput(['rows' => 2]) ?>
    </div>
    <div class="col-lg-3" style="margin-top: 22px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
