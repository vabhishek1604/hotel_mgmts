<?php

namespace app\controllers;

use app\models\Saraimages;
use app\models\SaraimagesSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * SaraimagesController implements the CRUD actions for Saraimages model.
 */
class SaraimagesController extends Controller
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
     * Lists all Saraimages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaraimagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Saraimages();

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/sara/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'image');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = '/web/uploads/sara/' . $fileName;
            if ($model->save()) {
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
                return $this->redirect(['index']);
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Saraimages model.
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
     * Creates a new Saraimages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Saraimages();

          if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/sara/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'image');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image = '/web/uploads/sara/' . $fileName;
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
     * Updates an existing Saraimages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $slide_image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uploadedFile = UploadedFile::getInstance($model, 'image');
            if (!empty($uploadedFile)) {
                if (!empty($image)) {
                    unlink(Yii::$app->basePath . $image);
                }
                $rnd = time();
                $model->attributes = Yii::$app->request->post();
                $path = Yii::$app->basePath . '/web/uploads/sara_images/';
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->image = '/web/uploads/sara_images/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);
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
     * Deletes an existing Saraimages model.
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
     * Finds the Saraimages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Saraimages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saraimages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
