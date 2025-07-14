<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentLogin */

$this->title = 'Create Student Login';
$this->params['breadcrumbs'][] = ['label' => 'Student Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'login';
$this->params['menu'][2] = 'login';
?>
<div class="student-login-create">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #912626;">
                    <h1 class="panel-title" style="background-color: #912626;"><?= Html::encode($this->title) ?></h1>
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