<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pro */

$this->title = 'Create Pro';
$this->params['breadcrumbs'][] = ['label' => 'Pros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
