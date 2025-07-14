<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestsliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Sliders';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'CMS';
$this->params['menu'][2] = 'test_slider';
?>


<div class="slider-index">
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
                        <div class="testslider-index">


                            <?php Pjax::begin(); ?>
                            <?php echo $this->render('_search', ['model' => $searchModel]);  ?>
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    //                                    'id',
                                    'slid_title',
                                    'slid_desc',
                                    'slid_url:url',
                                    'slid_addedby',
                                    'slid_entrydt',
                                    [
                                        'attribute' => 'slide_image',
                                        'format' => 'html',
                                        'value' => function ($data) {
                                            return Html::img(
                                                Yii::$app->request->BaseUrl . $data->slide_image,
                                                ['width' => '200px', 'height' => '150px']
                                            );
                                        },
                                    ],
                                    ['class' => 'yii\grid\ActionColumn'],
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