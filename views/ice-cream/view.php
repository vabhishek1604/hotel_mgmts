<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IceCream */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ice Creams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'ice_cream';
$this->params['menu'][2] = 'ice_cream';
\yii\web\YiiAsset::register($this);
?>
<div class="ice-cream-view">

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

            'flavour',
            'type',
            'quantity',
        ],
    ]) ?>

</div>