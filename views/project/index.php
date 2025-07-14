<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'project';
$this->params['menu'][2] = 'project';
?>
<div class="company-index">
    <div class="brands-index">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                        <div class="panel-options">
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php // echo $this->render('_search', ['model' => $searchModel]); 
                        ?>

                        <p>
                            <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //                                'proj_id',
                                'proj_title',
                                'proj_address:ntext',
                                'proj_landmark',
                                'proj_type',
                                'proj_city',
                                'proj_state',
                                //                                'proj_remark:ntext',
                                //'proj_slug:ntext',
                                //'proj_addedby',
                                //'proj_entrydt',
                                //'proj_updated_by',
                                //'proj_updated_at',
                                //'proj_isactive',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>