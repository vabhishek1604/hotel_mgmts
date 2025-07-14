<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groups';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'groups';
$this->params['menu'][2] = 'groups';
?>
<style>
.glyphicon-trash,
.glyphicon-eye-open {
    display: none;
}
</style>

<div class="groups-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
                        <!--						<a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
						<a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
						<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                    </div>
                </div>
                <div class="panel-body">
                    <?php  //echo $this->render('_search', ['model' => $searchModel]); 
					?>

                    <p><?= Html::a('Create Groups', ['create'], ['class' => 'btn btn-success']) ?></p>

                    <?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							// 'id',
							'group_name',
							'action',
							// 'isactive',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
                </div>
            </div>
        </div>
    </div>
</div>