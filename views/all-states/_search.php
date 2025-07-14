<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AllStatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="all-states-search">
    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'st_code') ?>
        </div>

        <div class="form-group" style="margin-top: 22px;">
            <?= Html::submitButton('', ['class' => 'btn btn-primary fa fa-search']) ?>
            <?= Html::resetButton('', ['class' => 'btn btn-outline-secondary fa fa-refresh']) ?>
            <?= Html::a('Create All States', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>