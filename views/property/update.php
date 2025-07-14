<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Property */

$this->title = Yii::t('app', 'Update Property: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->params['menu'][1] = 'property';
$this->params['menu'][2] = 'property';
?>
<div class="property-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                    <div class="panel-options">
                        <a
                            href="<?= Yii::$app->urlManager->createUrl(['property/update', 'id' => $model->id, 'type' => 'en']) ?>">English</a>
                        ||
                        <a
                            href="<?= Yii::$app->urlManager->createUrl(['property/update', 'id' => $model->id, 'type' => 'hi']) ?>">Hindi</a>
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