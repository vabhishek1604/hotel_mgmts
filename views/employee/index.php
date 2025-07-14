<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employee';
$this->params['menu'][2] = 'employee_index';
?>
<div class="employee-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="panel-body">
                    <p>
                        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <div class="panel-body">
                        <?= $this->render('_search', ['model' => $searchModel]);
                        ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            // 'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'id',
                                'emp_id',
                                'emp_type',
                                'Employee Name',
                                // 'first_name',
                                // 'middle_name',
                                //'last_name',
                                //'father_name',
                                //'mother_name',
                                'gender',
                                'contact_no',
                                'email_id:email',
                                'dob',
                                //'photo',
                                //'alt_contact_no',

                                //'doj',

                                //'blood_group',
                                //'adhaar_card',
                                //'adhaar_photo',
                                //'state_id',
                                //'district',
                                //'address',

                                //'addedby',
                                //'entrydt',
                                //'is_active',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>