<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actionmaster */

$this->title = 'Update Actionmaster: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Actionmasters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'actionmaster_index';
?>
<div class="actionmaster-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
