<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\filters\AccessControl;
use app\components\MainController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegistrationForm;

class SiteController extends MainController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->redirect('/manager/default/index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect('/manager/default/index');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

     public function actionRegistration()
     {
        $model = new RegistrationForm();
        $user = new User();
        $tariff = 2;

        if (isset($_GET['tariff'])){
            $tariff = (int)$_GET['tariff'];
        }
        
        if (isset($_POST['RegistrationForm'])){
            $user->setAttribute('surname', $_POST['RegistrationForm']['surname']);
            $user->setAttribute('name', $_POST['RegistrationForm']['name']);
            $user->setAttribute('secondname', $_POST['RegistrationForm']['secondname']);
            $user->setAttribute('phone', $_POST['RegistrationForm']['phone']);
            $user->setAttribute('email', $_POST['RegistrationForm']['email']);
            $user->setAttribute('password', $_POST['RegistrationForm']['password']);
            $user->setAttribute('date_added', time());  
            $user->setAttribute('tariff', $_POST['RegistrationForm']['tariff']);
        }
              
        if ($model->load(Yii::$app->request->post()) && $user->validate()) {  
            if ($user->save()){
                $model->login();
                mail("5704709@gmail.com", "Новый пользователь", 'Зарегистрирован новый пользователь',
                    "From: torgovod@torgovod.ru \r\n"
                    ."X-Mailer: PHP/" . phpversion());
                $this->redirect('/site/registrationcomplete/'); 
            }
        } else {           
            return $this->render('registration', [
                'model' => $model,
                'tariff' => $tariff,
            ]);
        }        
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegistrationcomplete()
    {
        return $this->render('registrationcomplete');
    }

    public function actionInput(){
        $current_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $db  = Yii::$app->db;
        $db->createCommand('INSERT INTO sqserver (ip) VALUES (:ip)', [
            ':ip' => $current_ip,
        ])->execute();
    }

    public function actionOutput(){
        $query = new Query;
        // compose the query
        $query->select('id, ip')
            ->from('sqserver')
            ->limit(10)
        ->orderBy(['id'=>SORT_DESC]);
        $pages = new Pagination(['totalCount' => $query->count()]);
        $ips = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('output', [
            'ips' => $ips,
            'pages' => $pages,
        ]);
    }
}
