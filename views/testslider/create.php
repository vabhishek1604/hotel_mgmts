<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Testslider */

$this->title = 'Create Testslider';
$this->params['breadcrumbs'][] = ['label' => 'Testsliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'test_slider';
?>
 
<div class="slider-create">
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

