<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Users;
use app\models\Groups;
use app\models\Usersgroups;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'User Rights';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'users_userrights';
?>

<div class="users-create">	
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                        <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body"> 
                    <div class="users-form">
                        <?php $form = ActiveForm::begin([
                            'id'=>'userrights'
                        ]); ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(Users::find()->All(), 'id', 'username'), ['prompt' => '--Select User--']) ?>
                                </div>
                                <div class="col-lg-4">
                                    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Groups::find()->asArray()->all(), 'id', 'group_name'), ['prompt' => '--Select Group--']) ?>
                                </div>
                                <div class="col-lg-4" style="margin-top: 25px;">
                                    <button type="button" class="btn btn-info" onclick="GetUserRights()">Search</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" id="rights_div">

                                </div>
                                <input type="hidden" id="rights" name="action_rights" value="All">
                            </div>                                                    
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function  GetUserRights(){
    var user_id = $("#usersgroups-user_id").val();
    var group_id = $("#usersgroups-group_id").val();
    $.ajax({
        url:'<?= Yii::$app->getUrlManager()->createUrl('users/getactions'); ?>',
        data:{'user_id':user_id,'group_id':group_id},
        type:'post',
        success:function(res){
            $("#rights_div").html(res);
        }
    });
}
function  SaveUserRights(){
    var datastring = $("#userrights").serialize();
    $.ajax({
        url:'<?= Yii::$app->getUrlManager()->createUrl('users/saveuserrights'); ?>',
        data:datastring,
        type:'post',
        success:function(res){
            if(res==1){
                alert('Details Have Been Saved Successfully.');
            }
            GetUserRights();
        }
    });
}
</script>