<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 10:25
 */
namespace app\util;

use app\models\User;

class UserInfoOperator{
    private $error;

    public function isLogined(){
        return (bool)\Yii::$app->session->get('user');
    }

    public function getUserInfo(){
        return \Yii::$app->session->get('user');
    }

    public function ensure($expression, $errorNo, $errorMsg){
        if (false == $expression){
            $this->error['errorNo'] = $errorNo;
            $this->error['errorMsg'] = $errorMsg;
            return false;
        }
        return true;
    }

    public function getErrorNo(){
        return $this->error['errorNo'];
    }

    public function getErrorMsg(){
        return $this->error['errorMsg'];
    }

    public function login($userInfo){
        $user = User::findByUsername($userInfo['username']);
        if ($this->ensure($user, 0, 'not found by this username'))
            return false;
        if ($user->validatePassword($userInfo['password'])){
            \Yii::$app->session->set('user', $user->toArray());
            return true;
        }
        return $this->ensure(false, 0, 'invalid password');
    }


    public function logout(){
        \Yii::$app->session->destroy();
    }

    public function isSuper(){
        return 1 == \Yii::$app->session->get('user')['role_id'];
    }
}