<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectImagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-images-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pimg_id') ?>

    <?= $form->field($model, 'pimg_projid') ?>

    <?= $form->field($model, 'pimg_propid') ?>

    <?= $form->field($model, 'pimg_type') ?>

    <?= $form->field($model, 'pimg_url') ?>

    <?php // echo $form->field($model, 'pimg_addedby') ?>

    <?php // echo $form->field($model, 'pimg_entrydt') ?>

    <?php // echo $form->field($model, 'pimg_isactive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
