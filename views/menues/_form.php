<?php

use app\models\Menues;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Menues */
/* @var $form ActiveForm */
?>

<div class="menues-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_level')->dropDownList([ '1' => '1', '2' => '2', '3' => '3', '4' => '4']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_parent')->dropDownList(ArrayHelper::map(Menues::find()->where(['menu_status'=>1])->asArray()->all(), 'menu_id', 'menu_title'), ['prompt' => '--Select Parent Menu--']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_order')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_linktype')->dropDownList([ 'fixed' => 'Fixed', 'editable' => 'Editable']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'menu_pageurl')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'menu_pos')->hiddenInput(['maxlength' => true, 'value'=>'top'])->label(false) ?>
        </div>
</div>

    <div class="row">
        <div class="col-lg-4">
            <?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
