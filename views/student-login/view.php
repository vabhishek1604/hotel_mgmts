<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentLogin */

$this->title = $model->St_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'login';
$this->params['menu'][2] = 'login';
\yii\web\YiiAsset::register($this);
?>
<div class="student-login-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->St_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->St_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'st_name',
            'st_username',
            'st_email',
            'st_password',
            'st_gender',
            'st_dob',
            'st_mobile',
            'st_address',
        ],
    ]) ?>

</div>