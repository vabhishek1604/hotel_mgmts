<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menues */

$this->title = 'Create Menues';
$this->params['breadcrumbs'][] = ['label' => 'Menues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'menues';
$this->params['menu'][2] = 'menues';
?>
<div class="menues-create">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                        <div class="panel-options">
                        </div>
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
</div>