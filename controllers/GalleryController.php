<?php

namespace app\controllers;

use app\models\Gallery;
use app\models\GallerySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller {

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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Gallery();
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/gallery/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'image');
            if (!empty($uploadedFile->baseName)) {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = '/web/uploads/gallery/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            }
            if ($model->save()) {
                return $this->redirect(['create']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Gallery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/gallery/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'image');
            if (!empty($uploadedFile->baseName)) {
                if (!empty($image)) {
                    unlink(Yii::$app->basePath . $image);
                }
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = '/web/uploads/gallery/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            } else {
                $model->image = $image;
            }
            if ($model->save()) {
                return $this->redirect(['create']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if (!empty($model->image)) {
            unlink(Yii::$app->basePath . $model->image);
        }
        $model->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
