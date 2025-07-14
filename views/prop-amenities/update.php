<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PropAmenities */

$this->title = 'Update Prop Amenities: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prop Amenities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'prop-amenities';
$this->params['menu'][2] = 'prop-amenities';
?>
<div class="prop-amenities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>