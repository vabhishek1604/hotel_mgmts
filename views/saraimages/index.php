<?php

use app\models\SaraimagesSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this View */
/* @var $searchModel SaraimagesSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Add Sarah Images';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'sara_images';
?>

<div class="slider-create">
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
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="saraimages-index">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Manage Sarah Images</h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="testslider-index">
                            <!--                            <p>
                                <?= Html::a('Create Sara Images', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>-->
                            <?php Pjax::begin(); ?>
                            <?php // echo $this->render('_search', ['model' => $searchModel]); 
                            ?>

                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'title',
                                    'description:ntext',
                                    [
                                        //                                    'attribute' => 'image',
                                        'label' => 'Image',
                                        'format' => 'html',
                                        'value' => function ($data) {
                                            return Html::img(
                                                Yii::$app->request->BaseUrl . $data->image,
                                                ['width' => '200px', 'height' => '150px']
                                            );
                                        },
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'contentOptions' => [],
                                        'header' => 'Action',
                                        'template' => '{view}{update} {delete}',
                                        'buttons' => []
                                    ],
                                ],
                            ]);
                            ?>
                        </div>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>