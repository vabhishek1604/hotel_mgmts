<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WaterparkEntry */

$this->title = 'Create Waterpark Entry';
$this->params['breadcrumbs'][] = ['label' => 'Waterpark Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'waterpark-entry';
$this->params['menu'][2] = 'waterpark-entry';
?>
<div class="waterpark-entry-create">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #912626;">
                    <h1 class="panel-title" style="background-color: #912626;"><?= Html::encode($this->title) ?></h1>
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