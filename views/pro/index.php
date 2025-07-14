<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pro-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'commercial_type',
            'property_name',
            'property_address',
            'land_mark',
            //'locality',
            //'city',
            //'state',
            //'industrial_area_name',
            //'wardnumber_and_name',
            //'special_economic_zone',
            //'ph_no',
            //'diversion_no',
            //'carpet_area',
            //'super_built',
            //'hall',
            //'washrooms',
            //'pantry',
            //'furnishing',
            //'total_floors',
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
            //'Price Negotiable',
            //'water_source',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
