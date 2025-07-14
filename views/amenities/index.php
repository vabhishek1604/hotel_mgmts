<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AmenitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Amenities';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'amenities';
$this->params['menu'][2] = 'amenities';
?>
<div class="amenities-index">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>
                </div><br>
                <div style="margin-left: 15px;">
                    <?= Html::a('Create Amenities', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="panel-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'name',
                            // 'is_active',
                            // 'created_by',
                            // 'created_at',
                            //'updated_by',
                            //'updated_at',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>