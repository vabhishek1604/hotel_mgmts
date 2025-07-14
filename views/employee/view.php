<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employee';
$this->params['menu'][2] = 'employee_index';
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'emp_id',
            'emp_type',
            'first_name',
            'middle_name',
            'last_name',
            'father_name',
            'mother_name',
            'contact_no',
            'photo',
            'alt_contact_no',
            'dob',
            'doj',
            'gender',
            'blood_group',
            'adhaar_card',
            'adhaar_photo',
            'state_id',
            'district',
            'address',
            'email_id:email',
            'addedby',
            'entrydt',
            'is_active',
        ],
    ]) ?>

</div>