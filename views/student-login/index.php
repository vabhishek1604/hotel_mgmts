<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentLoginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Logins';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'login';
$this->params['menu'][2] = 'login';
?>
<div class="student-login-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #912626;">
                    <h5 class="panel-title" style="background-color: #912626;"><?= Html::encode($this->title) ?></h5>
                </div>

                <?php echo $this->render('_search', ['model' => $searchModel]);
                ?>
                <div class="panel-body">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'st_name',
                            'st_username',
                            'st_password',
                            'st_gender',
                            'st_dob:date',
                            'st_mobile',
                            'st_address',
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
                                                        'label' => Yii::t('yii', '<i class="fa fa-trash" style="color:red;font-size:16px"></i>  Delete'),
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
                                                'class' => 'btn-danger btn-sm', // btn-success, btn-info, et cetera
                                            ],
                                            //     'split' => true,    // if you want a split button
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#35dd69; color:black">
                <h5 class="modal-title" id="exampleModalCenterTitle">Student Login Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -16px;">
                    <span aria-hidden="true">&times;</span>
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