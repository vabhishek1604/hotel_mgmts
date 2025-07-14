<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgricultureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Agriculture Property List');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'agriculture';
$this->params['menu'][2] = 'agriculture';
?>
<div class="agriculture-index">
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
                            // 'prop_code',
                            // 'prop_secret_code',
                            // 'pro_type',
                            // 'land_type1',
                            // 'soil_type',
                            //'owner_type',
                            //'pro_seller',
                            //'area',
                            //'area_unit',
                            //'pro_landmark',
                            'pro_village',
                            'pro_tehsil',
                            'pro_district',
                            //'ph_no',
                            //'khasra_no',
                            //'diversion_type',
                            //'diversion_no',
                            //'water_level',
                            // 'water_source',
                            //'land_type',
                            //'road_connectivity',
                            //'dist_from_front',
                            //'dist_from_road',
                            //'electricity_avail',
                            //'dist_from_high_tension_line',
                            //'district_centre',
                            //'tehsil',
                            //'village',
                            // 'ownership_type',
                            //'govt_guideline',
                            //'market_value',
                            //'selling_price',
                            //'expected_property_valuation',
                            //'new_project_coming',
                            //'special_points:ntext',
                            //'selling_time_req',
                            //'if_dispute',
                            //'claims_from_co_owners',
                            //'family',
                            //'legal_heirs',
                            //'misrepresentation_by_seller',
                            //'bad_title_of_property',
                            //'disputes_related_to_property_acquired_as_a_gift_or_through_will',
                            //'disputes_related_to_easements_rights',
                            //'Others',
                            //'is_verified',
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
    // alert(id);
    var c = confirm('Are you sure want to change status ?');
    if (c) {
        var url = "<?php echo \Yii::$app->getUrlManager()->createUrl('agriculture/changestatus'); ?>";
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