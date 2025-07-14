<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Update Images: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'gallery';
$this->params['menu'][2] = 'gallery';
?>
<div class="gallery-update">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
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