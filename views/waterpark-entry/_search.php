<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WaterparkEntrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waterpark-entry-search">
    <div class="row">
        <div class="col-lg-4" style="margin: 22px;">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($model, 'w_mobile') ?>
        </div>

        <div class="form-group" style="margin-top: 45px;">
            <?= Html::submitButton('', ['class' => 'btn btn-primary fa fa-search']) ?>
            <?= Html::resetButton('', ['class' => 'btn btn-default fa fa-refresh']) ?>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                Create Waterpark Entry
            </button>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>