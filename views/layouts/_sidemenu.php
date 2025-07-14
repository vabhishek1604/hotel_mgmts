<?php
//echo $params[1];
//if(!empty($params['breadcrumbs'])){
if (isset($params[1])) {
    $dd = $params[1];
    $active = $params[2];
    //}
} else {
    $dd = "dashboard";
    $active = "";
}

?>

<aside class="sidebar sidebar-default">
    <div class="sidebar-profile">
        <?php if (!empty($comp_logo)) { ?>
        <img class="img-circle profile-image" src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $comp_logo; ?>">
        <?php } ?>
        <!--<img class="img-circle profile-image" src="<?php echo Yii::$app->request->baseUrl; ?>/web/images/logo.png">-->

        <div class="profile-body">
            <h4><?php if (!empty($comp_name)) {
                    echo strtok($comp_name, " ");
                } else {
                    echo 'Super';
                } ?> Admin</h4>

            <div class="sidebar-user-links" style="margin-top: 10px">
                <a class="btn btn-link btn-xs" href="pages-profile.html" data-placement="bottom" data-toggle="tooltip"
                    data-original-title="Profile"><i class="fa fa-user"></i></a>
                <?php if (app\models\Users::getRole() == 'superadmin') { ?>
                <a class="btn btn-link btn-xs" href="<?= Yii::$app->urlManager->createUrl(['purchaseitem/index']) ?>"
                    data-placement="bottom" data-toggle="tooltip" data-original-title="Messages"><i
                        class="fa fa-envelope"></i> <span
                        class="badge badge-up badge-danger badge-large"><?php //echo $item_msg['items'];
                                                                                                                                                                                                                                                                                            ?></span></a>
                <?php } else { ?>
                <a class="btn btn-link btn-xs" href="javascript:;" data-placement="bottom" data-toggle="tooltip"
                    data-original-title="Messages"><i class="fa fa-envelope"></i></a>
                <?php } ?>
                <a class="btn btn-link btn-xs" href="javascript:;" data-placement="bottom" data-toggle="tooltip"
                    data-original-title="Settings"><i class="fa fa-cog"></i></a>
                <a class="btn btn-link btn-xs" href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>"
                    data-placement="bottom" data-toggle="tooltip" data-original-title="Logout"><i
                        class="fa fa-sign-out"></i></a>
            </div>
        </div>
    </div>
    <nav style="min-height:600px;">
        <h5 class="sidebar-header">Navigation</h5>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>" title="Dashboard">
                    <i class="fa fa-lg fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <?php
            if (!empty(Yii::$app->user->id)) {
                if ($user->role == 'admin') {
                    $users_group = \app\models\Usersgroups::findAll(['user_id' => Yii::$app->user->id]);
                    foreach ($users_group as $group) {
                        if ($group->action_rights == 'All') {
                            $actions = \app\models\Actionmaster::findAll(['group_id' => $group->group_id, 'action_type' => 'Main Menu']);
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::findAll(['action_id' => $action->id]);
            ?>
            <li
                class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?> <?php if ($dd == $action->remark) echo 'open active'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-folder <?= $action->action_icon; ?>"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="<?php if ($active == $menu->remark) echo 'active'; ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-circle-o"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        } else {
                            $actions = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Main Menu'])->all();
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Sub Menu', 'action_id' => $action->id])->all();
                            ?>
            <li
                class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?> <?php if ($dd == $action->remark) echo 'open active'; ?> <?php if ($dd == $action->remark) echo 'open active'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-ticket"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="<?php if ($active == $menu->remark) echo 'active'; ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-book"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        }
                    }
                } else if ($user->role == 'user') {
                    $users_group = \app\models\Usersgroups::findAll(['user_id' => Yii::$app->user->id]);
                    foreach ($users_group as $group) {
                        if ($group->action_rights == 'All') {
                            $actions = \app\models\Actionmaster::findAll(['group_id' => $group->group_id, 'action_type' => 'Main Menu']);
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::findAll(['action_id' => $action->id]);
                            ?>
            <li
                class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?> <?php if ($dd == $action->remark) echo 'open active'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-ticket"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="<?php if ($active == $menu->remark) echo 'active'; ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-book"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        } else {
                            $actions = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Main Menu'])->all();
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Sub Menu', 'action_id' => $action->id])->all();
                            ?>
            <li class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-ticket"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-book"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        }
                    }
                } else if ($user->role == 'superadmin') {
                    $users_group = \app\models\Usersgroups::findAll(['user_id' => Yii::$app->user->id]);
                    foreach ($users_group as $group) {
                        if ($group->action_rights == 'All') {
                            $actions = \app\models\Actionmaster::findAll(['group_id' => $group->group_id, 'action_type' => 'Main Menu']);
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::findAll(['action_id' => $action->id]);
                            ?>
            <li
                class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?> <?php if ($dd == $action->remark) echo 'open active'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-ticket"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="<?php if ($active == $menu->remark) echo 'active'; ?>">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-book"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        } else {
                            $actions = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Main Menu'])->all();
                            foreach ($actions as $action) {
                                $sub_menue = \app\models\Actionmaster::find()->where(['in', 'id', [$group->action_rights], 'action_type' => 'Sub Menu', 'action_id' => $action->id])->all();
                            ?>
            <li class="nav-<?php echo !empty($sub_menue) ? 'dropdown' : 'main'; ?>">
                <a href="<?= ($action->action_url == "#") ? $action->action_url : Yii::$app->urlManager->createUrl([$action->action_url]); ?>"
                    title="<?= $action->action_name; ?>">
                    <i class="fa fa-lg fa-fw fa-ticket"></i> <?= $action->action_name; ?>
                </a>
                <ul class="nav-sub">
                    <?php
                                        if (!empty($sub_menue)) {
                                            foreach ($sub_menue as $menu) {
                                        ?>
                    <li class="">
                        <a href="<?= Yii::$app->urlManager->createUrl([$menu->action_url]) ?>"
                            title="<?= $menu->action_name; ?>">
                            <i class="fa fa-fw fa-book"></i> <?= $menu->action_name; ?>
                        </a>
                    </li>
                    <?php
                                            }
                                        }
                                        ?>
                </ul>
            </li>
            <?php
                            }
                        }
                    }
                }
                                ?><?php
                                    if ($user->role == 'superadmin11') {
                                    ?>
            <!--                <li <?php if ($dd == 'dashboard') echo 'active'; ?>">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>" title="Dashboard">
                <i class="fa fa-lg fa-fw fa-home"></i> Dashboard
            </a>
        </li>

        <li class="nav-dropdown <?php if ($dd == 'booking') echo 'open active'; ?>">
            <a href="#" title="Membership">
                <i class="fa fa-lg fa-fw fa-ticket"></i> Tickets
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'booking_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['booking/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-book"></i> WalkIn Ticket
                    </a>
                </li>
                <li class="<?php if ($active == 'booking_memberticket') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['booking/memberticket']) ?>" title="Member Ticket">
                        <i class="fa fa-fw fa-book"></i> Member Ticket
                    </a>
                </li>
                <li class="<?php if ($active == 'booking_bookingreports') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['booking/bookingreports']) ?>" title="Member Ticket">
                        <i class="fa fa-fw fa-book"></i> Booking Reports
                    </a>
                </li>
                <li  class="<?php if ($active == 'booking_returnsecurityamt') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['booking/returnsecurityamt']) ?>" title="Member Ticket">
                        <i class="fa fa-fw fa-book"></i> Ticket Close
                    </a>
                </li>
            </ul>
        </li>
-->
            <!--<li class="nav-dropdown <?php if ($dd == 'purchase_management') echo 'open active'; ?>">
            <a href="#" title="Item Master">
                <i class="fa fa-lg fa-fw fa-rupee"></i> Item Master
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'scales_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['itemscale/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-circle-o"></i> Item Scales
                    </a>
                </li>
                <li class="<?php if ($active == 'purchasecategory_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['purchasecategory/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-circle-o"></i> Item Category
                    </a>
                </li>
                <li class="<?php if ($active == 'purchasesubcategory_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['purchasesubcategory/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-circle-o"></i> Item Sub-Category
                    </a>
                </li>
                <li class="<?php if ($active == 'purchaseitem_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['purchaseitem/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-circle-o"></i> Manage Item
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-dropdown  <?php if ($dd == 'superadmin_purchase_item') echo 'open active'; ?>">
            <a href="#" title="Membership">
                <i class="fa fa-lg fa-fw fa-ticket"></i>Item Access Managment
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'purchaseitem') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['itemaccess/purchaseitem',]) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-book"></i> View Items
                    </a>
                </li>
                <li class="<?php if ($active == 'item_access') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['itemaccess/index']) ?>" title="Alloted Items">
                        <i class="fa fa-fw fa-book"></i>  Alloted Items
                    </a>
                </li>

            </ul>
        </li>-->
            <!--

        <li class="nav-dropdown <?php if ($dd == 'locker') echo 'open active'; ?>">
            <a href="#" title="Membership">
                <i class="fa fa-lg fa-fw fa-lock"></i> Locker
            </a>
            <ul class="nav-sub">

                <li class="<?php if ($active == 'locker_lockerallot') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['bookinglocker/lockerallot']) ?>" title= "Add Locker">
                        <i class="fa fa-fw fa-book"></i> Allot Locker
                    </a>
                </li>
                <li class="<?php if ($active == 'booking_lockerhistory') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['booking/lockerhistory']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-book"></i> Locker History
                    </a>
                </li>
                <li class="<?php if ($active == 'locker_returnlockershow') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['bookinglocker/returnlockershow']) ?>" title= "Add Locker">
                        <i class="fa fa-fw fa-book"></i> Return Locker
                    </a>
                </li>
               
                <li class="<?php if ($active == 'locker_lockerreports') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['bookinglocker/lockerreports']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-book"></i> Locker Reports
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-dropdown  <?php if ($dd == 'member') echo 'open active'; ?>">
            <a href="#" title="Membership">
                <i class="fa fa-lg fa-fw fa-users"></i> Membership
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'member_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['member/index']) ?>" title="Member">
                        <i class="fa fa-fw fa-user"></i> Members
                    </a>
                </li>

                <li class="<?php if ($active == 'membership_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['membershipcard/index']) ?>" title="Membership">
                        <i class="fa fa-fw fa-user"></i> Manage Membership
                    </a>
                </li>
                <li class="<?php if ($active == 'globalpreferences_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['globalpreferences/index']) ?>" title="Membership">
                        <i class="fa fa-fw fa-user"></i> Manage Global Preference
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-dropdown <?php if ($dd == 'employees') echo 'open active'; ?>">
            <a href="#" title="User settings">
                <i class="fa fa-lg fa-fw fa-users"></i> User Settings
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'employees_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['employee/index']) ?>" title="Employee">
                        <i class="fa fa-fw fa-user"></i> Manage Employee
                    </a>
                </li>
                <li class="<?php if ($active == 'users_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['users/index']) ?>" title="User">
                        <i class="fa fa-fw fa-user"></i> Manage User
                    </a>
                </li>
                <li class="<?php if ($active == 'groups_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['groups/index']) ?>" title="Dashboard">
                        <i class="fa fa-fw fa-gears"></i> Manage Group
                    </a>
                </li>
                <li class="<?php if ($active == 'actionmaster_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['actionmaster/index']) ?>" title="Actions">
                        <i class="fa fa-fw fa-gears"></i> Manage Actions
                    </a>
                </li>
                <li class="<?php if ($active == 'users_userrights') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['users/userrights']) ?>" title="Actions">
                        <i class="fa fa-fw fa-gears"></i> Manage User Rights
                    </a>
                </li>
                <li>
                        <a href="analytics-overview.html" title="Analytics Overview">
                                <i class="fa fa-fw fa-caret-right"></i> Analytics Overview
                                <span class="label label-danger pull-right">New</span>
                        </a>
                </li>
            </ul>
        </li>
        <li class="nav-dropdown <?php if ($dd == 'costumes') echo 'open active'; ?> ">
            <a href="#" title="User settings">
                <i class="fa fa-lg fa-fw fa-folder-o"></i> Brands and Costumes
            </a>
            <ul class="nav-sub">
                <li class="<?php if ($active == 'brands_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['brands/index']) ?>" title="Employee">
                        <i class="fa fa-fw fa-user"></i> Manage Brands
                    </a>
                </li>
                <li class="<?php if ($active == 'costumes_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['costumes/index']) ?>" title="User">
                        <i class="fa fa-fw fa-user"></i> Manage Costume
                    </a>
                </li>
         
           
            </ul>
        </li>

        <li class="nav-dropdown <?php if ($dd == 'content') echo 'open active'; ?>">

            <a href="#" title="Content">
                <i class="fa fa-sitemap"></i> Content Management                    </a>
            <ul class="nav-sub">
                 <li class="<?php if ($active == 'barcode_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['barcode/index']) ?>" title="Walkin Ticket">
                        <i class="fa fa-fw fa-qrcode"></i> Manage Barcode
                    </a>
                </li>
                 <li class="<?php if ($active == 'locker_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['locker/index']) ?>" title= "Manage Locker">
                        <i class="fa fa-fw fa-lock"></i> Manage Lockers
                    </a>
                </li>
                <li class="<?php if ($active == 'moduletype_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['moduletype/create']) ?>" title="Module Type">
                        <i class="fa fa-folder-o"></i> Manage Item Module
                    </a>
                </li>
                <li class="<?php if ($active == 'category_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['category/create']) ?>" title="Category">
                        <i class="fa fa-folder-o"></i> Manage Item Category
                    </a>
                </li>
                <li class="<?php if ($active == 'subcategory_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['subcategory/create']) ?>" title="Dashboard">
                        <i class="fa fa-folder-o"></i> Manage Item Subcategory
                    </a>
                </li>
                <li class="<?php if ($active == 'itemscale_create') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['itemscale/create']) ?>" title="Item Scale">
                        <i class="fa fa-folder-o"></i> Manage Item Scale
                    </a>
                </li>
                <li class="<?php if ($active == 'itemmaster_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['itemmaster/index']) ?>" title="Item Master">
                        <i class="fa fa-folder-o"></i> Manage Item Master
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-dropdown <?php if ($dd == 'foods') echo 'open active'; ?>">
            <a href="#" title="Food and ticket">
                <i class="fa fa-lg fa-fw fa-gears"></i> Food and Ticket Content                 </a>
            <ul class="nav-sub">    
                <li class="<?php if ($active == 'onlinefood_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['onlinefood/index']) ?>" title="Online Food">
                        <i class="fa fa-cutlery"></i> Manage Online food
                    </a>
                </li>
                <li class="<?php if ($active == 'ticketmaster_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['ticketmaster/index']) ?>" title="Ticket Master">
                        <i class="fa fa-ticket"></i> Manage Ticket Master
                    </a>
                </li>
                <li class="<?php if ($active == 'ticketoffers_index') echo 'active'; ?>">
                    <a href="<?= Yii::$app->urlManager->createUrl(['ticketoffer/index']) ?>" title="Ticket Offer">
                        <i class="fa fa-ticket"></i> Manage Ticket Offer
                    </a>
                </li>


            </ul>
        </li>-->

            <?php
                                    } elseif ($user->role == 'user') {
                                        if (in_array('Reception', $user->group)) {
                                ?>
            <li class="nav-dropdown">
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-user"></i> Users
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="pages-members.html" title="Members">
                            <i class="fa fa-fw fa-caret-right"></i> Members
                        </a>
                    </li>
                    <li>
                        <a href="pages-profile.html" title="Profile">
                            <i class="fa fa-fw fa-caret-right"></i> Profile
                        </a>
                    </li>
                </ul>
            </li>

            <?php
                                        } else if (in_array('Counter 1', $user->group)) {
                                ?>
            <li class="nav-dropdown">
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-envelope-o"></i> Email
                    <span class="label label-danger pull-right">New</span>
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="email-inbox.html" title="Inbox">
                            <i class="fa fa-fw fa-caret-right"></i> Inbox
                        </a>
                    </li>
                    <li>
                        <a href="email-message.html" title="Message">
                            <i class="fa fa-fw fa-caret-right"></i> Message
                        </a>
                    </li>
                    <li>
                        <a href="email-compose.html" title="Compose">
                            <i class="fa fa-fw fa-caret-right"></i> Compose
                        </a>
                    </li>
                </ul>
            </li>
            <?php
                                        } else {
                                ?>
            <li class="nav-dropdown active open">
                <a href="#" title="Dashboards">
                    <i class="fa fa-lg fa-fw fa-home"></i> Dashboards
                </a>
                <ul class="nav-sub">
                    <li class="active open">
                        <a href="index-2.html" title="Dashboard">
                            <i class="fa fa-fw fa-caret-right"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="analytics-overview.html" title="Analytics Overview">
                            <i class="fa fa-fw fa-caret-right"></i> Analytics Overview
                            <span class="label label-danger pull-right">New</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-user"></i> Users
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="pages-members.html" title="Members">
                            <i class="fa fa-fw fa-caret-right"></i> Members
                        </a>
                    </li>
                    <li>
                        <a href="pages-profile.html" title="Profile">
                            <i class="fa fa-fw fa-caret-right"></i> Profile
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Users">
                    <i class="fa fa-lg fa-fw fa-envelope-o"></i> Email
                    <span class="label label-danger pull-right">New</span>
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="email-inbox.html" title="Inbox">
                            <i class="fa fa-fw fa-caret-right"></i> Inbox
                        </a>
                    </li>
                    <li>
                        <a href="email-message.html" title="Message">
                            <i class="fa fa-fw fa-caret-right"></i> Message
                        </a>
                    </li>
                    <li>
                        <a href="email-compose.html" title="Compose">
                            <i class="fa fa-fw fa-caret-right"></i> Compose
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="UI Elements">
                    <i class="fa fa-lg fa-fw fa-suitcase"></i> UI Elements
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="ui-typography.html" title="Typography">
                            <i class="fa fa-fw fa-caret-right"></i> Typography
                        </a>
                    </li>
                    <li>
                        <a href="ui-buttons.html" title="Buttons">
                            <i class="fa fa-fw fa-caret-right"></i> Buttons
                        </a>
                    </li>
                    <li>
                        <a href="ui-panels.html" title="Panels">
                            <i class="fa fa-fw fa-caret-right"></i> Panels
                        </a>
                    </li>
                    <li>
                        <a href="ui-tabs-accordions.html" title="Tabs & Accordions">
                            <i class="fa fa-fw fa-caret-right"></i> Tabs & Accordions
                        </a>
                    </li>
                    <li>
                        <a href="ui-tooltips-popovers.html" title="Tooltips & Popovers">
                            <i class="fa fa-fw fa-caret-right"></i> Tooltips & Popovers
                        </a>
                    </li>
                    <li>
                        <a href="ui-alerts.html" title="Alerts">
                            <i class="fa fa-fw fa-caret-right"></i> Alerts
                        </a>
                    </li>
                    <li>
                        <a href="ui-components.html" title="Components">
                            <i class="fa fa-fw fa-caret-right"></i> Components
                        </a>
                    </li>
                    <li>
                        <a href="ui-icons.html" title="Icons">
                            <i class="fa fa-fw fa-caret-right"></i> Icons
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Forms">
                    <i class="fa fa-lg fa-fw fa-edit"></i> Forms
                    <span class="label label-warning pull-right">Updated</span>
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="forms-form-layouts.html" title="Form Layouts">
                            <i class="fa fa-fw fa-caret-right"></i> Form Layouts
                        </a>
                    </li>
                    <li>
                        <a href="forms-basic-elements.html" title="Basic Elements">
                            <i class="fa fa-fw fa-caret-right"></i> Basic Elements
                        </a>
                    </li>
                    <li>
                        <a href="forms-advanced-components.html" title="Advanced Components">
                            <i class="fa fa-fw fa-caret-right"></i> Advanced Components
                        </a>
                    </li>
                    <li>
                        <a href="forms-sliders.html" title="Sliders">
                            <i class="fa fa-fw fa-caret-right"></i> Sliders
                        </a>
                    </li>
                    <li>
                        <a href="forms-form-wizards.html" title="Form Wizards">
                            <i class="fa fa-fw fa-caret-right"></i> Form Wizards
                        </a>
                    </li>
                    <li>
                        <a href="forms-form-validation.html" title="Form Validation">
                            <i class="fa fa-fw fa-caret-right"></i> Form Validation
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html" title="Editors">
                            <i class="fa fa-fw fa-caret-right"></i> Editors
                            <span class="label label-danger pull-right">New</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Tables">
                    <i class="fa fa-lg fa-fw fa-th-list"></i> Tables
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="tables-basic-tables.html" title="Basic Tables">
                            <i class="fa fa-fw fa-caret-right"></i> Basic Tables
                        </a>
                    </li>
                    <li>
                        <a href="tables-data-tables.html" title="Data Tables">
                            <i class="fa fa-fw fa-caret-right"></i> Data Tables
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Charts">
                    <i class="fa fa-lg fa-fw fa-bar-chart-o"></i> Charts
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="charts-rickshaw.html" title="Rickshaw Charts">
                            <i class="fa fa-fw fa-caret-right"></i> Rickshaw Charts
                        </a>
                    </li>
                    <li>
                        <a href="charts-flot.html" title="Flot Charts">
                            <i class="fa fa-fw fa-caret-right"></i> Flot Charts
                        </a>
                    </li>
                    <li>
                        <a href="charts-morris.html" title="Morris.js Charts">
                            <i class="fa fa-fw fa-caret-right"></i> Morris.js Charts
                        </a>
                    </li>
                    <li>
                        <a href="charts-sparkline.html" title="Sparkline Charts">
                            <i class="fa fa-fw fa-caret-right"></i> Sparkline Charts
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Maps">
                    <i class="fa fa-lg fa-fw fa-map-marker"></i> Maps
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="maps-google.html" title="Google Maps">
                            <i class="fa fa-fw fa-caret-right"></i> Google Maps
                        </a>
                    </li>
                    <li>
                        <a href="maps-vector.html" title="Vector Maps">
                            <i class="fa fa-fw fa-caret-right"></i> Vector Maps
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Pages">
                    <i class="fa fa-lg fa-fw fa-file-text"></i> Pages
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="pages-search-results.html" title="Basic Tables">
                            <i class="fa fa-fw fa-caret-right"></i> Search Results
                        </a>
                    </li>
                    <li>
                        <a href="pages-sign-in.html" title="Sign In">
                            <i class="fa fa-fw fa-caret-right"></i> Sign In
                        </a>
                    </li>
                    <li>
                        <a href="pages-sign-up.html" title="Sign Up">
                            <i class="fa fa-fw fa-caret-right"></i> Sign Up
                        </a>
                    </li>
                    <li>
                        <a href="pages-404.html" title="404 Page">
                            <i class="fa fa-fw fa-caret-right"></i> 404 Page
                        </a>
                    </li>
                    <li>
                        <a href="pages-500.html" title="500 Page">
                            <i class="fa fa-fw fa-caret-right"></i> 500 Page
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-dropdown">
                <a href="#" title="Menu Levels">
                    <i class="fa fa-lg fa-fw fa-folder-open"></i> Menu Levels
                </a>
                <ul class="nav-sub">
                    <li>
                        <a href="javascript:;" title="Level 2.1">
                            <i class="fa fa-fw fa-file"></i>
                            Level 2.1
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" title="Level 2.2">
                            <i class="fa fa-fw fa-file"></i>
                            Level 2.2
                        </a>
                    </li>
                    <li class="nav-dropdown">
                        <a href="#" title="Level 2.3">
                            <i class="fa fa-fw fa-folder-open"></i>
                            Level 2.3
                            <span class="pull-right badge badge-info">More</span>
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="javascript:;" title="Level 3.1">
                                    <i class="fa fa-fw fa-file"></i>
                                    Level 3.1
                                </a>
                            </li>
                            <li class="nav-dropdown">
                                <a href="#" title="Level 3.2">
                                    <i class="fa fa-fw fa-folder-open"></i>
                                    Level 3.2
                                </a>
                                <ul class="nav-sub">
                                    <li>
                                        <a href="javascript:;" title="Level 4.1">
                                            <i class="fa fa-fw fa-file"></i>
                                            Level 4.1
                                        </a>
                                    </li>
                                    <li class="nav-dropdown">
                                        <a href="#" title="Level 4.2">
                                            <i class="fa fa-fw fa-folder-open"></i>
                                            Level 4.2
                                        </a>
                                        <ul class="nav-sub">
                                            <li class="nav-dropdown">
                                                <a href="#" title="Level 5.1">
                                                    <i class="fa fa-fw fa-folder-open"></i>
                                                    Level 5.1
                                                </a>
                                                <ul class="nav-sub">
                                                    <li>
                                                        <a href="javascript:;" title="Level 6.1">
                                                            <i class="fa fa-fw fa-file"></i>
                                                            Level 6.1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" title="Level 6.2">
                                                            <i class="fa fa-fw fa-file"></i>
                                                            Level 6.2
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:;" title="Level 5.2">
                                                    <i class="fa fa-fw fa-file"></i>
                                                    Level 5.2
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;" title="Level 5.3">
                                                    <i class="fa fa-fw fa-file"></i>
                                                    Level 5.3
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;" title="Level 4.3">
                                            <i class="fa fa-fw fa-file"></i>
                                            Level 4.3
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-dropdown">
                                <a href="#" title="Level 3.3">
                                    <i class="fa fa-fw fa-folder-open"></i>
                                    Level 3.3
                                </a>
                                <ul class="nav-sub">
                                    <li>
                                        <a href="javascript:;" title="Level 4.1">
                                            <i class="fa fa-fw fa-file"></i>
                                            Level 4.1
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>-->
            <li class="disabled">
                <a href="javascript:;" title="Disabled">
                    <i class="fa fa-lg fa-fw fa-th"></i> Disabled
                </a>
            </li>

            <?php
                                        }
                                    }
                                }
                        ?>
        </ul>
    </nav>
</aside>