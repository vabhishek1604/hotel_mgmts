<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Property List');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'property';
$this->params['menu'][2] = 'property';
?>
<div class="property-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div><br>
                <div class="panel-body">
                    <?php echo $this->render('_search', ['model' => $searchModel]);
                    ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'property_type',
                            'types',
                            // 'property_name',
                            // 'prop_code',
                            // 'project_name',
                            // 'land_mark',
                            // 'locality',
                            'city',
                            'state',
                            //'industrial_area_name',
                            //'ward_number',
                            //'ward_name',
                            //'special_economic_zone',
                            //'ph_no',
                            //'diversion_no',
                            //'carpet_area',
                            //'super_built',
                            //'hall',
                            //'washrooms',
                            //'pantry',
                            //'promoter_name',
                            //'furnishing',
                            //'add_other_rooms',
                            //'total_floors',
                            //'prop_on_which_floor',
                            //'dedicated_trnsformer',
                            //'reserved_parking',
                            //'dedicated_transformer',
                            //'availability',
                            //'possession_by',
                            //'t_and_cp',
                            //'nagar_nigam_approved',
                            //'ownership_type',
                            //'selling_price',
                            //'collectrate_rate_sqft',
                            //'collectrate_rate_type',
                            //'price_negotiable',
                            // 'water_source',
                            //'over_looking',
                            //'expected_property_valuation',
                            //'commercial_project_coming',
                            //'special_points:ntext',
                            //'hypothecation_details',
                            //'ownership',
                            //'advisor_id',
                            //'is_active',
                            //'created_by',
                            //'created_at',
                            //'updated_by',
                            //'updated_at',
                            [
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->getButton($model);
                                },
                            ],
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
                                                        'visible' => true,
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
            </div>
        </div>
    </div>
</div>
<script>
    function changeStatus(id, status) {
        var c = confirm('Are you sure want to change status ?');
        if (c) {
            var url = "<?php echo \Yii::$app->getUrlManager()->createUrl('property/changestatus'); ?>";
            $.post(url, {
                id: id,
                status: status
            }, function(res) {

                // alert($("#span_" + id + "_" + status).html());
                //                alert(res.msg);
                if (res.msg == 'success') {
                    //                    alert_self('Status has been changed and all default userrights alloted..!');
                    if (status == 1) {
                        $("#span_" + id).html(
                            '<buttton type="button" data-loading-text="Please wait..." id="btn15" onclick="changeStatus(' +
                            id + ',0)" class="btn btn-sm btn-success" title="change status">Enable</buttton>');
                    } else {
                        $("#span_" + id).html(
                            '<buttton type="button" data-loading-text="Please wait..." id="btn15" onclick="changeStatus(' +
                            id + ',1)" class="btn btn-sm btn-danger" title="change status">Disable</buttton>');

                    }
                }

            });
        }
    }
</script>