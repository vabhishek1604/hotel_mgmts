<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActionmasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actionmaster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'action_type') ?>

    <?= $form->field($model, 'action_id') ?>

    <?= $form->field($model, 'action_name') ?>

    <?php // echo $form->field($model, 'action_url') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'addedby') ?>

    <?php // echo $form->field($model, 'entrydt') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
