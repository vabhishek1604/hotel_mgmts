<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = 'View Company Details';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'company_index';
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">
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

                       

                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?php 
//                            Html::a('Delete', ['delete', 'id' => $model->id], [
//                                'class' => 'btn btn-danger',
//                                'data' => [
//                                    'confirm' => 'Are you sure you want to delete this item?',
//                                    'method' => 'post',
//                                ],
//                            ])
                            ?>
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
//                                'id',
//                                'user_id',
                                'company_name',
                                'company_title',
                                'company_desc:ntext',
                                'company_gstin',
                                 [
                                    'attribute' => 'company_logo',
                                    'value' => Yii::$app->request->BaseUrl . $model->company_logo,
                                    'format' => ['image', ['width' => '100', 'height' => '100']]
                                ],
//                                'company_logo',
//                                'company_logo_lg',
                                'company_address',
                                'website_url:url',
                                'official_email_id:email',
                                'support_mail',
                                'contact_number',
//            'is_running',
//            'is_active',
//            'created_by',
//            'created_at',
//            'updated_by',
//            'updated_at',
                            ],
                        ])
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
