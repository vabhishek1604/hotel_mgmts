<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentLoginSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-login-search">
    <div class="row">
        <div class="col-lg-4" style="margin: 22px;">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?php echo $form->field($model, 'st_mobile') ?>

        </div>

        <div class="form-group" style="margin-top: 45px;">
            <?= Html::submitButton('', ['class' => 'btn btn-primary fa fa-search']) ?>
            <?= Html::resetButton('', ['class' => 'btn btn-secondary fa fa-refresh', 'style' => 'margin-left:10px;']) ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"> Student
                Login </button>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>