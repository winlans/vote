<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 19:26
 */

namespace app\controllers;


use app\vote\core\BaseController;

class BackendController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

}