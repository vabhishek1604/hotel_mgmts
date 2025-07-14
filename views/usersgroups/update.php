<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usersgroups */

$this->title = 'Update Usersgroups: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usersgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'usersgroups_index';
?>
<div class="usersgroups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>