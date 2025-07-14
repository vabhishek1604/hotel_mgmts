<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PagecontentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Page Contents';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'pagecontent';
$this->params['menu'][2] = 'pagecontent';
?>
<div class="pagecontent-index">
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
                        <?php // echo $this->render('_search', ['model' => $searchModel]);
                        ?>

                        <p>
                            <?= Html::a('Create Pagecontent', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //                                'cont_id',
                                'cont_menuid',
                                'cont_order',
                                'cont_title',
                                'cont_desc:ntext',
                                [
                                    'attribute' => 'image',
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return Html::img(
                                            Yii::$app->request->BaseUrl . $data->cont_image,
                                            ['width' => '200px', 'height' => '200px']
                                        );
                                    },
                                ],
                                //'cont_image',
                                //'cont_entrydt',
                                //'cont_status',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
