<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">
    <div class="row">
        <div class="col-lg-3">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <?= $form->field($model, 'first_name') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'contact_no') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email_id') ?>
        </div>


        <div class="form-group" style="margin-top: 22px;">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>