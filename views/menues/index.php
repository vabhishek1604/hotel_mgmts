<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Menues';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1]       = 'menues';
$this->params['menu'][2]       = 'menues';
?>
<div class="menues-index">
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
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a('Create Menues', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //                                'menu_id',
                                'menu_pos',
                                'menu_title',
                                'menu_level',
                                'menu_parent',
                                'menu_order',
                                'menu_linktype',
                                'menu_pageurl',
                                //'menu_status',
                        
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>