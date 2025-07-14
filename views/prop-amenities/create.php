<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PropAmenities */

$this->title = 'Create Property Amenities';
$this->params['breadcrumbs'][] = ['label' => 'Prop Amenities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'prop-amenities';
$this->params['menu'][2] = 'prop-amenities';
?>
<div class="prop-amenities-create">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
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