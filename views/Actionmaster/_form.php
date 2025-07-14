<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Groups;
use app\models\Actionmaster;


/* @var $this yii\web\View */
/* @var $model app\models\Actionmaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actionmaster-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Groups::find()->asArray()->all(), 'id', 'group_name'), ['prompt' => 'Select Group', 'class' => "form-control select2"]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'action_type')->dropDownList(['Main Menu' => 'Main Menu', 'Sub Menu' => 'Sub Menu',], ['prompt' => 'Select Menu Type', 'onchange' => 'ShowHideMenu(this.value)']) ?>
            <div class="row" style="display: none;" id="show_main_menu">
                <div class="col-lg-12">
                    <?= $form->field($model, 'action_id')->dropDownList(ArrayHelper::map(Actionmaster::find()->where(['action_type' => 'Main Menu'])->asArray()->all(), 'id', 'action_name'), ['prompt' => 'Select Main Menu',]) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'action_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'action_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'remark')->textarea(['rows' => 2]) ?>

            <?php // $form->field($model, 'addedby')->textInput() 
            ?>

            <?php // $form->field($model, 'entrydt')->textInput() 
            ?>

            <?php // $form->field($model, 'updated_by')->textInput() 
            ?>

            <?php // $form->field($model, 'updated_at')->textInput() 
            ?>

            <?php // $form->field($model, 'is_active')->textInput() 
            ?>
        </div>
        <div class="col-lg-4" style="margin-top:25px;">
            <?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
function ShowHideMenu(value) {
    if (value == 'Sub Menu') {
        $("#show_main_menu").show();
    } else {
        $("#show_main_menu").hide();
    }
}
</script>