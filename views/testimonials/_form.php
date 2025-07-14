<?php

use app\models\Testimonials;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Testimonials */
/* @var $form ActiveForm */
?>

<div class="testimonials-form">
    
    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'title')->textInput(['rows' => 2 , 'maxlength' => true, 'placeholder' => 'Add Testimonial Name']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'content')->textarea(['rows' => 2 , 'placeholder' => 'Add Content']) ?>
    </div>   
    <div class="col-lg-3" style="margin-top: 5px;">
    <?= $form->field($model, 'image')->fileInput(['rows' => 2]) ?>
    </div>
    <div class="col-lg-3" style="margin-top: 22px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
