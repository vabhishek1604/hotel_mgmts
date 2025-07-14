<?php

namespace app\controllers;

use app\models\ProjectAvailabilities;
use app\models\ProjectImages;
use app\models\ProjectImagesSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProjectimgController implements the CRUD actions for ProjectImages model.
 */
class ProjectimgController extends Controller {

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
     * Lists all ProjectImages models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProjectImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectImages model.
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
     * Creates a new ProjectImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ProjectImages();

        if ($model->load(Yii::$app->request->post())) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/propertyimage/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $project_id = ProjectAvailabilities::findOne($model->pimg_propid);
            $model->pimg_projid = $project_id->avail_projid;
            $uploadedFile = UploadedFile::getInstance($model, 'pimg_url');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->pimg_url = '/web/uploads/propertyimage/' . $fileName;
            $model->pimg_addedby = Yii::$app->user->id;
            $model->pimg_entrydt = date('Y-m-d H:i:s');
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
     * Updates an existing ProjectImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $pimg_url = $model->pimg_url;
        if ($model->load(Yii::$app->request->post())) {
            $model->pimg_url = $pimg_url;
            if ($model->save()) {
                $path = Yii::$app->basePath . '/web/uploads/';
                if (!is_dir($path))
                    mkdir($path);
                $path = Yii::$app->basePath . '/web/uploads/propertyimage/';
                if (!is_dir($path))
                    mkdir($path);
                $rnd = time();
                $uploadedFile = UploadedFile::getInstance($model, 'pimg_url');
                if (!empty($uploadedFile->baseName)) {
                    if (!empty($pimg_url)) {
                        unlink(Yii::$app->basePath . $pimg_url);
                    }
                    $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                    $model->pimg_url = '/web/uploads/propertyimage/' . $fileName;
                    if ($model->save()) {
                        $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
                        return $this->redirect(['index']);
                    }
                }
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if (!empty($model->pimg_url)) {
            unlink(Yii::$app->basePath . $model->pimg_url);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ProjectImages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
