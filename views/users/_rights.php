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
    <h4>User Access Management</h4><hr>
    <div class="row">
            <?php $c=0; foreach($actions as $action){ $c++;
               $check_group = Usersgroups::findOne(['user_id'=>$user_id,'group_id'=>$action->group]);
            ?>
            <div class="col-lg-3">
                <div class="form-inline">
                    <label><input type="checkbox" class="checkbox" id="group_<?= $action->id ?>" name="group[]" value="<?= $action->id ?>" <?php //echo !empty($check_group)?"checked":""; ?> checked> <?= $action->action_name ?></label>
                    <p style="font-size: 10px;color: blue;"><?= $action->remark ?></p>
                </div>
            </div>
            <?php if($c==4){
                echo "</div><div class='row'>";
                $c = 0;
            } ?>
            <?php } ?>
        <input type="hidden" id="count" name="count" value="<?php echo $c; ?>">
    </div>
    <div class="row">
        <div class="col-lg-12" style="margin-top: 25px;">
            <button type="button" class="btn btn-success pull-right" onclick="SaveUserRights()">Save User Rights</button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('input[type="checkbox"]').click(function() {
            var chk_box_count = $('#count').val();
            var favorite = [];
            $.each($("input[type='checkbox']:checked"), function(){            
                favorite.push($(this).val());
            });
            var arr_length = favorite.length;
            if(chk_box_count==arr_length){
                $("#rights").val("All");
            }else{
                $("#rights").val(favorite.join(","));
            }
        });
    });
</script>