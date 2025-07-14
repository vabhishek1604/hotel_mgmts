<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\Usersgroups;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Actionmaster;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionSignin() {
        $this->layout = 'main_login';
        $type = Yii::$app->request->get('type');
        $model = new \app\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->sendToHome();
        }
        if (!Yii::$app->user->isGuest) {
            $this->sendToHome();
        }
        return $this->render('signin', [
                    'model' => $model,
                    'type' => $type,
        ]);
    }

    public function actionDashboard() {
        return $this->render('dashboard', [
        ]);
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsersSearch();
        $comp_id = Users::getCompanyId();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Users::getRole() == 'superadmin'){}else{
        $dataProvider->query->andWhere("comp_id=$comp_id");
        }
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            foreach ($_POST['group'] as $grp) {
//                $group = new Usersgroups();
//                $group->user_id = $model->id;
//                $group->group_id = $grp;
//                $group->save();
//            }
            return $this->redirect(['create']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            foreach ($_POST['group'] as $grp) {
//                $check_group = Usersgroups::findOne(['user_id' => $model->id, 'group_id' => $grp]);
//                $group = new Usersgroups();
//                $group->user_id = $model->id;
//                $group->group_id = $grp;
//                if (empty($check_group)) {
//                    $group->save();
//                }
//            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionUserrights() {
        $model = new Usersgroups();

        if ($model->load(Yii::$app->request->post())) {
            $model->action_rights = Yii::$app->request->post('rights');
            if($model->save()){
                return $this->redirect(['userrights']);
            }
        }

        return $this->render('userrights', [
                    'model' => $model,
        ]);
    }
    
    public function actionGetactions() {
        $group_id = $_POST['group_id'];
        $user_id = $_POST['user_id'];
        $actions = Actionmaster::findAll(['group_id'=>$group_id]);
        return $this->renderPartial('_rights', [
                    'actions' => $actions,
                    'user_id' => $user_id,
        ]);
    }

    public function actionSaveuserrights() {
        $model = new Usersgroups();

        if ($model->load(Yii::$app->request->post())) {
            $model->action_rights = Yii::$app->request->post('action_rights');
            if($model->save()){
                //return $this->redirect(['userrights']);
                return true;
            }
        }
    }
    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
