<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 22:18
 */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
/**@var $this \yii\web\View */


?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);?>

    <?= $form->field($model, 'title')->textInput(['autofocus' => true])->label('标题') ?>

    <?= $form->field($model, 'descr')->textarea()->label('描述') ?>

    <?= $form->field($model, 'type')->radioList(['单选','多选'])->label('类型')?>

    <?= $form->field($model, 'perm')->dropDownList(['管理员', '草本'])->label('圈子') ?>

    <div class="form-group">
        <?= Html::button('添加选项', ['class' => 'btn btn-primary', 'name' => 'release-button']) ?>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('发布', ['class' => 'btn btn-primary', 'name' => 'release-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
