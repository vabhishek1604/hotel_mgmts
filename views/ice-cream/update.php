<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IceCream */

$this->title = 'Update Ice Cream: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ice Creams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['menu'][1] = 'ice_cream';
$this->params['menu'][2] = 'ice_cream';
?>
<div class="ice-cream-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
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