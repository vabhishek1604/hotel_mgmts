<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agriculture */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agricultures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->params['menu'][1] = 'agriculture';
$this->params['menu'][2] = 'agriculture';
?>
<div class="agriculture-view">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div><br>
                <div>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'style' => 'margin-left: 15px;']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                <div class="panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'prop_code',
                            'prop_secret_code',
                            'pro_type',
                            'soil_type',
                            'owner_type',
                            'pro_seller',
                            'pro_landmark',
                            'pro_village',
                            'pro_tehsil',
                            'pro_district',
                            'ph_no',
                            'khasra_no',
                            'diversion_type',
                            'diversion_no',
                            'water_level',
                            [

                                'label'  => 'water_source',
                                'value'  => call_user_func(function ($data) {
                                    $list = '';
                                    foreach ($data->water_source as $v) {
                                        $list .= $v . ', ';
                                    }
                                    return  $list;
                                }, $model),
                            ],
                            // 'water_source',
                            'land_type',
                            'road_connectivity',
                            'dist_from_front',
                            'dist_from_road',
                            'electricity_avail',
                            'dist_from_high_tension_line',
                            'district_centre',
                            'tehsil',
                            'village',
                            [

                                'label'  => 'ownership_type',
                                'value'  => call_user_func(function ($data) {
                                    $list = '';
                                    foreach ($data->ownership_type as $v) {
                                        $list .= $v . ', ';
                                    }
                                    return  $list;
                                }, $model),
                            ],
                            // 'ownership_type',
                            'govt_guideline',
                            'market_value',
                            'selling_price',
                            'expected_property_valuation',
                            'new_project_coming',
                            'special_points:ntext',
                            'selling_time_req',
                            'if_dispute',
                            'claims_from_co_owners',
                            'family',
                            'legal_heirs',
                            'misrepresentation_by_seller',
                            'bad_title_of_property',
                            'disputes_related_to_property_acquired_as_a_gift_or_through_will',
                            'disputes_related_to_easements_rights',
                            'Others',
                            'advisor_id',
                            // 'is_active',
                            // 'created_by',
                            // 'created_at',
                            // 'updated_by',
                            // 'updated_at',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>