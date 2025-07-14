<?php

namespace app\controllers;

use Yii;
use app\models\Agriculture;
use app\models\AgricultureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AgricultureController implements the CRUD actions for Agriculture model.
 */
class AgricultureController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionChangestatus()
    {
        $id = $_POST['id'];

        $model = Agriculture::findOne($id);
        $msg = 'fail';
        if (!empty($model)) {
            $model->is_active = $_POST['status'];
            $model->save();
            $msg = "success";
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['msg' => $msg];
    }


    /**
     * Lists all Agriculture models.
     * @return mixed
     */
    public function actionIndex()
    {
        // \Yii::$app->language = 'hi';
        $searchModel = new AgricultureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Agriculture model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // \Yii::$app->language = 'hi';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Agriculture model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $type = 'en';
        if (!empty($_GET['type'])) {
            $type = $_GET['type'];
        }
        if ($type == 'hi') {
            \Yii::$app->language = 'hi';
        } else {
            \Yii::$app->language = 'en';
        }
        $model = new Agriculture();

        if ($model->load(Yii::$app->request->post())) {
            $model->water_source = serialize($model->water_source);
            $model->ownership_type = serialize($model->ownership_type);
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'type' => $type
        ]);
    }

    /**
     * Updates an existing Agriculture model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $type = 'en';
        if (!empty($_GET['type'])) {
            $type = $_GET['type'];
        }
        if ($type == 'en') {
            \Yii::$app->language = 'en';
        } else {
            \Yii::$app->language = 'hi';
        }
        // \Yii::$app->language = 'hi';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->water_source = serialize($model->water_source);
            $model->ownership_type = serialize($model->ownership_type);
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Agriculture model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Agriculture model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agriculture the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agriculture::findOne($id)) !== null) {
            $model->water_source = unserialize($model->water_source);
            $model->ownership_type = unserialize($model->ownership_type);

            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}