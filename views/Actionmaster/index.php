<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActionmasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Actionmasters';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1]       = 'employees';
$this->params['menu'][2]       = 'actionmaster_index';
?>

<style>
	.glyphicon-trash,
	.glyphicon-eye-open {
		display: none;
	}
</style>

<div class="actionmaster-index">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<?= Html::encode($this->title) ?>
					</h4>
					<div class="panel-options">
						<!--						<a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
						<a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
						<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
					</div>
				</div>
				<div class="panel-body">
					<?php  //echo $this->render('_search', ['model' => $searchModel]); 
					?>

					<p>
						<?= Html::a('Create Actionmaster', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							//'id',
							'group.group_name',
							'action_type',
							'action.action_name',
							'action_name',
							'action_url:url',

							//'remark:ntext',
							//'addedby',
							//'entrydt',
							//'updated_by',
							//'updated_at',
							//'is_active',
					
							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>