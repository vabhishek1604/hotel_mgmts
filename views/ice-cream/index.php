<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IceCreamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ice Creams';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'ice_cream';
$this->params['menu'][2] = 'ice_cream';
?>
<div class="ice-cream-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                </div>
                <div class="panel-body">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'flavour',
                            'type',
                            'quantity',
                            'remark',
                            ['class' => 'yii\grid\CheckboxColumn'],
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
                                                'class' => 'btn btn-default btn-sm', 'style' => 'background-color:#cd2820; color:white;', // btn-success, btn-info, et cetera
                                            ],
                                            // 'split' => true,    // if you want a split button
                                        ]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>

                </div>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#35dd69; color:black">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create New Ice-Cream</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -16px;">
                    <span aria-hidden="true" style="margin:4px;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>