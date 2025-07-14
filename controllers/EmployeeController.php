<?php

namespace app\controllers;

use Yii;
use app\models\Employee;
use app\models\Biometricattendance;
use app\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionShowtime()
    {

        return $this->render('showtime', []);
    }

    public function actionAttendance()
    {
        $month = date('n');
        $year = date('Y');
        $devicelogs = 'DeviceLogs_' . $month . '_' . $year;
        $serverName = "ANURAJ";

        $db = array("Database" => "etimetracklite1");

        $conn = sqlsrv_connect($serverName, $db);

        // if ($conn) {
        //     echo "Connection established.<br />";
        // } else {
        //     echo "Connection could not be established.<br />";
        // }
        $sql = "SELECT TOP (1000) [DeviceLogId]
      ,[DownloadDate]
      -- ,[isUpdated]
      -- ,[DeviceId]
      ,[UserId]
      ,[LogDate]
    --   ,[Direction]
    --   ,[AttDirection]
      ,[C1]
    --   ,[C2]
    --   ,[C3]
    --   ,[C4]
    --   ,[C5]
    --   ,[C6]
    --   ,[C7]
    --   ,[WorkCode]
    --   ,[UpdateFlag]
    --   ,[IsApproved]
    --   ,[EmployeeImage]
    --   ,[FileName]
    --   ,[Longitude]
    --   ,[Latitude]
      ,[CreatedDate]
      ,[LastModifiedDate]
    --   ,[LocationAddress]
    --   ,[BodyTemperature]
    --   ,[IsMaskOn]
  FROM [etimetracklite1].[dbo].[$devicelogs] WHERE isUpdated is Null";


        $stmt = sqlsrv_query($conn, $sql);

        while ($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            \print_r($obj);
            $dv_llg = $obj['DeviceLogId'];
            $user_id = $obj['UserId'];
            $type = $obj['C1'];
            $LogDate = $obj['LogDate']->format('Y-m-d H:i:s');
            $CreatedDate = $obj['CreatedDate']->format('Y-m-d H:i:s');
            // $url = "https://cicspro.in/edusol/site/attendance?";
            $current_date = date('Y-m-d');
            // $post_data = "user_id=$user_id";
            // $post_data = $post_data . "&type=$type";
            // $post_data = $post_data . "&log_date=$LogDate";
            // $post_data = $post_data . "&created_date=$CreatedDate";
            // $post_data = $post_data . "&current_dated=$current_date";
            // $res = \app\models\Users::submit_post($url, $post_data);

            //print_r($res);
            // if (!empty($res)) {

            $model = new Biometricattendance();
            $model->user_id = $user_id;
            $model->type = $type;
            $model->log_date = $LogDate;
            $model->created_date = $CreatedDate;
            $model->current_dated = $current_date;
            if ($model->save()) {
                echo 'success';
            }
            $sql1 = 'UPDATE [etimetracklite1].[dbo].[' . $devicelogs . '] SET isUpdated = 1 WHERE DeviceLogId = ' . $dv_llg;
            sqlsrv_query($conn, $sql1);
            // }
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    }
    /**
     * Displays a single Employee model.
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
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employee model.
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
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}