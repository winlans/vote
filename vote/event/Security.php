<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/15
 * Time: 21:05
 */

namespace app\vote\event;


class Security
{
    const SUPER = 1;
    public function loginCheck()
    {
        $request_path = \Yii::$app->request->getPathInfo();
        $exclude = require_once(dirname(__DIR__) . '/../config/exclude_rules.php');
        if (!\Yii::$app->session->get('user')) {
            if (!in_array($request_path, $exclude)) {
                return \Yii::$app->response->redirect('/index.php/user/login');
            }
        }else{
            if (\Yii::$app->session->get('user')['role_id'] != self::SUPER
                && in_array($request_path, require(dirname(dirname(__DIR__)). '/config/routing_backend.php'))){
                return \Yii::$app->response->redirect(\Yii::$app->homeUrl);
            }
        }
    }
}