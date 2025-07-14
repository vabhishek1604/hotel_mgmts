<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'menu';
$this->params['menu'][2] = 'menu';
?>
<div class="category-create">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>

                </div>
                <div class="panel-body">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            'cat_name',


                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{all}',
                                'buttons' => [
                                    'all' => function ($url, $model, $key) {
                                        return ButtonDropdown::widget([
                                            'encodeLabel' => false, // if you're going to use html on the button label
                                            'label' => 'Actions',
                                            'dropdown' => [
                                                'encodeLabels' => false, // if you're going to use html on the items' labels
                                                'items' => [
                                                    [
                                                        'label' => Yii::t('yii', '<i class="fa fa-eye" style="font-size:16px"></i> View'),
                                                        'url' => ['view', 'id' => $key],
                                                    ],
                                                    [
                                                        'label' => Yii::t('yii', '<i class="fa fa-pencil" style="font-size:16px"></i> Update'),
                                                        'url' => ['update', 'id' => $key],
                                                        'visible' => true, // if you want to hide an item based on a condition, use this
                                                    ],
                                                    [
                                                        'label' => Yii::t('yii', '<i class="fa fa-trash " style="color:red;font-size:16px"></i>  Delete'),
                                                        'linkOptions' => [
                                                            'data' => [
                                                                'method' => 'post',
                                                                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                            ],
                                                        ],
                                                        'url' => ['delete', 'id' => $key],
                                                        'visible' => true, // same as above
                                                    ],
                                                ],
                                                'options' => [
                                                    'class' => 'dropdown-menu-right', // right dropdown
                                                ],
                                            ],
                                            'options' => [
                                                'class' => 'btn btn-default btn-sm', 'style' => 'background-color:#cd2820; color:white; margin-top:-5px;', // btn-success, btn-info, et cetera
                                            ],
                                            // 'split' => true,    // if you want a split button
                                        ]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>