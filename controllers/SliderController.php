<?php

namespace app\controllers;

use app\models\Slider;
use app\models\SliderSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller {

    /**
     * {@inheritdoc}
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

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Slider();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/slider/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'slid_url');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->slid_url = '/web/uploads/slider/' . $fileName;
            $model->slid_addedby = Yii::$app->user->id;
            $model->slid_entrydt = date('Y-m-d H:i:s');
            if ($model->save()) {
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $slid_url = $model->slid_url;

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/slider/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'slid_url');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->slid_url = '/web/uploads/slider/' . $fileName;
            $model->slid_addedby = Yii::$app->user->id;
            $model->slid_entrydt = date('Y-m-d H:i:s');
            if ($model->save()) {
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if (!empty($model->slid_url)) {
            unlink(Yii::$app->basePath . $model->slid_url);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
