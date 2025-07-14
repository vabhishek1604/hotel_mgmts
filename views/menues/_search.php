<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menues-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'menu_id') ?>

    <?= $form->field($model, 'menu_pos') ?>

    <?= $form->field($model, 'menu_title') ?>

    <?= $form->field($model, 'menu_level') ?>

    <?= $form->field($model, 'menu_parent') ?>

    <?php // echo $form->field($model, 'menu_order') ?>

    <?php // echo $form->field($model, 'menu_linktype') ?>

    <?php // echo $form->field($model, 'menu_pageurl') ?>

    <?php // echo $form->field($model, 'menu_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
