<?php

namespace app\controllers;

use Yii;
use app\models\PropAmenities;
use app\models\Property;
use app\models\PropertySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PropertyController implements the CRUD actions for Property model.
 */
class PropertyController extends Controller
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

        $model = Property::findOne($id);
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
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Property model.
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
        $model = new Property();

        if ($model->load(Yii::$app->request->post())) {
            $model->amenities_ids = $_POST['Property']['amenities_ids'];
            $model->water_source = serialize($model->water_source);
            $model->types = $model->types;
            if ($model->save()) {
                if (!empty($model->amenities_ids)) {
                    foreach ($model->amenities_ids as $k => $v) {
                        if (!empty($v)) {
                            $am_model = new PropAmenities();
                            $am_model->amenities_id = $v;
                            $am_model->property_id = $model->id;
                            $am_model->save();
                        }
                    }
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'type' => $type
        ]);
    }

    /**
     * Updates an existing Property model.
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->amenities_ids = $_POST['Property']['amenities_ids'];
            $model->water_source = serialize($model->water_source);
            $model->types = $model->types;
            if ($model->save()) {
                if (!empty($model->amenities_ids)) {
                    foreach ($model->amenities_ids as $k => $v) {
                        if (!empty($v)) {
                            $exist_prop_am = PropAmenities::find()
                                ->where(['property_id' => $model->id])
                                ->andWhere(['amenities_id' => $v])
                                ->one();
                            if (empty($exist_prop_am)) {
                                $am_model = new PropAmenities();
                                $am_model->amenities_id = $v;
                                $am_model->property_id = $model->id;

                                $am_model->save();
                            }
                        }
                    }
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [

            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Property model.
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
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne($id)) !== null) {
            $model->water_source = unserialize($model->water_source);
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}