<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employees';
$this->params['menu'][2] = 'company_index';
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
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <p>
                            <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                        <div style="">
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
//                            'filterModel' => $searchModel,
                                'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
//                                'id',
//                                'user_id',
                                    'company_name',
                                    'company_title',
                                    'company_gstin',
//                                'company_logo',
//                                'company_logo_lg',
//                                    'company_address',
                                    'website_url:url',
                                    'official_email_id:email',
                                    'support_mail',
                                    'contact_number',
//                                    'company_desc:ntext',
                                    //'is_running',
                                    //'is_active',
                                    //'created_by',
                                    //'created_at',
                                    //'updated_by',
                                    //'updated_at',
                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>

