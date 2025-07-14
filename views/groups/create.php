<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Groups */

$this->title = 'Add New Group';
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'groups';
$this->params['menu'][2] = 'groups';
?>

<div class="groups-create">
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