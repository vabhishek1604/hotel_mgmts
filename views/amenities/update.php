<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Amenities */

$this->title = 'Update Amenities: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Amenities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'amenities';
$this->params['menu'][2] = 'amenities';
?>
<div class="amenities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
