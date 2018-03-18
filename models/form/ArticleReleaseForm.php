<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 22:08
 */
namespace app\models\form;

use app\models\Article;
use yii\base\Model;

class ArticleReleaseForm extends Model
{
    public $title;
    public $descr;
    public $deadline;
    public $type;
    public $perm;
    public $user_id;

    public function rules()
    {
        return array(
            ['title', 'required', 'message' => '话题标题不能为空'],
            ['deadline', 'required', 'message'=>'必须选定结束时间'],
            ['type', 'required', 'message' => '必须确定是多选还是单选'],
            ['perm', 'required', 'message' => '必须指定哪个角色可以参与']
        );
    }


    public function release(){
        \Yii::$app->db->transaction(function (){
            $article = new Article();
            $article->title = $this->title;
            $article->descr = $this->descr;
            $article->deadline = $this->deadline;
            $article->type = $this->type;
            $article->perm = $this->perm;
            $article->user_id = \Yii::$app->session->get('user')['id'];
            $article->save();


            
        });
    }
}