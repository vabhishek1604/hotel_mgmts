<?php

namespace app\controllers;

use app\commands\FrontController;
use app\models\Project;
use app\models\ProjectAvailabilities;
use app\models\ProjectImages;
use Yii;
use yii\web\Response;

class WebController extends FrontController
{
    public $enableCsrfValidation = false;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'front';
        return $this->render('index');
    }

    public function actionAboutus()
    {
        $this->layout = 'front';
        return $this->render('about_us');
    }

    public function actionProjectlist()
    {
        $data_row = [];
        foreach (Projectavailabilities::find()->where(['avail_isactive' => 1])->all() as $value) {
            $img              = Projectimages::get_random_image('', $value->avail_id, 'Main');
            $data['img']      = !empty($img) ? $img : "/web/images/prop_default.jpg";
            $data['bedroom']  = !empty($value->avail_bedroom) ? $value->avail_bedroom : "";
            $data['bathroom'] = !empty($value->avail_bathroom) ? $value->avail_bathroom : "";
            $data['sqft']     = !empty($value->avail_area_in_sqft) ? $value->avail_area_in_sqft : "";
            $data['slug']     = !empty($value->avail_slug) ? $value->avail_slug : "";
            $data['title']    = !empty($value->avail_title) ? $value->avail_title : "";
            $data['desc']     = !empty($value->availProj->proj_remark) ? (substr($value->availProj->proj_remark, 0, 110) . '...') : "";
            $data['price']    = !empty($value->avail_price) ? $value->avail_price : "";
            $data['city']     = !empty($value->availProj->proj_city) ? $value->availProj->proj_city : "";
            $data['state']    = !empty($value->availProj->proj_state) ? $value->availProj->proj_state : "";
            array_push($data_row, $data);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return ['projects' => $data_row];
    }

    public function actionProperties()
    {
        $this->layout = 'front';
        $type         = explode("-", $_GET['type']);
        $project      = Project::find()->where(['proj_type' => $type[0]])->all();
        return $this->render('property', array('project' => $project, 'type' => $type));
    }

    public function actionPropertydetail()
    {
        //        echo $_GET['slug'];
//        exit();
        $this->layout = 'front';
        if (!empty($_GET['slug'])) {
            $slug     = $_GET['slug'];
            $property = ProjectAvailabilities::findOne(['avail_slug' => $slug]);
            return $this->render('property_details', array('property' => $property));
        } else {
            return $this->render('property');
        }
    }

    public function actionContactus()
    {
        $this->layout = 'front';
        return $this->render('contactus');
    }
    public function actionContact_mail()
    {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        // $subject  = $_POST['subject'];
        $mobileno = $_POST['mobileno'];

        if ($name != "" && $email != "" && $mobileno != "") {

            $to      = "dnggroup333@gmail.com";
            $subject = 'Enquiry from DNG Builders Website';
            $headers = "FROM: <dnggroup333@gmail.com>";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";
            $message = '<html><body>';
            $message .= "<label style='color:#0064c9'><strong>Enquiry from DNG Builders Website</strong></label><br /><br/>";
            $message .= "<br/>";
            $message .= "Name : " . $_POST['name'] . " \r\n";
            $message .= "<br/>";
            $message .= "Mobile No : " . $_POST['mobileno'] . " \r\n";
            $message .= "<br/>";
            $message .= "Email : " . $_POST['email'] . " \r\n";
            $message .= "<br/>";
            // $message .= "Subject : " . $_POST['subject'] . " \r\n";
            // $message .= "<br/>";
            $message .= "Message : " . $_POST['message'] . " \r\n";
            $message .= "<br/>";
            $message .= "</body></html>";
            // mail($to, $subject, $message, $headers);

            $data = '<div style="color:#333;background-color:#dff0d8;padding:10px;" class="alert alert-success">
                        Dear ' . $_POST['name'] . ',<br/>
                        Your Enquiry  submitted successfully. We will get back to you soon.<br/>
                       DNG Builders Team.
                        </div>';
            $msg  = "success";
        } else {
            $data = '<div style="color:#c40000;" class="alert alert-danger">Please fill the required details</div>';
            $msg  = "success";
        }

        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $model = ['msg' => $msg, 'data' => $data];
    }

    public function actionLoadticketdata()
    {
        $this->layout = 'front_inner';
        $list         = array();
        $tickets      = Ticketmaster::find()->all();
        $offer        = Offermaster::find()
            ->where('discount_category=:dc', [':dc' => 'Ticket'])
            ->andWhere('user_type=:ut', [':ut' => 'All'])
            ->andWhere('discount_type=:dt', [':dt' => 'Direct'])
            ->andWhere('is_active=:ia', [':ia' => 1])
            ->one();
        $discount     = !empty($offer) ? $offer->discount_percent : 0;
        foreach ($tickets as $ticket) {
            $disc_amt           = ($ticket->price * $discount) / 100;
            $data['id']         = $ticket->id;
            $data['ticket_for'] = $ticket->ticket_type;
            $data['price']      = round($ticket->price - $disc_amt);
            array_push($list, $data);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $items                       = ['list' => $list];
        return $items;
    }

    public function actionLoadfooddata()
    {
        $this->layout = 'front_inner';
        $list         = array();
        $food_data    = Onlinefood::find(['is_active' => 1])->all();
        $offer        = Offermaster::find(['discount_category' => 'Ticket', 'user_type' => 'All', 'discount_type' => 'Direct', 'is_active' => 1])->one();
        $discount     = !empty($offer) ? $offer->discount_percent : 0;

        foreach ($food_data as $food) {
            $disc_amt                 = ($food->price * $discount) / 100;
            $data['id']               = $food->id;
            $data['break_fast']       = $food->break_fast;
            $data['break_fast_time']  = $food->break_fast_time;
            $data['lunch']            = $food->lunch;
            $data['lunch_time']       = $food->lunch_time;
            $data['snacks']           = $food->snacks;
            $data['snacks_time']      = $food->snacks_time;
            $img_url                  = Yii::$app->request->baseUrl . $food->image;
            $data['image']            = "<img class='img-fluid img-responsive img-thumbnail' src='$img_url' />";
            $data['actual_price']     = $food->price;
            $data['discounted_price'] = round($food->price - $disc_amt);
            array_push($list, $data);
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $items                       = ['list' => $list];
        return $items;
    }

    public function actionBooknow()
    {
        $date        = $_POST['date'];
        $ticket_data = array();
        $food_data   = array();
        $offer       = Offermaster::find(['discount_category' => 'Ticket', 'user_type' => 'All', 'discount_type' => 'Direct', 'is_active' => 1])->one();
        $discount    = !empty($offer) ? $offer->discount_percent : 0;

        foreach (Ticketmaster::find()->all() as $tickets) {
            if (!empty($_POST['qty_' . $tickets->id])) {
                $disc_amt        = ($tickets->price * $discount) / 100;
                $ticket['id']    = $tickets->id;
                $ticket['name']  = $tickets->ticket_type;
                $ticket['price'] = round($tickets->price - $disc_amt);
                $ticket['qty']   = $_POST['qty_' . $tickets->id];
                array_push($ticket_data, $ticket);
            }
        }
        foreach (Onlinefood::find(['is_active' => 1])->all() as $food) {
            if (!empty($_POST['qty1_' . $food->id])) {
                $disc_amt       = ($food->price * $discount) / 100;
                $foods['id']    = $food->id;
                $foods['name']  = '';
                $foods['price'] = round($food->price - $disc_amt);
                $foods['qty']   = $_POST['qty1_' . $food->id];
                array_push($food_data, $foods);
            }
        }
        return $this->render(
            'book_now',
            array(
                'date' => $date,
                'ticket_data' => $ticket_data,
                'food_data' => $food_data,
            )
        );
    }

}