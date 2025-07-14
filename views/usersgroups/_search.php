<?php

use app\models\Groups;
use app\models\Users;
use app\models\UsersgroupsSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model UsersgroupsSearch */
/* @var $form ActiveForm */
?>

<div class="usersgroups-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

            <?php // $form->field($model, 'id')  ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(Users::find()->asArray()->all(), 'id', 'username'), ['prompt' => '--Select--'])->label('Users') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Groups::find()->asArray()->all(), 'id', 'group_name'), ['prompt' => '--Select--'])->label('Group') ?>
        </div>
        <?php // $form->field($model, 'action_rights')  ?>

        <div class="form-group" style="margin-top: 21px">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

</div>
