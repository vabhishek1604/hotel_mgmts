<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */

$this->title = 'Update Slider: ' . $model->slid_id;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slid_id, 'url' => ['view', 'id' => $model->slid_id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'slider';
$this->params['menu'][2] = 'slider';
?>
<div class="slider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>