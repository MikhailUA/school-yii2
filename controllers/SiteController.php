<?php

namespace app\controllers;

use app\models\Comment;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
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
                        'roles' => ['@'], // @ означает зарегистрир пользователь
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
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionFoo() {

        return $this->render('foo');
        //return 'Hello';
    }

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

    public function actionAbout()
    {
        $model = new Comment();

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            var_dump($model->name);
            die;
        }

        return $this->render('about', [
            'model' => $model,
        ]);
    }

    public function actionSay($message = 'Hello'){
        return $this->render('say', [
            'message' => $message
        ]);
    }

    public function actionAdd() {
        //User::findOne([...])
        //User::findAll([...])

        $user = new User();

//        $user->createdAt = date('Y-m-d H:i:s');
        $user->updatedAt = date('Y-m-d H:i:s');

        if($user->load(Yii::$app->request->post()) && $user->validate()) {


            $user->save();
            ///$user->passwordHash = '';
        }

        return $this->render('add', [
            'model' => $user,
        ]);
    }

    public function actionRegister(){
        $model = new User();
        return $this->render('register', [
            'model' => $model,
        ]);
    }
}
