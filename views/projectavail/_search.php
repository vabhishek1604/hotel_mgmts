<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectAvailabilitiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-availabilities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'avail_id') ?>

    <?= $form->field($model, 'avail_projid') ?>

    <?= $form->field($model, 'avail_title') ?>

    <?= $form->field($model, 'avail_type') ?>

    <?= $form->field($model, 'avail_area_in_sqft') ?>

    <?php // echo $form->field($model, 'avail_qty') ?>

    <?php // echo $form->field($model, 'avail_bedroom') ?>

    <?php // echo $form->field($model, 'avail_bathroom') ?>

    <?php // echo $form->field($model, 'avail_price') ?>

    <?php // echo $form->field($model, 'avail_other_features') ?>

    <?php // echo $form->field($model, 'avail_prop_dec') ?>

    <?php // echo $form->field($model, 'avail_slug') ?>

    <?php // echo $form->field($model, 'avail_addedby') ?>

    <?php // echo $form->field($model, 'avail_entrydt') ?>

    <?php // echo $form->field($model, 'avail_isactive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
