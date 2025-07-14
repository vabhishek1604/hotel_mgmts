<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Images';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'projectimg';
$this->params['menu'][2] = 'projectimg';

?>
<div class="project-images-index">
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
                            <?= Html::a('Create Project Images', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'pimg_id',
                               // 'pimg_projid',
                                  [
                                'label' => '	Project Name',
                                'attribute' => 'pimg_projid',
                                'format' => 'raw',
                                'value' => 'pimgProj.proj_title',

                            ],
//                                'pimg_propid',
                                [
                                'label' => '	Property Name',
                                'attribute' => 'pimg_propid',
                                'format' => 'raw',
                                'value' => 'pimgProp.avail_title',

                            ],
                                'pimg_type',
                                //                                'pimg_url:url',
                                [
                                    'attribute' => 'image',
                                    'format' => 'html',
                                    'value' => function ($data) {
                                        return Html::img(
                                            Yii::$app->request->BaseUrl . $data->pimg_url,
                                            ['width' => '200px', 'height' => '200px']
                                        );
                                    },
                                ],
                                //'pimg_addedby',
                                //'pimg_entrydt',
                                //'pimg_isactive',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>