<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agriculture */

$this->title = Yii::t('app', 'Update Agriculture: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agricultures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->params['menu'][1] = 'agriculture';
$this->params['menu'][2] = 'agriculture';
?>
<div class="agriculture-update">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                    <div class="panel-options">
                        <a href="<?= Yii::$app->urlManager->createUrl(['agriculture/update', 'id' => $model->id, 'type' => 'en']) ?>">English</a>
                        ||
                        <a href="<?= Yii::$app->urlManager->createUrl(['agriculture/update', 'id' => $model->id, 'type' => 'hi']) ?>">Hindi</a>
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