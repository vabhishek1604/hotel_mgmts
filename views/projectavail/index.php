<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\ProjectavailabilitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Project Availabilities';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1]       = 'projectavail';
$this->params['menu'][2]       = 'projectavail';

?>
<div class="projectavailabilities-index">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?= Html::encode($this->title) ?>
                        </h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); 
                        ?>

                        <p>
                            <?= Html::a('Create Project Availabilities', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //                                'avail_id',
                                //'avail_projid',
                                [
                                    'label' => ' Project name',
                                    'attribute' => 'avail_projid',
                                    'value' => 'availProj.proj_title'

                                ],
                                'avail_title',
                                'avail_type',
                                //                                'avail_bedroom',
                                //                                'avail_bathroom',
                                //                                'avail_price',
                                //                                'avail_area_in_sqft',
                                //                                'avail_other_features:ntext',
                                'avail_prop_dec',
                                //'avail_qty',
                                //'avail_slug:ntext',
                                //'avail_addedby',
                                //'avail_entrydt',
                                //'avail_isactive',
                        
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>