<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mem_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
