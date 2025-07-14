<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WaterparkEntry */

$this->title = $model->w_id;
$this->params['breadcrumbs'][] = ['label' => 'Waterpark Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'waterpark-entry';
$this->params['menu'][2] = 'waterpark-entry';
\yii\web\YiiAsset::register($this);
?>
<div class="waterpark-entry-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->w_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->w_id], [
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
            'w_id',
            'w_name',
            'w_mobile',
            'w_email:email',
            'w_password',
            'w_gender',
            'w_date',
        ],
    ]) ?>

</div>