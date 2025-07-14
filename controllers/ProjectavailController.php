<?php

namespace app\controllers;

use app\models\Project;
use app\models\ProjectAvailabilities;
use app\models\ProjectAvailabilitiesSearch;
use app\models\Users;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProjectavailController implements the CRUD actions for ProjectAvailabilities model.
 */
class ProjectavailController extends Controller
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
     * Lists all ProjectAvailabilities models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectAvailabilitiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectAvailabilities model.
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
     * Creates a new ProjectAvailabilities model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectAvailabilities();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $project = Project::findOne($model->avail_projid);
            $str = $model->avail_title.' in '.$project->proj_city.' '.$project->proj_state;
            $model->avail_slug = Users::toSlug($str);
            $model->save();
            return $this->redirect(['view', 'id' => $model->avail_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectAvailabilities model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $amenities = !empty($_POST['ProjectAvailabilities']['avail_other_features'])?implode(",",$_POST['ProjectAvailabilities']['avail_other_features']):"";
            $project = Project::findOne($model->avail_projid);
            $str = $model->avail_title.' in '.$project->proj_city.' '.$project->proj_state;
            $model->avail_slug = Users::toSlug($str);
            $model->avail_other_features = $amenities;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectAvailabilities model.
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
     * Finds the ProjectAvailabilities model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectAvailabilities the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectAvailabilities::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
