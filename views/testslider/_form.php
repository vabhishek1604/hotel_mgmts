<?php

use app\models\Testslider;
use kartik\widgets\DatePicker;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Testslider */
/* @var $form ActiveForm */
?>

<div class="testslider-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
    <div class="col-lg-3">
  <?= $form->field($model, 'slid_title')->textInput(['maxlength' => true, 'placeholder' => 'Add Slide Title']) ?>
    </div>
    <div class="col-lg-9">
    <?= $form->field($model, 'slid_desc')->textarea(['maxlength' => true, 'placeholder' => 'Add Description']) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <?= $form->field($model, 'slid_url')->textInput(['maxlength' => true, 'placeholder' => 'Add Slide URL']) ?>
    </div>
    <div class="col-lg-3">
    <?= $form->field($model, 'slid_addedby')->dropDownList(['placeholder' => 'Select']) ?>
    </div>
    <div class="col-lg-3">
    <?php 
                echo $form->field($model, 'slid_entrydt')->widget(DatePicker::className(),[
                                'options' => ['value' => isset($model->slid_entrydt) ? date('d-m-Y', strtotime($model->slid_entrydt)) : date('d-m-Y'), 'placeholder' => 'dd-mm-yyyy', 'autocomplete' => 'off'],
                                'pluginOptions' => [
                                    'format' => 'dd-mm-yyyy',
                                    'autoclose' => true,
                                    'readOnly' => true,
                                    'todayHighlight' => true
                                ]
                            ]);
                ?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-3">
    <?= $form->field($model, 'slide_image')->fileInput(['placeholder' => 'Select Image']) ?>
    </div>
    <div class="col-lg-3" style="margin-top: 15px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
