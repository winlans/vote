<?php
/**
 * Created by PhpStorm.
 * User: winlans
 * Date: 2018/3/17
 * Time: 16:43
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/** @var $model \app\models\User */
$this->title = '注册';

?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]);?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

    <?= $form->field($model, 'repassword')->passwordInput()->label('确认密码') ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-9">{input}</div><div class="col-lg-3">{image}</div></div>',
    ])->label('验证码') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
        </div>
    </div>
</div>
