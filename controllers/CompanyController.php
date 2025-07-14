<?php

namespace app\controllers;

use app\models\Company;
use app\models\CompanySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller {

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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Company();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $path = Yii::$app->basePath . '/web/uploads/';
                if (!is_dir($path))
                    mkdir($path);
                $path = Yii::$app->basePath . '/web/uploads/comp/';
                if (!is_dir($path))
                    mkdir($path);
                $model->company_favicon = UploadedFile::getInstance($model, 'company_favicon');
                $model->company_logo = UploadedFile::getInstance($model, 'company_logo');
                $filename1 = rand(11111, 99999) . '.' . $model->company_favicon->extension;
                $filename2 = rand(11111, 99999) . '.' . $model->company_logo->extension;
                $model->company_favicon->saveAs($path . $filename1);
                $model->company_favicon = '/web/uploads/comp/' . $filename1;
                $model->company_logo->saveAs($path . $filename2);
                $model->company_logo = '/web/uploads/comp/' . $filename2;
                $model->save();
                $msg = 'Company Details has been saved successfully';
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => $msg,
                    'title' => 'SUCCESS',
                    'positonY' => 'top',
                    'positonX' => 'center'
                ]);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $company_logo = $model->company_logo;
        $company_favicon = $model->company_favicon;
        if ($model->load(Yii::$app->request->post())) {
            $model->company_logo = $company_logo;
            $model->company_favicon = $company_favicon;
            if ($model->save()) {
                $path = Yii::$app->basePath . '/web/uploads/';
                if (!is_dir($path))
                    mkdir($path);
                $path = Yii::$app->basePath . '/web/uploads/comp/';
                if (!is_dir($path))
                    mkdir($path);

                $uploadedFile = UploadedFile::getInstance($model, 'company_favicon');
                if (!empty($uploadedFile->extension)) {
                    print_r($uploadedFile);
                    echo $uploadedFile->extension;
                    $uploadedFile->saveAs($path . (rand().'.'.$uploadedFile->extension));
                    die;
//                    if (!empty($model->company_favicon)) {
//                        unlink(Yii::$app->basePath . $company_favicon);
//                    }
                    $filename1 = rand(11111, 99999) . '.' . $uploadedFile->extension;
                    $uploadedFile->saveAs($path . $filename1);
                    $model->company_favicon = '/web/uploads/comp/' . $filename1;
                }
                $uploadedFile1 = UploadedFile::getInstance($model, 'company_logo');
                if (!empty($uploadedFile1->extension)) {
//                    if (!empty($model->company_logo)) {
//                        unlink(Yii::$app->basePath . $company_logo);
//                    }
                    $filename2 = rand(11111, 99999) . '.' . $uploadedFile1->extension;
                    $uploadedFile1->saveAs($path . $filename2);
                    $model->company_logo = '/web/uploads/comp/' . $filename2;
                }
                if ($model->save()) {
                    $msg = 'Company has been uploaded successfully';
                    Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => $msg,
                        'title' => 'SUCCESS',
                        'positonY' => 'top',
                        'positonX' => 'center'
                    ]);
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
