<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestimonialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Testimonials';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'testimonial';
?>
<div class="testimonial-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
                        <?= Html::a('Add Testimonial', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-top:-10px;color:#FFF;']) ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        //                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //                            'id',
                            'title',
                            'content:ntext',
                            'date',
                            [
                                'attribute' => 'image',
                                'format' => 'html',
                                'value' => function ($data) {
                                    return Html::img(Yii::$app->request->BaseUrl . $data->image, ['width' => '200px', 'height' => '200px']);
                                },
                            ],
                            //                            'image',
                            //'isactive',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'contentOptions' => [],
                                'header' => 'Action',
                                'template' => '{update} {delete}',
                                'buttons' => []
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>