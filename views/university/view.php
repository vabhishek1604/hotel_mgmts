<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\University */

$this->title = $model->u_id;
$this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'university';
$this->params['menu'][2] = 'university';
\yii\web\YiiAsset::register($this);
?>
<div class="university-view">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div>
            </div>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->u_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'u_id',
                    'u_name',
                    'u_branch',
                    'st_name',
                    'st_mobile',
                    [
                        'label' => ' Student Image',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(
                                Yii::$app->request->BaseUrl . $data->st_image,
                                ['width' => '200px', 'height' => '150px']
                            );
                        },
                    ],
                    'st_dob',
                    'st_address:ntext',
                    'branch_desc',
                ],
            ]) ?>
        </div>
    </div>
</div>