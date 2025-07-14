<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AllStates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="all-states-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'st_name')->textInput(['maxlength' => true, 'placeholder' => 'Enter State Name']) ?>

    <?= $form->field($model, 'st_code')->textInput(['placeholder' => 'Enter numbers Only', 'type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <div class="form-group">
        <?php

        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>