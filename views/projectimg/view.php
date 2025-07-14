<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectImages */

$this->title = $model->pimg_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->params['menu'][1] = 'projectimg';
$this->params['menu'][2] = 'projectimg';
?>
<div class="project-images-view">
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
                            <?= Html::a('Update', ['update', 'id' => $model->pimg_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->pimg_id], [
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
                                'pimg_id',
                                'pimg_projid',
                                'pimg_propid',
                                'pimg_type',
                                'pimg_url:url',
                                'pimg_addedby',
                                'pimg_entrydt',
                                'pimg_isactive',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>