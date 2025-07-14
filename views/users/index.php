<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$menu_status = 'users';
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][1] = $menu_status;
$this->params['menu'][1] = 'employee';
$this->params['menu'][2] = 'employee';
?>
<!-- <style>
.glyphicon-trash,
.glyphicon-eye-open {
    display: none;
}
</style> -->

<div class="users-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                        <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <?php Pjax::begin(); ?>
                    <p><?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?></p>
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            // 'id',
                            // 'emp_id',
                            [
                                'label' => 'Company Name',
                                'attribute' => 'comp_id',
                                'format' => 'raw',
                                'value' => 'company.company_name'
                            ],
                            //  'comp_id',
                            'username',
                            'password',
                            // 'activation_code',
                            // 'forgotten_password_code',
                            // 'forgotten_password_time',
                            'role',
                            // 'authKey',
                            // 'accessToken',
                            // 'ip_address',
                            // 'created_on',
                            // 'last_login',
                            // 'active',
                            // 'is_password_update',
                            // 'is_security_update',
                            'mobile',
                            'email',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>