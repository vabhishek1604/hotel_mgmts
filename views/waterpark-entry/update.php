<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WaterparkEntry */

$this->title = 'Update Waterpark Entry: ' . $model->w_id;
$this->params['breadcrumbs'][] = ['label' => 'Waterpark Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->w_id, 'url' => ['view', 'id' => $model->w_id]];
$this->params['menu'][1] = 'waterpark-entry';
$this->params['menu'][2] = 'waterpark-entry';
?>
<div class="waterpark-entry-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #912626;color: white;">
                    <h3 class="panel-title">
                        <?= Html::encode($this->title) ?></h3>
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