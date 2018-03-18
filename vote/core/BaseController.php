<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/15
 * Time: 21:33
 */
namespace app\vote\core;

use yii\web\Controller;

class BaseController extends Controller{
    protected function getUserInfo(){
        return \Yii::$app->getSession()->get('user');
    }

    protected function goLogin(){
        \Yii::$app->response->redirect('/index.php/user/login');
    }

}