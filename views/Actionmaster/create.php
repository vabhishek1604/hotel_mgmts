<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actionmaster */

$this->title = 'Create Actionmaster';
$this->params['breadcrumbs'][] = ['label' => 'Actionmasters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'actionmaster_index';
?>
<div class="actionmaster-create">
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
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
	</div>
</div>
