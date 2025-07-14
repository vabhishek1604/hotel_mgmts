<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectAvailabilities */

$this->title = $model->avail_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Availabilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->params['menu'][1] = 'projectavail';
$this->params['menu'][2] = 'projectavail';
?>
<div class="project-availabilities-view">
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
                            <?= Html::a('Update', ['update', 'id' => $model->avail_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->avail_id], [
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
                                'avail_id',
                                'avail_projid',
                                'avail_title',
                                'avail_type',
                                'avail_area_in_sqft',
                                'avail_qty',
                                'avail_bedroom',
                                'avail_bathroom',
                                'avail_price',
                                'avail_other_features:ntext',
                                'avail_prop_dec',
                                'avail_slug:html',
                                'avail_addedby',
                                'avail_entrydt',
                                'avail_isactive',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>