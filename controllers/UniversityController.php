<?php

namespace app\controllers;

use Yii;
use app\models\University;
use app\models\UniversitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends Controller
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

    /**
     * Lists all University models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new University();
        $searchModel = new UniversitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post())) {

            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/university/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'st_image');
            if (!empty($uploadedFile->baseName)) {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->st_image = '/web/uploads/university/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            }

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single University model.
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
     * Creates a new University model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new University();
        $searchModel = new UniversitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile = UploadedFile::getInstance($model, 'st_image');
            print_r($uploadedFile);
            exit();
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/university/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'st_image');
            if (!empty($uploadedFile->baseName)) {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->st_image = '/web/uploads/university/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            }

            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing University model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $slide_image = $model->st_image;

        if ($model->load(Yii::$app->request->post())) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/university/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'st_image');
            if (!empty($uploadedFile->baseName)) {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->st_image = '/web/uploads/university/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing University model.
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
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return University the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
