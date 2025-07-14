<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Members */

$this->title = $model->mem_id;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'members';
$this->params['menu'][2] = 'members';
\yii\web\YiiAsset::register($this);
?>
<div class="members-view">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default panel_default_heading">
                <div class="panel-heading panel_heading">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->mem_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->mem_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'mem_id',
                            'mem_name',
                            'mem_username',
                            'mem_email:email',
                            'mem_password',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>