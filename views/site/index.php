<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menu'][1] = '';
$this->params['menu'][2] = '';
?>
<div class="row">
    
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px;">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("project"); ?>">
                            <div class="panel-body">
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                        <div style="font-size: 25px;">
                                      <i class="fa fa-lock" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin">Manage Project</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("projectavail/index"); ?>">
                       <div class="panel-body">
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                        <div style="font-size: 25px;">
                                        <i  class="fa fa-home" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin">Manage Properties</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("projectimg/index"); ?>">
                            <div class="panel-body">
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                       <div style="font-size: 25px;">
                                       <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin">Manage Project Image
</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("slider/index"); ?>">
                             <div class="panel-body">
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                        <div style="font-size: 25px;">
                                            <i class="fa fa-sliders" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin">Manage Banner</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("gallery/create"); ?>">
                            <div class="panel-body">
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                        <div style="font-size:25px;">
                                            <i class="fa fa-film" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin">Manage Gallery</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
    <div class="col-sm-4 col-lg-4">
                    <div class="panel panel-metric panel-metric-sm" style="background-color: #f7f1e3; border-radius: 20px">
                        
                        <a href="<?php echo Yii::$app->urlManager->createUrl("pagecontent/index"); ?>">
                            <div class="panel-body">
                               
                                <div class="metric-content metric-icon" style="    min-height: 120px">
                                    <header>
                                        <div style="font-size: 25px;">
                                      <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="thin" style="margin-top: 10px;">Manage Content</h3>
                                    </header>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
</div>

<!--<div class="row">
    <div class="col-md-7">
        <div class="panel">
            <div class="panel-body panel-body-success padding-sm-vertical">
                <div id="sales-orders" class="morris-hover-dark" style="height: 243px"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-4">
                        <div class="mini-chart">
                            <div id="mini-chart-1" class="chart text-center" style="width: 44px;"></div>
                            <div class="chart-details" style="width: 90px;">
                                <div class="chart-name">Avg Income</div>
                                <div class="chart-value"><i class="fa fa-rupee"></i> 2,655,980</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 text-center">
                        <div class="mini-chart text-left">
                            <div id="mini-chart-2" class="chart" style="width: 44px;"></div>
                            <div class="chart-details" style="width: 90px;">
                                <div class="chart-name">Avg Outcome</div>
                                <div class="chart-value"><i class="fa fa-rupee"></i> 1,431,250</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 text-right">
                        <div class="mini-chart text-left">
                            <div id="mini-chart-3" class="chart" style="width: 44px;"></div>
                            <div class="chart-details" style="width: 90px;">
                                <div class="chart-name">Total Sales</div>
                                <div class="chart-value"><i class="fa fa-rupee"></i> 261,885</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-warning">
                <div class="metric-content metric-icon">
                    <div class="value">
                        <i class="fa fa-rupee"></i> 37,680
                    </div>
                    <div class="trend">
                        <p class="text-success">
                            <i class="fa fa-chevron-up"></i> 5.1%
                        </p>
                        <strong>Previous 30 Days</strong>
                    </div><br><br>
                    <div id="metric-sales" class="chart"></div>
                    <header>
                        <h3 class="thin">Today's Total Sales</h3>
                    </header>
                </div>
            </div>
        </div>
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-info">
                <div class="metric-content metric-icon">
                    <div class="value">
                        15,000
                    </div>
                    <div class="trend">
                        <p class="text-danger">
                            <i class="fa fa-chevron-down"></i> 2.3%
                        </p>
                        <strong>Previous 30 Days</strong>
                    </div><br><br>
                    <div id="metric-orders" class="chart"></div>
                    <header>
                        <h3 class="thin">Today's New Membership Revenue</h3>
                    </header>
                </div>
            </div>
        </div>
        <div class="panel hide" style="overflow: hidden;">
            <div id="server-load" class="chart"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-primary">
                <div class="metric-content metric-icon">
                    <div class="value">

                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <header>
                        <h3 class="thin">Ticketing Module</h3>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-success">
                <div class="metric-content metric-icon">
                    <div class="value">

                    </div>
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <header>
                        <h3 class="thin">Parking Module</h3>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-inverse">
                <div class="metric-content metric-icon">
                    <div class="value">

                    </div>
                    <div class="icon">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <header>
                        <h3 class="thin">F & B Module</h3>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="panel panel-metric panel-metric-sm">
            <div class="panel-body panel-body-danger">
                <div class="metric-content metric-icon">
                    <div class="value">

                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <header>
                        <h3 class="thin">Costume & Locker</h3>
                    </header>
                </div>
            </div>
        </div>
    </div>
</div>

-->