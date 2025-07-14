<?php
//echo $params[1];
//if(!empty($params['breadcrumbs'])){
if (isset($params[1])) {
    $type = $params[1];
    //}
} else {
    $type = "dashboard";
}
?>
<section id="col-left" class="col-left-nano">
    <div id="col-left-inner" class="col-left-nano-content">
        <div id="user-left-box" class="clearfix d-none d-lg-block profile2-dropdown">
            <img alt="" style='width: 47px' src="<?php echo Yii::$app->request->baseUrl; ?>/web/images/profile.png" />
            <div class="user-box">
                <span class="dropdown name">
                    <a href="#" class="dropdown-nocaret dropdown-toggle" data-toggle="dropdown">
                        Admin
                    </a>
                </span>
                <span class="status">
                    <i class="fa fa-circle"></i> Online
                </span>
            </div>
        </div>
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                <ul class="nav navbar-nav nav-pills nav-stacked">
                    <li class="nav-header nav-header-first d-none d-lg-block">
                        Navigation
                    </li>
                    <li <?php
                    if ($type == 'dashboard') {
                        echo "class='active'";
                    }
                    ?>>
                        <a href="<?= Yii::$app->urlManager->createUrl(["site/index"]); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                            <!--<span class="badge badge-primary badge-circle float-right">28</span>-->
                        </a>
                    </li>
                 
            
                       <li <?php
                    if ($type == 'patient_view') {
                        echo "class='active'";
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle dropdown-nocaret">
                            <i class="fa fa-users"></i>
                            <span>Patient</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(["patient/create"]); ?>">
                                 <i class="fa fa-plus"></i>
                              Patient Registration
                                </a>
                            </li>   
                            <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(["patient/index"]); ?>">
                                 <i class="fa fa-list-ul"></i>
                              Patient Records
                                </a>
                            </li>   
                            <li>
                            <a href="<?= Yii::$app->urlManager->createUrl(["patientvisit/index"]); ?>">
                                 <i class="fa fa-list-ul"></i>
                              Patient Visit
                                </a>
                            </li>   
              
                         </ul>
                    </li>
                    
                                        <li <?php
                    if ($type == 'opd_view') {
                        echo "class='active'";
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle dropdown-nocaret">
                            <i class="fa fa-stethoscope"></i>
                            <span>OPD</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["opd/index"]); ?>">
                                      <i class="fa fa-list-ul"></i>
                                    OPD Records 
                                </a>
                            </li>   
                     
                         </ul>
                    </li>

                                     <li <?php
                    if ($type == 'ipd_view') {
                        echo "class='active'";
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle dropdown-nocaret">
                            <i class="fa fa-bed"></i>
                            <span>IPD</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["ipd/index"]); ?>">
                                   <i class="fa fa-list-ul"></i>
                                   IPD Records
                                </a>
                                <a href="<?= Yii::$app->urlManager->createUrl(["ipd/dischargeindex"]); ?>">
                                   <i class="fa fa-list-ul"></i>
                                   IPD Records Archives 
                                </a>
                            </li>   
                     
                         </ul>
                    </li>
                    <li <?php
                    if ($type == 'cms') {
                        echo "class='active'";
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle dropdown-nocaret">
                            <i class="fa fa-edit"></i>
                            <span>CMS</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["doctors/index"]); ?>">
                                    Doctors 
                                </a>
                            </li>   
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["floor/create"]); ?>">
                                    Floor 
                                </a>
                            </li>   
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["ward/create"]); ?>">
                                    Ward 
                                </a>
                            </li>   
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["bed/create"]); ?>">
                                    Bed 
                                </a>
                            </li>   
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["investigation/index"]); ?>">
                                    Investigation 
                                </a>
                            </li>   
                            <li>
                                <a href="<?= Yii::$app->urlManager->createUrl(["procedures/index"]); ?>">
                                    Procedures 
                                </a>
                            </li>   
                         </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>