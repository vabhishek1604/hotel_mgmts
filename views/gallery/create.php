<?php

use app\models\Gallery;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model Gallery */

$this->title = 'Manage Images';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'gallery';
$this->params['menu'][2] = 'gallery';
?>
<div class="gallery-create">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Add Images</h4>
                    <div class="panel-options">
                    </div>
                </div>
                <div class="panel-body">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
                    </div>
                </div>
                <div class="panel-body">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            'id',
                            'type',
                            [
                                'attribute' => 'image',
                                'format' => 'html',
                                'value' => function ($data) {
                                    return Html::img(Yii::$app->request->BaseUrl . $data->image, ['width' => '200px', 'height' => '200px']);
                                },
                                    ],
//                                    'image',
                                    'desc',
//                                    'isactive',
//                                    ['class' => 'yii\grid\ActionColumn'],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'contentOptions' => [],
                                        'header' => 'Action',
                                        'template' => '{update} {delete}',
                                        'buttons' => [
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>