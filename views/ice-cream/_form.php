<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IceCream */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ice-cream-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'flavour')->dropDownList(['Straberry' => 'Straberry', 'Chocolate' => 'Chocolate', 'Vanilla' => 'Vanilla', 'Butterscotch' => 'Butterscotch', 'Pineapple' => 'Pineapple', 'Blueberry' => 'Blueberry',], ['prompt' => '']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'type')->dropDownList(['family pack' => 'Family pack', 'cup' => 'Cup', 'cone' => 'Cone', 'glass' => 'Glass', 'special' => 'Special', 'extra chocolate' => 'Extra chocolate', '' => '',], ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true, 'placeholder' => 'Enter numbers only']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Give your remarks here']) ?>
            <!-- ['readonly' => false, 'value' => $model->remark ? 'Your Value' : $model->remark]-> this is the another way
            to print by default something inside input field -->

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>