<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pro */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'commercial_type',
            'property_name',
            'property_address',
            'land_mark',
            'locality',
            'city',
            'state',
            'industrial_area_name',
            'wardnumber_and_name',
            'special_economic_zone',
            'ph_no',
            'diversion_no',
            'carpet_area',
            'super_built',
            'hall',
            'washrooms',
            'pantry',
            'furnishing',
            'total_floors',
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
            'Price Negotiable',
            'water_source',
            'over_looking',
            'expected_property_valuation',
            'commercial_project_coming',
            'special_points:ntext',
            'hypothecation_details',
            'ownership',
            'advisor_id',
            'is_active',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
        ],
    ]) ?>

</div>
