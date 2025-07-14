<section id="col-left" class="col-left-nano">
    <div id="col-left-inner" class="col-left-nano-content">
        <div id="user-left-box" class="clearfix d-none d-lg-block profile2-dropdown well">
            <img alt="" src="<?php echo Yii::$app->request->baseUrl; ?>/web/images/profile.png" />
            <div class="user-box">
                <span class="dropdown name">
                    <a href="#" class="dropdown-nocaret dropdown-toggle" data-toggle="dropdown">
                        <?= $user->username; ?>
                    </a>
                    <br>
                    
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
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(["incharge/dashboard"]); ?>">
                            <i class="fa fa-dashboard fa-2x"></i><span>Dashboard</span>
                            <!--<span class="badge badge-primary badge-circle float-right">28</span>-->
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(["incharge/demand"]); ?>">
                            <i class="fa fa-rupee fa-2x"></i><span>Demand Budget</span>
                            <!--<span class="badge badge-primary badge-circle float-right">28</span>-->
                        </a>
                    </li>
                      <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(["incharge/viewmydemand"]); ?>">
                            <i class="fa fa-eye"></i>
                            <span>View Demand Budget</span>                        
                        </a>
                    </li>
                      <hr>
                  
                     <hr>
           

                </ul>
            </div>
        </div>
    </div>
</section>