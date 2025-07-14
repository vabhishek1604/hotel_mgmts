<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Employee;
use app\models\Groups;
use app\models\Usersgroups;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <?php if (\app\models\Users::getRole() == 'superadmin') { ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'comp_id')->dropDownList(ArrayHelper::map(app\models\Company::find()->asArray()->all(), 'id', 'company_name'), ['prompt' => '--Select Company--']) ?>
        </div>
        <?php } else { ?>
        <?= $form->field($model, 'comp_id')->hiddenInput(['maxlength' => true, 'value' => \app\models\Users::getCompanyId()])->label(false) ?>
        <?php } ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'emp_id')->dropDownList(ArrayHelper::map(Employee::find()->asArray()->all(), 'id', 'first_name'), ['prompt' => '--Select Employee--']) ?>
        </div>
        <!-- <div class="col-lg-4">
            <?= $form->field($model, 'comp_id')->textInput(['maxlength' => true]) ?>
        </div> -->
        <div class="col-lg-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
        <?php if (\app\models\Users::getRole() == 'superadmin') { ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'role')->dropDownList(['admin' => 'Admin', 'user' => 'User',]) //['prompt' => ''] 
                ?>
        </div>
        <?php } else { ?>
        <div class="col-lg-4">
            <?= $form->field($model, 'role')->dropDownList(['user' => 'User',]) //['prompt' => ''] 
                ?>
        </div>
        <?php } ?>
        <!--<h4>Group Allotment</h4><hr>
        <div class="row">
                <div class="col-lg-12">
        <?php
        // foreach(Groups::findAll(['isactive'=>1]) as $group){ 
        //					$check_group = "";
        //					if(!empty($model->id)){
        //						$check_group = Usersgroups::findOne(['user_id'=>$model->id,'group_id'=>$group]);
        //					}
        ?>
        <?php // }  
        ?>
                </div>
        </div>-->
        <?php // $form->field($model, 'forgotten_password_code')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'activation_code')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'forgotten_password_time')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'authKey')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'accessToken')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'ip_address')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'created_on')->textInput()  
        ?>

        <?php // $form->field($model, 'last_login')->textInput(['maxlength' => true])  
        ?>

        <?php // $form->field($model, 'active')->textInput()  
        ?>

        <?php // $form->field($model, 'is_password_update')->textInput()  
        ?>

        <?php // $form->field($model, 'is_security_update')->textInput()  
        ?>

    </div>
    <div>
        <?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>