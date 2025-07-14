<?php

namespace app\controllers;

use app\models\Testslider;
use app\models\TestsliderSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * TestsliderController implements the CRUD actions for Testslider model.
 */
class TestsliderController extends Controller
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
     * Lists all Testslider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TestsliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Testslider model.
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
     * Creates a new Testslider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Testslider();

        if ($model->load(Yii::$app->request->post())) {
            $path = Yii::$app->basePath . '/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath . '/web/uploads/test_slider/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time();
            $model->attributes = Yii::$app->request->post();
            $uploadedFile = UploadedFile::getInstance($model, 'slide_image');
            if (!empty($uploadedFile->baseName)) {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->slide_image = '/web/uploads/test_slider/' . $fileName;
                $uploadedFile->saveAs($path . $fileName);  // image will uplode to rootDirectory/banner/
            }
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Testslider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $slide_image = $model->slide_image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uploadedFile = UploadedFile::getInstance($model, 'slide_image');
            if (!empty($uploadedFile)) {
                if (!empty($slide_image)) {
                    unlink(Yii::$app->basePath . $slide_image);
                }
                $rnd = time();
                $model->attributes = Yii::$app->request->post();
                $path = Yii::$app->basePath . '/web/uploads/test_slider/';
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->slide_image = '/web/uploads/test_slider/' . $fileName;
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
     * Deletes an existing Testslider model.
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
     * Finds the Testslider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Testslider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testslider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
