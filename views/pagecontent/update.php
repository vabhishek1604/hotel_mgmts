<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagecontent */

$this->title = 'Update Pagecontent: ' . $model->cont_id;
$this->params['breadcrumbs'][] = ['label' => 'Pagecontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cont_id, 'url' => ['view', 'id' => $model->cont_id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menu'][1] = 'pagecontent';
$this->params['menu'][2] = 'pagecontent';
?>
<div class="pagecontent-update">
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
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>