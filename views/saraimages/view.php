<?php

use app\models\Saraimages;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Saraimages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Saraimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'sara_images';
YiiAsset::register($this);
?>
<div class="saraimages-view">

    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                                'id',
                                'title',
                                'description:ntext',
                                [
                                    'attribute' => 'image',
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return Html::img(
                                            Yii::$app->request->BaseUrl . $data->image,
                                            ['width' => 'auto', 'height' => '200px']
                                        );
                                    },
                                ],
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>