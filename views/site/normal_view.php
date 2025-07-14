<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Admin Dashboard');
$menu_status = "dashboard";
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][1] = $menu_status;
?>

<div class="employee-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><?= Html::encode($this->title) ?></h4>
                    <div class="panel-options">
<!--                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                        <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                    </div>
                </div>
                <div class="panel-body">
                    <!--------------- Container ------------------------>
    <div class="row">
        <div class="col-xs-3 col-lg-3 col-md-3">
            <?php
            echo '<label class="control-label">Booking Date</label>';
            echo DatePicker::widget([
                'name' => 'dp_2',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => date('d-M-Y'),
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>
    
    <div class="row">

        <div class="col-xs-3 col-lg-3 col-md-3">
            <div class="offer offer-radius offer-danger">
                <!--                    <div class="shape">
                                        <div class="shape-text">
                                            top							
                                        </div>
                                    </div>-->
                <div class="offer-content">
                    <h3 class="lead">
                        A danger-radius
                    </h3>						
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-lg-3 col-md-3">
            <div class="offer offer-radius offer-danger">
                <!--                    <div class="shape">
                                        <div class="shape-text">
                                            top							
                                        </div>
                                    </div>-->
                <div class="offer-content">
                    <h3 class="lead">
                        A danger-radius
                    </h3>						
                    <p>
                        And a little description.
                        <br> and so one
                    </p>
                </div>
            </div>
        </div>

    </div>


                    <!--------------- Container ------------------------>

                </div>
            </div>
        </div>
    </div>
</div>