<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'slider';
$this->params['menu'][2] = 'slider';
?>

<div class="slider-index">
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
                            <?= Html::a('Create Slider', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'slid_id',
                                'slid_title',
                                'slid_desc',
                                [
                                    'attribute' => 'image',
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return Html::img(
                                            Yii::$app->request->BaseUrl . $data->slid_url,
                                            ['width' => '600px', 'height' => '200px']
                                        );
                                    },
                                ],
                                //                                'slid_url:url',
                                //                                'slid_addedby',
                                //                                'slid_entrydt',
                                'slid_isactive',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>