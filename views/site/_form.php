<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker

/* @var $this yii\web\View */
/* @var $model app\models\Franchiseopportunity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="franchise-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'dob')->textInput() ?>
        </div>
    </div>   
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'address')->textArea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'pincode')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'whatsapp_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'email_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'edu_qualification')->textArea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'occupation')->textArea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'franchise_location')->textArea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'district_id')->dropDownList(ArrayHelper::map(\app\models\District::find()->asArray()->all(), 'id', 'name'), ['prompt' => '--Select District--']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'ward_no')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'pancard')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'account_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'ifsc_code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'senior_field_exec')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'recomm_comission_percent')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="pull-right" style="margin-right:20px;">
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>