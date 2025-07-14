<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentLogin */

$this->title = 'Update Student Login: ' . $model->St_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->St_id, 'url' => ['view', 'id' => $model->St_id]];
$this->params['menu'][1] = 'login';
$this->params['menu'][2] = 'login';
?>
<div class="student-login-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #912626;color: white;">
                    <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="panel-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>