<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->proj_id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'project_index';
?>
<div class="project-view">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->proj_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->proj_id], [
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
//            'proj_id',
            'proj_title',
            'proj_slug:ntext',
            'proj_state',
            'proj_city',
            'proj_landmark',
            'proj_address:ntext',
            'proj_remark:html',
            'proj_addedby',
            'proj_entrydt',
            'proj_updated_by',
            'proj_updated_at',
            'proj_isactive',
        ],
    ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
