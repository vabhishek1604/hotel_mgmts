<?php

namespace app\controllers;

use app\commands\AccessRule;
use app\models\ContactForm;
use app\models\Franchiseopportunity;
use app\models\LoginForm;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                // We will override the default rule config with the new AccessRule class
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'create', 'update', 'about'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'about'],
                        'allow' => true,
                        // Allow users,admins to create
                        'roles' => [
                            //    Users::ROLE_USER,
                            // Users::ROLE_ADMIN
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        // Allow admins to delete
                        'roles' => [
                            //  Users::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id == 'error')
                $this->layout = 'error';
            return true;
        } else {
            return false;
        }
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    // public function actionFranchise_opportunity() {
    //     $this->layout = 'front';
    //     $model = new Franchiseopportunity();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         $msg = 'Your Information Submitted successfully. Our Representative will respond you soon.';
    //         Yii::$app->getSession()->setFlash('success', [
    //             'type' => 'success',
    //             'duration' => 5000,
    //             'icon' => 'fa fa-users',
    //             'message' => $msg,
    //             'title' => 'SUCCESS',
    //             'positonY' => 'top',
    //             'positonX' => 'center'
    //         ]);
    //         return $this->redirect(['franchise_opportunity']);
    //     }

    //     return $this->render('franchise_opportunity', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAuthorize()
    {

        return $this->render('authorize');
    }

    public function actionRecdashboard()
    {
        return $this->render('recdashboard');
    }

    public function actionCounteronedashboard()
    {
        return $this->render('counteronedashboard');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main_login';
        if (!Yii::$app->user->isGuest) {
            //  return $this->sendToHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->sendToHome();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $this->sendToHome();
    }

    private function sendToHome()
    {
        $user = Users::findOne(Yii::$app->user->id);
        if ($user->role == 'admin') {
            return $this->redirect(['site/index']);
        } elseif ($user->role == 'user') {
            if (in_array('Reception', $user->group)) {
                return $this->redirect(['site/recdashboard']);
            } else if (in_array('Counter 1', $user->group)) {
                return $this->redirect(['site/counteronedashboard']);
            } else {
                return $this->redirect(['site/index']);
            }
        } else if ($user->role == 'superadmin') {
            return $this->redirect(['site/index']);
        } else {
            return $this->redirect(['site/logout']);
        }
    }

    public function actionLanguage()
    {
        if (isset($_POST['lang'])) {
            Yii::$app->language = $_POST['lang'];
            $cookie = new yii\web\Cookie([
                'name' => 'lang',
                'value' => $_POST['lang']
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}