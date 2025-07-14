<?php

use app\models\Testslider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model Testslider */

$this->title = 'Update Testslider: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Testsliders', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'test_slider';
?>

<div class="testslider-update">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>