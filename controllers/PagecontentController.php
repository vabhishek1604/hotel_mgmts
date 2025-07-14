<?php

namespace app\controllers;

use app\models\Pagecontent;
use app\models\PagecontentSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * PagecontentController implements the CRUD actions for Pagecontent model.
 */
class PagecontentController extends Controller
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
     * Lists all Pagecontent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagecontentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagecontent model.
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
     * Creates a new Pagecontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagecontent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {            
            $path = Yii::$app->basePath.'/web/uploads/';
            if (!is_dir($path))
                mkdir($path);
            $path = Yii::$app->basePath.'/web/uploads/pagecontent/';
            if (!is_dir($path))
                mkdir($path);
            $rnd = time(); 		
            $uploadedFile=UploadedFile::getInstance($model,'cont_image');
            if($uploadedFile!=''){
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->cont_image = '/web/uploads/pagecontent/'.$fileName;	
                $model->cont_entrydt = date('Y-m-d H:i:s');			
                if($model->save()){
                    $uploadedFile->saveAs($path.$fileName);  // image will uplode to rootDirectory/banner/
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pagecontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cont_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pagecontent model.
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
     * Finds the Pagecontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagecontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagecontent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
