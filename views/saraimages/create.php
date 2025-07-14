<?php

use app\models\Saraimages;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model Saraimages */

$this->title = 'Create Sara Images';
$this->params['breadcrumbs'][] = ['label' => 'Saraimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'sara_images';

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