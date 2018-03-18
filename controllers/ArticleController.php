<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/15
 * Time: 15:52
 */
namespace app\controllers;


use app\models\form\ArticleReleaseForm;
use app\vote\core\BaseController;

class ArticleController extends BaseController {
    public function actionRelease(){

        $model = new ArticleReleaseForm();
        if (\Yii::$app->request->isPost){

        }

        return $this->render('release', ['model' => $model]);
    }

    public function actionIndex(){
        return $this->render('index');
    }

}