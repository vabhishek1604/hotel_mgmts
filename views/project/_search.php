<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'proj_id') ?>

    <?= $form->field($model, 'proj_title') ?>

    <?= $form->field($model, 'proj_slug') ?>

    <?= $form->field($model, 'proj_state') ?>

    <?= $form->field($model, 'proj_city') ?>

    <?php // echo $form->field($model, 'proj_landmark') ?>

    <?php // echo $form->field($model, 'proj_address') ?>

    <?php // echo $form->field($model, 'proj_remark') ?>

    <?php // echo $form->field($model, 'proj_addedby') ?>

    <?php // echo $form->field($model, 'proj_entrydt') ?>

    <?php // echo $form->field($model, 'proj_updated_by') ?>

    <?php // echo $form->field($model, 'proj_updated_at') ?>

    <?php // echo $form->field($model, 'proj_isactive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
