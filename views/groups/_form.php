<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Groups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groups-form">
			<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-lg-4">

			<?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>
                </div>
		<div class="col-lg-4">
			<?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

			<?php //$form->field($model, 'isactive')->textInput() ?>
		</div>
		<div class="col-lg-4" style="margin-top:25px;">
			<?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
