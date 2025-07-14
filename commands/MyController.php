<?php

namespace app\commands;

use app\models\Actionmaster;
use app\models\Usersgroups;
use app\models\Users;
use Yii;

class MyController extends \yii\web\Controller {

    public function init() {
        $this->getUrlAccess();
        parent::init();
    }

    public function getUrlAccess() {
        if (!empty(Yii::$app->user->id)) {
            $user = Users::findOne(Yii::$app->user->id);
            $action_url = Yii::$app->requestedRoute;
            $action_master = Actionmaster::find()->where(['action_url' => $action_url])->andWhere(['type' => 'Private_Url'])->one();
            if (!empty($action_master) && $user->role == 'user') {
                $action_rights_all = Usersgroups::find()->where(['group_id' => $action_master->group_id, 'user_id' => Yii::$app->user->id])->one();
                //$action_rights_comma = Usersgroups::find()->where(['in','action_rights',[$action_master->action_rights],'group_id'=>$action_master->group_id,'user_id'=>Yii::$app->user->id])->one();    
                //$action_rights_comma = Usersgroups::find()->where(['in','action_rights',[$action_master->action_rights],'group_id'=>$action_master->group_id,'user_id'=>Yii::$app->user->id])->one();    
                if (!empty($action_rights_all)) {
                    if ($action_rights_all->action_rights >= 1) {
                        return true;
                    } else if ($action_rights_all->action_rights == 'All') {
                        return true;
                    } else {
                        return $this->home();
                    }
                } else {
                    return $this->home();
                }
            } else if ($user->role == 'admin') {
                return true;
            }
        } else {
            return $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
    }

    public function home() {
//        return $this->redirect(Yii::$app->urlManager->createUrl('site/logout'));
        return $this->redirect(Yii::$app->urlManager->createUrl('site/authorize'));
    }

}
