<?php

use app\models\TestimonialsSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this View */
/* @var $searchModel TestimonialsSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Testimonials';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'testimonials';
?>

<div class="testimonials-create">
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

<div class="testimonials-index">

    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Manage Testimonials</h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="testslider-index">
                            <!--                            <p>
                                <?= Html::a('Add Testimonials', ['create'], ['class' => 'btn btn-success']) ?>
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
                                    'content:ntext',
                                    [
                                        //                                    'attribute' => 'image',
                                        'label' => 'Image',
                                        'format' => 'html',
                                        'value' => function ($data) {
                                            return Html::img(
                                                Yii::$app->request->BaseUrl . $data->image,
                                                ['width' => '100px', 'height' => '100px']
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