<?php

namespace app\controllers\publics;

use Yii;
use app\models\Booking;
use app\models\Bookingitems;
use app\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use DateTime;
use app\models\Globalpreferences;
use app\models\Users;
use app\models\Memberledger;
use app\models\Bookingcostume;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller {

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
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCheckpublic() {
          return $this->render('checkpublic');
    }

    /**
     * Displays a single Booking model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionBookingreports() {
        return $this->render('bookingreports');
    }

    public function actionShowreports() {

        $date = isset($_GET['date']) ? $_GET['date'] : '';
        $mobile_no = isset($_GET['mobile_no']) ? $_GET['mobile_no'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $str = "select * from booking ";
        if (!empty($date) && empty($name) && empty($mobile_no)) {
            $str .=" where book_date ='$date' ";
        } else if (!empty($mobile_no) && empty($name) && empty($date)) {
            $str .=" where customer_mno ='$mobile_no'";
        } else if (!empty($name) && empty($mobile_no) && empty($date)) {
            $str .=" where customer_name like '%$name%'";
        } else if (!empty($date) && !empty($mobile_no)) {
            $str .=" where book_date ='$date' and customer_mno ='$mobile_no'";
        } else if (!empty($name) && !empty($mobile_no)) {
            $str .=" customer_mno ='$mobile_no' and customer_name like '%$name%'";
        } else if (!empty($name) && !empty($date)) {
            $str .=" where book_date ='$date' and customer_name like '%$name%'";
        } else if (!empty($name) && !empty($date) && !empty($mobile_no)) {
            $str .=" where customer_mno ='$mobile_no' and book_date ='$date' and customer_name like '%$name%'";
        }

        //  echo $str;
        $bookingdata = Yii::$app->db->createCommand($str)->queryAll();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['bookingdata' => $bookingdata];
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = 'main';
        $model = new Booking();
        $model->user_type = 'walkin';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    //Member ticket form
    public function actionMemberticket() {
        $this->layout = 'main';
        return $this->render('member_ticket', []);
    }

    //
    public function actionMobilenocheck() {
        $mobile_no = $_POST['memberno'];
        if (!empty($mobile_no)) {
            $memberdata = \app\models\Member::find()->where(['mobile_no' => $mobile_no])->all();
            foreach ($memberdata as $data) {
                if (!empty($memberdata)) {
                    $pin = Booking::generatePIN();
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return $model = ['pin' => $pin, 'memberdata' => $data->first_name, 'member_id' => $data->id];
                }
            }
        }
    }

    public function actionMembercode() {
        $verificationcode = $_POST['verificationcode'];
        $membercode = $_POST['membercode'];
        if ($verificationcode == $membercode) {
//            echo "Succes Code Matched";
            return $this->redirect(['create']);
        } else {

            echo "varification code cannot matched";
        }
    }

// Ticket Print Action
    public function actionTicketprint($id, $nooflocar) {
        $print_ticket = \app\models\Booking::find()->where(['id' => $id])->all();
        $print_item = \app\models\Bookingitems::find()->where(['booking_id' => $id])->all();
        $print_locker = \app\models\Bookinglocker::find()->select('locker_no')->where(['booking_id' => $id])->column();
        $print_locker = implode(",", $print_locker);
        $security_amount = Globalpreferences::getValueByParamName("security_amount");
        $locker_price = Globalpreferences::getValueByParamName("locker_price");
        $costume_price = Globalpreferences::getValueByParamName("costume_price");

        return $this->renderPartial('_print_ticket', [
                    'print_ticket' => $print_ticket,
                    'print_item' => $print_item,
                    'print_locker' => $print_locker,
                    'security_amount' => $security_amount,
                    'locker_price' => $locker_price,
                    'costume_price' => $costume_price,
                    'nooflocar' => $nooflocar
        ]);
    }

    // Use below method to get dynamic price in back and front both.
    protected function getTicketPriceDetails($user_type, $offer_date, $price_type) {
        $model = \app\models\Ticketmaster::find()->where(['user_type' => $user_type, 'price_type' => $price_type])->all();
        $all_data = [];
        foreach ($model as $td) {
            if (!empty($user_type)) {
                $data = Yii::$app->db->createCommand("Select ticket_master_id as id,final_price as price From ticket_offer where ticket_master_id= $td->id and date_to >= '$offer_date' and date_from <= '$offer_date'")
                        ->queryOne();

                if (empty($data)) {
                    $data = Yii::$app->db->createCommand("Select id,price From ticket_master where id= $td->id ")->queryOne();
                    $all_data[] = $data;
                } else {
                    $all_data[] = $data;
                }
            }
        }
        return $all_data;
    }

    public function actionCheckvalue() {
        $user_type = 'walkin';
        $price_type = $_GET['selvalue'];
        $date = $_GET['date'];
        $member_id = $_GET['member_id'];
        $offer_date = $date = DateTime::createFromFormat('d-M-Y', $date)->format('Y-m-d');

        $all_data = $this->getTicketPriceDetails($user_type, $offer_date, $price_type);
//        print_r($all_data);
        return $this->renderPartial('_walkin_customer_view', [
                    'data' => $all_data,
                    'date' => $date,
                    'user_type' => $user_type,
                    'member_id' => $member_id,
        ]);
    }

    public function actionAddamount() {
        $member_id = $_POST['member_id'];
        $totalamount = $_POST['amount'];
        $payment_type = $_POST['payment_type'];
        $transaction_no = $_POST['transaction_no'];
        $description = $_POST['description'];
        $booking_id = '';

        $this->savePaymentAmount($booking_id, $member_id, $payment_type, $transaction_no, $description, $totalamount);
    }

    protected function savePaymentAmount($booking_id, $member_id, $payment_type, $transaction_no, $description, $totalamount) {
        if (!empty($totalamount)) {
            $ticketTotal_amount = new \app\models\Paymenthistory();
            $ticketTotal_amount->ref_id = $booking_id;
            $ticketTotal_amount->member_id = $member_id;
            $ticketTotal_amount->payment_type = $payment_type;
            $ticketTotal_amount->payment_date = date('Y-m-d H:i:s');
            $ticketTotal_amount->payment_status = 'paid';
            $ticketTotal_amount->payment_request_id = $transaction_no;
            $ticketTotal_amount->description = $description;
            $ticketTotal_amount->amount = $totalamount;
            $ticketTotal_amount->created_by = Users::userId();
            ;
            $ticketTotal_amount->created_at = date('Y-m-d H:i:s');
            if ($ticketTotal_amount->save()) {
                $ticket_amount = 0;
                if (!empty($booking_id)) {
                    Memberledger::walletAmountIn($member_id, $ticketTotal_amount->id, $totalamount, $booking_id);
                    Memberledger::walletAmountOut($member_id, $ticketTotal_amount->id, $totalamount, $booking_id);
                } else {
                    Memberledger::walletAmountIn($member_id, $ticketTotal_amount->id, $totalamount, $booking_id);
                }
            }
        }
    }

    protected function saveLockerInfo($booking_id, $member_id, $locker_nos, $price) {
        if (!empty($locker_nos)) {
            $locker_nos = explode(",", $locker_nos);
            foreach ($locker_nos as $lc) {
                if (!empty($lc)) {
//                print_r($lc);
                    $locker = new \app\models\Bookinglocker();
                    $locker->booking_id = $booking_id;
                    $locker->member_id = $member_id;

                    $locker->locker_no = $lc;
                    $locker->price = $price;
                    $locker->total_amt = $price;
                    $locker->save();
                }
            }
        }
    }

    public function actionAddbooking() {
        $locker_price = Globalpreferences::getValueByParamName("locker_price");
        $security_amount = Globalpreferences::getValueByParamName("security_amount");
        $tax_amt = Globalpreferences::getValueByParamName("tax_amt");
        $booking_no = Booking::generateCode_booking();
        $id = $_POST['id'];
        $price = $_POST['price'];
        $nooflocar = $_POST['nooflocar'];
        $noofcostume = $_POST['no_of_costume'];
        $securty_amt = $security_amount;
        $lockerprice = $locker_price;
        $user_type = $_POST['user_type'];
        $member_id = $_POST['member_id'];
        $mobile_no = $_POST['mobileno'];
        $name = $_POST['nameid'];

        $offer_date = $_POST['booking_date'];
//        $offer_date = $booking_date = DateTime::createFromFormat('d-M-Y', $booking_date)->format('Y-m-d');
        //          **********------Payment data--------*********

        $payment_type = $_POST['payment_type'];
        $transaction_no = $_POST['transaction_no'];
        $description = $_POST['description'];
        $costume_price = Globalpreferences::getValueByParamName("costume_price");
        $locker_price = Globalpreferences::getValueByParamName("locker_price");
        if (!empty(array_filter($price))) {

            $booking = new Booking();
            $booking->booking_no = Booking::generateCode_booking(); //need to make a function to auto genrate

            $booking->book_from = 'offline';
            $booking->member_id = $member_id;
            $booking->book_date = $offer_date;
            $booking->book_time = date('H:i:s');
            $booking->payment_status = 'paid';
            $booking->customer_name = $name;
            $booking->customer_mno = $mobile_no;
            $locker_security = $booking->locker_security_amt = $nooflocar * $security_amount;
            $costume_security = $booking->costume_security_amt = $noofcostume * $security_amount;
            $booking->locker_amount = $locker_price;
            $booking->costume_amount = $costume_price;
            $booking->security_amt_status = 'paid';
            $booking->no_of_locker = $nooflocar;
            $booking->no_of_costume = $noofcostume;
            $booking->security_pin = Booking::generatePIN();
            $booking->created_by = Users::userId();
            ;
            $booking->created_at = date('Y-m-d H:i:s');

            if ($booking->save()) {
                $sub_total_price = 0;


                foreach ($price as $k => $v) {

                    //$no_of_person += $v;

                    if (!empty($v)) {
                        $data = Yii::$app->db->createCommand("Select ticket_master_id as id,final_price as price From ticket_offer where ticket_master_id= $k and date_to >= '$offer_date' and date_from <= '$offer_date'")
                                ->queryOne();
                        if (empty($data)) {
                            $data = Yii::$app->db->createCommand("Select id,price From ticket_master where id= $k ")->queryOne();
                        }
                        //Save Booking items
//                        print_r($data)

                        $ticket_type = \app\models\Ticketmaster::findOne($data['id'])->ticket_type;
                        $bookingitem = new Bookingitems();
                        $bookingitem->booking_id = $booking->id;
                        $bookingitem->ticket_type = $ticket_type;
                        $bookingitem->member_id = $member_id;
                        $bookingitem->total_person = $v;
                        $bookingitem->price = $data['price'];


                        $sub_total_price += $v * $data['price'];


                        $total_tax = (($sub_total_price * $tax_amt) / 118);
                        $total_price = $sub_total_price - $total_tax;
                        $bookingitem->tax_percent = $tax_amt; //add total for 
                        $bookingitem->tax_amt = $total_tax; //add total for 
                        $bookingitem->total_amt = $total_price; //add total for 
                        $bookingitem->save();
                    }
                }//foreach 
                //print Barcode
//                print_r($locker_security.'-'.$costume_security.'-'.$locker_price * $nooflocar.'-'.$costume_price * $noofcostume.'-'.$sub_total_price.'-');
                $total_grand_price = $locker_security + $costume_security + ($locker_price * $nooflocar) + ($costume_price * $noofcostume) + $sub_total_price;

                $this->savePaymentAmount($booking->id, $booking->member_id, $payment_type, $transaction_no, $description, $total_grand_price);

                $print_ticket = \app\models\Booking::find()->where(['id' => $booking->id])->all();
                $print_item = \app\models\Bookingitems::find()->where(['booking_id' => $booking->id])->all();
                $print_locker = \app\models\Bookinglocker::find()->select('locker_no')->where(['booking_id' => $booking->id])->column();
                $print_locker = implode(",", $print_locker);
                $security_amount = Globalpreferences::getValueByParamName("security_amount");
                $locker_price = Globalpreferences::getValueByParamName("locker_price");
                $costume_price = Globalpreferences::getValueByParamName("costume_price");
                return $this->renderPartial('_print_ticket', [
                            'print_ticket' => $print_ticket,
                            'print_item' => $print_item,
                            'print_locker' => $print_locker,
                            'security_amount' => $security_amount,
                            'locker_price' => $locker_price,
                            'costume_price' => $costume_price,
                            'booking_id' => $booking->id,
                            'mobile_no' => $mobile_no,
                            'name' => $name,
//                    'nooflocar' => $nooflocar
                ]);
            } //save 
        }
    }

//Walkin member Save and check 

    public function actionSavebarcode() {

        $booking_id = $_POST['booking_id'];
        $barcode = $_POST['barcode'];
//        if (!empty($barcode)) {
        $barcode_data = Yii::$app->db->createCommand("Select id From barcode where barcode_no= $barcode")
                ->queryOne();
        $barcodefind = \app\models\Barcode::findOne($barcode_data['id']);
        $barcodefind->is_running = 0;
        if ($barcodefind->save()) {
            $model = $this->findModel($booking_id);
            $model->book_barcode = $barcode;
            $model->save();
//            }
        }
    }

    public function actionSavewalkin() {
        $mobileno = $_POST['mobileno'];
        $name = $_POST['nameid'];
        $member = new \app\models\Member();
        $member->member_type = 'Walkin';
        $member->first_name = $name;

        $member->mobile_no = $mobileno;
        $member->save();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['memberid' => $member->id];
    }

    public function actionLockerhistory() {
        return $this->render('locker_history', []);
    }

    public function actionCurrentbooking() {
        return $this->render('booking_history', [
        ]);
    }

    public function actionCheckbooking() {
        if (empty($_GET['date'])) {
            $currentdate = date("Y-m-d");
        } else {
            $currentdate = $_GET['date'];
        }
//      $currentdate = isset($_GET['date'])?$_GET['date']:date("Y-m-d");
        $booking_no = isset($_GET['booking_no']) ? $_GET['booking_no'] : '';
        $mobileno = isset($_GET['mobilno']) ? $_GET['mobilno'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        if (!empty($currentdate)) {
            $bookingdata = Yii::$app->db->createCommand("SELECT b.book_barcode,b.id,bl.status,b.booking_no,b.book_date,b.payment_status,b.no_of_locker,b.customer_name,b.customer_mno, GROUP_CONCAT(bl.locker_no) as lockers FROM booking_locker bl JOIN booking b ON b.id = bl.booking_id where book_date ='$currentdate' GROUP BY bl.booking_id")->queryAll();
        }
        if ($booking_no) {
            $bookingdata = Yii::$app->db->createCommand("SELECT b.book_barcode,b.id,bl.status,b.booking_no,b.book_date,b.payment_status,b.no_of_locker,b.customer_name,b.customer_mno, GROUP_CONCAT(bl.locker_no) as lockers FROM booking_locker bl JOIN booking b ON b.id = bl.booking_id where book_date ='$currentdate' AND booking_no= '$booking_no' GROUP BY bl.booking_id")->queryAll();
        }
        if ($mobileno) {
            $bookingdata = Yii::$app->db->createCommand("SELECT b.book_barcode,b.id,bl.status,b.booking_no,b.book_date,b.payment_status,b.no_of_locker,b.customer_name,b.customer_mno, GROUP_CONCAT(bl.locker_no) as lockers FROM booking_locker bl JOIN booking b ON b.id = bl.booking_id where book_date ='$currentdate' AND customer_mno= '$mobileno' GROUP BY bl.booking_id")->queryAll();
        }
        if ($name) {
            $bookingdata = Yii::$app->db->createCommand("SELECT b.book_barcode,b.id,bl.status,b.booking_no,b.book_date,b.payment_status,b.no_of_locker,b.customer_name,b.customer_mno, GROUP_CONCAT(bl.locker_no) as lockers FROM booking_locker bl JOIN booking b ON b.id = bl.booking_id where book_date ='$currentdate' AND customer_name= '$name' GROUP BY bl.booking_id")->queryAll();
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['bookingdata' => $bookingdata];
    }

    public function actionSavecostume() {
        $booking_id = $_POST['booking_id'];
        $member_id = $_POST['member_id'];
        $no_of_costume = $_POST['no_of_costume'];
        $costume_amount = $_POST['costume_amount'];
        $booking = new Bookingcostume();
        $booking->booking_id = $booking_id;
        $booking->member_id = $member_id;
        $booking->qty = $no_of_costume;
        $booking->price = $costume_amount;
        $booking->total_amt = $no_of_costume * $costume_amount;
        $booking->status = 'alloted';
        $booking->created_by = Users::userId();
        $booking->created_at = date('Y-m-d H:i:s');
        $booking->save();
    }

    public function actionSavelocker() {
        $locker_nos = $_POST['lockers'];
        // $locker_id = $_POST['id'];
        $booking_id = $_POST['booking_id'];
        $member_id = $_POST['member_id'];
        $no_of_locker = $_POST['no_of_locker'];
        $locker_amount = 50;
        if (!empty($locker_nos)) {
            //  $locker_nos = explode(",", $locker_no);
            foreach ($locker_nos as $k => $v) {
                if (!empty($v)) {
                    $booking = new \app\models\Bookinglocker();
                    $booking->booking_id = $booking_id;
                    $booking->member_id = $member_id;
                    $booking->qty = $no_of_locker;
                    $booking->locker_no = $v;
                    $booking->price = $locker_amount;
                    $booking->total_amt = $no_of_locker * $locker_amount;
                    $booking->status = 'alloted';
                    $booking->created_by = Users::userId();
                    $booking->created_at = date('Y-m-d H:i:s');
                    if ($booking->save()) {
                        $model = \app\models\Locker::findOne($k);
                        $model->is_running = 0;
                        $model->save();
                    }
                }
            }
        }
    }

    //Return Security Amount and barcode Status change
    public function actionReturnsecurityamt() {
        return $this->render('returnsecurityamt', []);
    }

    public function actionSecurtyamountreturn() {
        $barcode = $_GET['barcode'];
        $current_date = date('y-m-d');
        if(!empty($barcode)){
        $data = Yii::$app->db->createCommand("Select * From booking where book_barcode= $barcode AND book_date='$current_date' ")->queryOne();
        $booking_id = $data['id'];
        if(!empty($booking_id)){
        $booking_item = Yii::$app->db->createCommand("Select * From booking_items where booking_id= $booking_id ")->queryAll();
        $booking_locker = Yii::$app->db->createCommand("Select * From booking_locker where booking_id= $booking_id ")->queryAll();

        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['data' => $data, 'booking_item' => $booking_item, 'booking_locker' => $booking_locker];
        }
        
        }
        
    }

    public function actionSavereturnbarcode() {
        $barcode = $_POST['barcode'];
        $id = $_POST['booking_id'];
        $final_security_amt = $_POST['final_security_amt'];
        $final_remark = $_POST['final_remark'];
        $model = Booking::findOne($id);
        $model->final_security_amt = $final_security_amt;
        $model->final_remark = $final_remark;
        $model->security_amt_status = 'return';
        if ($model->save()) {
            $data = Yii::$app->db->createCommand("Select id From barcode where barcode_no= $barcode")->queryOne();
            $barcode_data = \app\models\Barcode::findOne($data['id']);
            $barcode_data->is_running = 1;
            $barcode_data->save();
        }
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Booking::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
