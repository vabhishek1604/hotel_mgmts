<?php

namespace app\controllers;
use app\models\Gbookaccount;
use app\models\Sale;
use app\models\Purchaseinvoice;
use app\models\Purchaseinvoiceitems;
use app\models\Saleitems;
use Yii;
use app\models\Actionmaster;
use app\models\ActionmasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * ActionmasterController implements the CRUD actions for Actionmaster model.
 */
class ActionmasterController extends \app\commands\MyController
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

    public function actionCronpurchasedatapush() {
        $pur_invoice = Purchaseinvoice::findBySql("SELECT * from purchase_invoice where is_reviewed=1 and id>=1 and id<=155")->all();
        foreach ($pur_invoice as $pi){
            $model = Purchaseinvoice::findOne($pi->id);
            $total_cgst = 0.0;
            $total_sgst = 0.0;
            $total_igst = 0.0;
            $purchaseinvoiceitems = Purchaseinvoiceitems::find()->where(['invoice_id' => $model->id])->all();
            foreach ($purchaseinvoiceitems as $lists) {
                $total_cgst = $total_cgst + $lists->tax_amt / 2;
                $total_sgst = $total_sgst + $lists->tax_amt / 2;
                $total_igst = $total_igst + $lists->tax_amt;
            }
            Gbookaccount::add_purchase_ledgers_enteries($model, $model->vendor_id, $total_igst, $total_cgst, $total_sgst);
        }
    }
    
    public function actionCronsaledatapush() {
        $sale_invoice = Sale::findBySql("SELECT * from sale where invoice_number is not null and id>=1 and id<=623")->all();
        foreach ($sale_invoice as $s){
            $sale = Sale::findOne($s->id);
            $get_total_amt = Sale::getTotalBillAmt($sale);
            $total_cgst = 0.0;
            $total_sgst = 0.0;
            $total_igst = 0.0;
            $saleitems = Saleitems::find()->where(['sale_id' => $sale->id])->all();
            foreach ($saleitems as $lists) {
                $total_cgst = $total_cgst + $lists->tax_amt / 2;
                $total_sgst = $total_sgst + $lists->tax_amt / 2;
                $total_igst = $total_igst + $lists->tax_amt;
            }
            Gbookaccount::add_sale_ledgers_enteries($sale,$sale->customer_id,$get_total_amt,$total_igst,$total_cgst,$total_sgst);
        }
    }

    /**
     * Lists all Actionmaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActionmasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Actionmaster model.
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
     * Creates a new Actionmaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Actionmaster();
        
        if ($model->load(Yii::$app->request->post())){ 
            //$model->action_url = ($model->action_url!='#')?Url::toRoute($model->action_url):$model->action_url;
//            $model->action_url = $model->action_url;
            $model->addedby = Yii::$app->user->id;
            $model->entrydt = date("Y-m-d H:i:s");
            $model->updated_by = Yii::$app->user->id;
            if($model->save()){
                return $this->redirect(['index']);            
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Actionmaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
            $model->updated_by = Yii::$app->user->id; 
            if($model->save()){
                return $this->redirect(['index']);            
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Actionmaster model.
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
     * Finds the Actionmaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Actionmaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Actionmaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
