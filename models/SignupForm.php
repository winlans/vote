<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 17:16
 */
namespace app\models;

use app\util\StringUtil;
use yii\base\Model;

class SignupForm extends Model
{

    public $password;
    public $repassword;
    public $username;
    public $verifyCode;

    public function rules()
    {
        return array(
            ['password', 'required', 'message' =>'密码是必填项'],
            ['password', 'string', 'min' => 6, 'message' => '密码不能少于6位'],
            ['repassword', 'compare', 'compareAttribute'=> 'password', 'message'=> '两次输入的密码不一致'],
            ['password', 'required', 'message' => '密码不能为空'],
            ['username', 'required', 'message' => '用户名必须填写'],
            ['username', 'string', 'min' => 5, 'message' => '用户名不能少于5个字符'],
            ['verifyCode', 'required','message' => '必须输入验证码'],
            ['verifyCode', 'captcha']
        );
    }

    public function register(){
        $user = new User();
        $user->username = StringUtil::filterUserName($this->username);
        $user->password = StringUtil::encryptPassword($this->password);
        $user->role_id = 1;
        $user->status = 1;
        return $user->save();
    }
}