<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Property */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'property';
$this->params['menu'][2] = 'property';

?>
<div class="property-view">
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
                            'property_type',
                            'types',
                            'property_name',
                            'prop_code',
                            'project_name',
                            'land_mark',
                            'locality',
                            'city',
                            'state',
                            'industrial_area_name',
                            'ward_number',
                            'ward_name',
                            'special_economic_zone',
                            'ph_no',
                            'diversion_no',
                            'carpet_area',
                            'super_built',
                            'hall',
                            'washrooms',
                            'pantry',
                            'promoter_name',
                            'furnishing',
                            'add_other_rooms',
                            'total_floors',
                            'prop_on_which-floor',
                            'dedicated_trnsformer',
                            'reserved_parking',
                            'dedicated_transformer',
                            'availability',
                            'possession_by',
                            't_and_cp',
                            'nagar_nigam_approved',
                            'ownership_type',
                            'selling_price',
                            'collectrate_rate_sqft',
                            'collectrate_rate_type',
                            'price_negotiable',
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
                            'over_looking',
                            'expected_property_valuation',
                            'commercial_project_coming',
                            'special_points:ntext',
                            'hypothecation_details',
                            'ownership',
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