<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\User;
use app\util\UserInfoOperator;
use app\vote\core\BaseController;
use Yii;
use yii\helpers\Url;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
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
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if ((new UserInfoOperator())->isLogined()) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     */
    public function actionLogout()
    {
       (new UserInfoOperator())->logout();
       $this->goLogin();
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

    public function actionRegister(){
        $model = new SignupForm();

        if (Yii::$app->request->isPost &&$model->load(Yii::$app->request->post()) && $model->register()){
            return $this->redirect('/index.php/user/login');
        }

        return $this->render('register', ['model'=> ($model)]);
    }
}
