<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagecontentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagecontent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cont_id') ?>

    <?= $form->field($model, 'cont_menuid') ?>

    <?= $form->field($model, 'cont_order') ?>

    <?= $form->field($model, 'cont_title') ?>

    <?= $form->field($model, 'cont_desc') ?>

    <?php // echo $form->field($model, 'cont_image') ?>

    <?php // echo $form->field($model, 'cont_entrydt') ?>

    <?php // echo $form->field($model, 'cont_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
