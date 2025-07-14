<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AllStates */

$this->title = 'Update All States: ' . $model->st_id;
$this->params['breadcrumbs'][] = ['label' => 'All States', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->st_id, 'url' => ['view', 'id' => $model->st_id]];
$this->params['menu'][1] = 'allstates';
$this->params['menu'][2] = 'allstates';
?>
<div class="all-states-update">
    <div class="row">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>