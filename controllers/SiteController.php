<?php

namespace app\controllers;

use app\models\UserAjaxSearch;
use ReCaptcha\ReCaptcha;
use app\models\Comment;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\ContactForm;
//use yii\web\User;


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

    public function actionUserajaxsearch(){

        if ($search=Yii::$app->request->post('search')) {
            $users = User::find()->where(['like', 'firstName', $search])->orWhere(['like','lastName', $search])->asArray()->all();
            return json_encode($users);
        }else{
            return $this->render('userajaxsearch');
        }

    }

    public function actionRegister()
    {
        $model = new User();
        $model->scenario = 'register';

        if ($model->load(yii::$app->request->post())) {

            $recaptcha = new ReCaptcha(Yii::$app->params['recaptcha']['secret']);
            $gRecaptchaResponce = Yii::$app->request->post('g-recaptcha-response');
            $resp = $recaptcha->verify($gRecaptchaResponce, Yii::$app->request->userIP);

            if ($resp->isSuccess()) {
                // verified!
                if ($model->save()) {
                    Yii::$app->mailer->compose('welcome', [
                        'firstName' => $model->firstName,
                        'lastName' => $model->lastName,
                        'email' => $model->email,
                        'role' => $model->role,
                        'password' => $model->password
                    ])
                        ->setFrom(Yii::$app->params['adminEmail'])
                        ->setTo($model->email)
                        ->setSubject('Registration')
                        ->send();

                    Yii::$app->user->login($model);

                    return $this->goHome();
                }
            } else {
                $model->addError('email', 'You are bot!');
                // $errors = $resp->getErrorCodes();
            }
        }
        return $this->render('register', ['model' => $model]);
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

        $model = new User();
        $model->scenario = 'login';
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

    public function actionFoo()
    {

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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            var_dump($model->name);
            die;
        }

        return $this->render('about', [
            'model' => $model,
        ]);
    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', [
            'message' => $message
        ]);
    }
}

