<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerCssFile('/assets/backend/bootstrap/css/bootstrap.min.css');
$this->registerCssFile('/assets/backend/bootstrap/css/bootstrap-responsive.min.css');
$this->registerCssFile('/assets/backend/css/theme.css');
$this->registerCssFile('/assets/backend/images/icons/css/font-awesome.css');
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600');
$this->registerJsFile('/assets/backend/scripts/jquery-1.9.1.min.js');
$this->registerJsFile('/assets/backend/scripts/jquery-ui-1.10.1.custom.min.js');
$this->registerJsFile('/assets/backend/bootstrap/js/bootstrap.min.js');
$this->registerJsFile('/assets/backend/scripts/flot/jquery.flot.js');
$this->registerJsFile('/assets/backend/scripts/flot/jquery.flot.resize.js');
$this->registerJsFile('/assets/backend/scripts/datatables/jquery.dataTables.js');
$this->registerJsFile('/assets/backend/scripts/common.js');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.2">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <?php if (!(new \app\util\UserInfoOperator())->isSuper()):?>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href=<?=\yii\helpers\Url::to('/') ?>>投票平台 </a>
            <?php else:?>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href=<?=\yii\helpers\Url::to('/index.php/backend/index') ?>>投票平台 </a>
            <?php endif?>

            <?php if((new \app\util\UserInfoOperator())->isLogined()):?>
            <div class="nav-collapse">
                <ul class="nav nav-icons">
                    <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                    <li><a href="#"><i class="icon-eye-open"></i></a></li>
                    <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                </ul>
                <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Item No. 1</a></li>
                            <li><a href="#">Don't Click</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Example Header</li>
                            <li><a href="#">A Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Support </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/assets/backend/images/user.png" class="nav-avatar" />
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li class="divider"></li>
                            <li> <?=Html::beginForm(['user/logout'], 'post')
                                . Html::submitButton(
                                '退出 (' . (new \app\util\UserInfoOperator())->getUserInfo()['username'] . ')',
                                ['class' => 'btn span2']
                                )
                                . Html::endForm() ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php else:?>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li><a href="#">
                            Sign Up
                        </a></li>
                    <li><a href="#">
                            Forgot your password?
                        </a></li>
                </ul>
            </div><!-- /.nav-collapse -->
            <?php endif;
            ?>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
<div class="wrapper">
    <div class="container" style="width: 1200px;">
        <div class="row">
<?php
    if ( in_array(Yii::$app->request->getPathInfo(), require(dirname(dirname(__DIR__)) . '/config/routing_backend.php')))
    {
        echo <<<'SIDE'
            <div class="span3">
                        <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="/index.php/backend/index"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                        <li><a href= "/index.php/article/index"><i class="menu-icon icon-bullhorn"></i> 投票管理 </a>
                        </li>
                        <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
    11</b> </a></li>
                        <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
    19</b> </a></li>
                    </ul>
                    <!--/.widget-nav-->


                    <ul class="widget widget-menu unstyled">
                        <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                        <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                    </ul>
                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
SIDE;
    }
?>

<?=$content ?>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
