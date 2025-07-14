<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MembersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">
    <div class="row">
        <div class="col-lg-4">

            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'mem_name') ?>
        </div>

        <div class="form-group" style="margin-top: 22px;">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"> Create
                New Member </button>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>