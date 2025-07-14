<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Members */

$this->title = 'Update Members: ' . $model->mem_id;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mem_id, 'url' => ['view', 'id' => $model->mem_id]];
$this->params['menu'][1] = 'members';
$this->params['menu'][2] = 'members';
?>
<div class="members-update">
    <div class="row">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>