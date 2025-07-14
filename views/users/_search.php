<?php

use app\models\Company;
use app\models\Users;
use app\models\UsersSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model UsersSearch */
/* @var $form ActiveForm */
?>

<div class="users-search">

    <?php
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);
    ?>

    <div class="row">

        <?php if (Users::getRole() == 'superadmin') { ?>
        <div class="col-lg-3">
            <?= $form->field($model, 'comp_id')->dropDownList(ArrayHelper::map(Company::find()->asArray()->all(), 'id', 'company_name'), ['prompt' => '--Select Company--']) ?>
        </div>
        <?php } ?>
        <?php //$form->field($model, 'id') 
        ?>

        <?php //$form->field($model, 'emp_id') 
        ?>

        <?php //$form->field($model, 'comp_id') 
        ?>
        <div class="col-lg-3">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'email') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'mobile') ?>

            <?php //$form->field($model, 'password') 
            ?>

            <?php // echo $form->field($model, 'activation_code') 
            ?>

            <?php // echo $form->field($model, 'forgotten_password_code') 
            ?>

            <?php // echo $form->field($model, 'forgotten_password_time') 
            ?>

            <?php // echo $form->field($model, 'role') 
            ?>

            <?php // echo $form->field($model, 'authKey') 
            ?>

            <?php // echo $form->field($model, 'accessToken') 
            ?>

            <?php // echo $form->field($model, 'ip_address') 
            ?>

            <?php // echo $form->field($model, 'created_on') 
            ?>

            <?php // echo $form->field($model, 'last_login') 
            ?>

            <?php // echo $form->field($model, 'active') 
            ?>

            <?php // echo $form->field($model, 'is_password_update') 
            ?>

            <?php // echo $form->field($model, 'is_security_update')  
            ?>

        </div>
        <div class="col-lg-3 pull-right">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'style' => 'margin-top:22px;']) ?>

            <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'style' => 'margin-top:22px;']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>