<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubType */

$this->title = 'Update Sub Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sub Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
