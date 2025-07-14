<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AllStates */

$this->title = 'Create All States';
$this->params['breadcrumbs'][] = ['label' => 'All States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'allstates';
$this->params['menu'][2] = 'allstates';
?>
<div class="all-states-create">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                </div>
                <div class="panel-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>