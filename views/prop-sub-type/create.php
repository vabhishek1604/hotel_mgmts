<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PropSubType */

$this->title = 'Create Prop Sub Type';
$this->params['breadcrumbs'][] = ['label' => 'Prop Sub Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prop-sub-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
