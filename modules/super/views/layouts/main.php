<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use mdm\admin\components\MenuHelper;
use app\assets\BackendAppAsset;

BackendAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div>
    <!--BEGIN THEME SETTING-->
    <!--<div id="theme-setting">
        <a href="index.html#" data-toggle="dropdown" class="btn-theme-setting"><i class="fa fa-cog"></i></a>
        <div class="content-theme-setting">
            <h4 class="mtn">Theme Styles</h4>
            <select id="list-style" class="form-control">
                <option value="style1">Flat Squared style</option>
                <option value="style2">Flat Rounded style</option>
                <option value="style3" selected="selected">Flat Border style</option>
            </select><br/>
            <h4 class="mtn">Theme Colors</h4>
            <ul id="list-color" class="list-unstyled list-inline">
                <li data-color="green-dark" data-hover="tooltip" title="Green - Dark" class="green-dark"></li>
                <li data-color="red-dark" data-hover="tooltip" title="Red - Dark" class="red-dark"></li>
                <li data-color="pink-dark" data-hover="tooltip" title="Pink - Dark" class="pink-dark"></li>
                <li data-color="blue-dark" data-hover="tooltip" title="Blue - Dark" class="blue-dark"></li>
                <li data-color="yellow-dark" data-hover="tooltip" title="Yellow - Dark" class="yellow-dark"></li>
                <li data-color="green-grey" data-hover="tooltip" title="Green - Grey" class="green-grey"></li>
                <li data-color="red-grey" data-hover="tooltip" title="Red - Grey" class="red-grey"></li>
                <li data-color="pink-grey" data-hover="tooltip" title="Pink - Grey" class="pink-grey"></li>
                <li data-color="blue-grey" data-hover="tooltip" title="Blue - Grey" class="blue-grey"></li>
                <li data-color="yellow-grey" data-hover="tooltip" title="Yellow - Grey" class="yellow-grey"></li>
                <li data-color="yellow-green" data-hover="tooltip" title="Yellow - Green" class="yellow-green"></li>
                <li data-color="orange-grey" data-hover="tooltip" title="Orange - Grey" class="orange-grey"></li>
                <li data-color="pink-blue" data-hover="tooltip" title="Pink - Blue" class="pink-blue"></li>
                <li data-color="pink-violet" data-hover="tooltip" title="Pink - Violet" class="pink-violet active"></li>
                <li data-color="orange-violet" data-hover="tooltip" title="Orange - Violet" class="orange-violet"></li>
                <li data-color="pink-green" data-hover="tooltip" title="Pink - Green" class="pink-green"></li>
                <li data-color="pink-brown" data-hover="tooltip" title="Pink - Brown" class="pink-brown"></li>
                <li data-color="orange-blue" data-hover="tooltip" title="Orange - Blue" class="orange-blue"></li>
                <li data-color="yellow-blue" data-hover="tooltip" title="Yellow - Blue" class="yellow-blue"></li>
                <li data-color="green-blue" data-hover="tooltip" title="Green - Blue" class="green-blue"></li>
            </ul>
        </div>
    </div>-->
    <!--END THEME SETTING-->
    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <div id="header-topbar-option-demo" class="page-header-topbar">
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a id="logo" href="<?= Url::toRoute('/super')?>" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">管理中心</span></a>
            </div>
            <div class="topbar-main">
                <a id="menu-toggle" href="<?= Url::toRoute('/super')?>" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <form id="topbar-search" action="<?= Url::toRoute('/super')?>" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right">
                        <a href="<?= Url::toRoute('/super')?>"><i class="fa fa-search"></i></a>
                        <input type="text" placeholder="Search here..." class="form-control"/>
                    </div>
                </form>
                <div class="news-update-box hidden-xs">
                    <span class="text-uppercase mrm pull-left">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li>欢迎使用运营管理平台。。。</li>
                        <li>繁华的都市中，这里是你温馨的港湾，放下一天的工作，沏上一杯茶淡茶，在这里可以驱走你一天的劳累。</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <!--<li class="dropdown">
                        <a data-hover="dropdown" href="index.html#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><p>You have 14 new notifications</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="index.html#"><span class="label label-blue"><i class="fa fa-comment"></i></span>New Comment<span class="pull-right text-muted small">4 mins ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-violet"><i class="fa fa-twitter"></i></span>3 New Followers<span class="pull-right text-muted small">12 mins ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-pink"><i class="fa fa-envelope"></i></span>Message Sent<span class="pull-right text-muted small">15 mins ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-green"><i class="fa fa-tasks"></i></span>New Task<span class="pull-right text-muted small">18 mins ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-yellow"><i class="fa fa-upload"></i></span>Server Rebooted<span class="pull-right text-muted small">19 mins ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-green"><i class="fa fa-tasks"></i></span>New Task<span class="pull-right text-muted small">2 days ago</span></a></li>
                                        <li><a href="index.html#"><span class="label label-pink"><i class="fa fa-envelope"></i></span>Message Sent<span class="pull-right text-muted small">5 days ago</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="index.html#" class="text-right">See all alerts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-hover="dropdown" href="index.html#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li><p>You have 14 new messages</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="index.html#"><span class="avatar"><img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">Jessica Spencer</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="index.html#"><span class="avatar"><img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith<span class="label label-blue pull-right">New</span></span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="index.html#"><span class="avatar"><img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Doe<span class="label label-orange pull-right">10 min</span></span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="index.html#"><span class="avatar"><img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                        <li><a href="index.html#"><span class="avatar"><img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/></span><span class="info"><span class="name">John Smith</span><span class="desc">Lorem ipsum dolor sit amet...</span></span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="index.html#">Read all messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-hover="dropdown" href="index.html#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li><p>You have 14 pending tasks</p></li>
                            <li>
                                <div class="dropdown-slimscroll">
                                    <ul>
                                        <li><a href="index.html#"><span class="task-item">Fix the HTML code<small class="pull-right text-muted">40%</small></span>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;" class="progress-bar progress-bar-orange"><span class="sr-only">40% Complete (success)</span></div>
                                                </div>
                                            </a></li>
                                        <li><a href="index.html#"><span class="task-item">Make a wordpress theme<small class="pull-right text-muted">60%</small></span>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-blue"><span class="sr-only">60% Complete (success)</span></div>
                                                </div>
                                            </a></li>
                                        <li><a href="index.html#"><span class="task-item">Convert PSD to HTML<small class="pull-right text-muted">55%</small></span>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;" class="progress-bar progress-bar-green"><span class="sr-only">55% Complete (success)</span></div>
                                                </div>
                                            </a></li>
                                        <li><a href="index.html#"><span class="task-item">Convert HTML to Wordpress<small class="pull-right text-muted">78%</small></span>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;" class="progress-bar progress-bar-yellow"><span class="sr-only">78% Complete (success)</span></div>
                                                </div>
                                            </a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="last"><a href="index.html#">See all tasks</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown topbar-user">
                        <a data-hover="dropdown" href="<?= Url::toRoute('/super')?>" class="dropdown-toggle">
                            <img src="/code/images/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;
                            <span class="hidden-xs"><?= Yii::$app->user->getIdentity()->username ?></span>&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <!--<li><a href="extra-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="page-calendar.html"><i class="fa fa-calendar"></i>My Calendar</a></li>
                            <li><a href="email-inbox.html"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                            <li><a href="index.html#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="extra-lock-screen.html"><i class="fa fa-lock"></i>用户锁屏</a></li>-->
                            <li><a href="<?= Url::toRoute(['/user/logout', 'jump' => '/'.Yii::$app->requestedRoute])?>"><i class="fa fa-key"></i>用户退出</a></li>
                        </ul>
                    </li>
                    <!--<li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>-->
                </ul>
            </div>
        </nav>
    </div>
    <!--END TOPBAR-->
    <div id="wrapper">
        <!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="user-panel">
                        <div class="thumb"><img src="/code/images/128.jpg" alt="" class="img-circle"/></div>
                        <div class="info"><p><?= Yii::$app->user->getIdentity()->username ?></p>
                            <ul class="list-inline list-unstyled">
                                <li><a href="#extra-profile.html" data-hover="tooltip" title="Profile"><i class="fa fa-user"></i></a></li>
                                <li><a href="#email-inbox.html" data-hover="tooltip" title="Mail"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#index.html#" data-hover="tooltip" title="Setting" data-toggle="modal" data-target="#modal-config"><i class="fa fa-cog"></i></a></li>
                                <li><a href="<?= Url::toRoute(['/user/logout', 'jump' => '/'.Yii::$app->requestedRoute])?>" data-hover="tooltip" title="Logout"><i class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <!--菜单调用处-->
                    <?php
                    $callback = function ($menu)
                    {
                        $base = [
                            'label' => $menu['name'],
                            'url' => [$menu['route']],
                            'items' => $menu['children']
                        ];
                        if (trim($menu['data']) != '') {
                            $base['template'] = $menu['data'];
                        }
                        return $base;
                    };

                    echo Menu::widget([
                        'options' => [
                            'tag' => 'li'
                        ],
                        'encodeLabels' => false,
                        'activateParents' => true,
                        'linkTemplate' => '<a href="{url}"><i class="fa fa-angle-right"></i><span class="submenu-title">{label}</span></a>',
                        'submenuTemplate' => '<ul class="nav nav-second-level collapse">{items}</ul>',
                        'items' => MenuHelper::getAssignedMenu(Yii::$app->user->getId(), 1, $callback),
                    ]);
                    ?>
                </ul>
            </div>
        </nav>
        <!--END SIDEBAR MENU-->
        <!--BEGIN CHAT FORM-->
        <!--<div id="chat-form" class="fixed">
            <div class="chat-inner">
                <h2 class="chat-header">
                    <a href="javascript:;" class="chat-form-close pull-right"><i class="glyphicon glyphicon-remove"></i></a>
                    <i class="fa fa-user"></i>&nbsp;Chat&nbsp;<span class="badge badge-info">3</span>
                </h2>
                <div id="group-1" class="chat-group">
                        <strong>Favorites</strong>
                        <a href="index.html#"><span class="user-status is-online"></span>
                        <small>Verna Morton</small>
                        <span class="badge badge-info">2</span></a><a href="index.html#"><span class="user-status is-online"></span>
                        <small>Delores Blake</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-busy"></span>
                        <small>Nathaniel Morris</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-idle"></span>
                        <small>Boyd Bridges</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-offline"></span>
                        <small>Meredith Houston</small>
                        <span class="badge badge-info is-hidden">0</span></a>
                </div>
                <div id="group-2" class="chat-group">
                        <strong>Office</strong>
                        <a href="index.html#"><span class="user-status is-busy"></span>
                        <small>Ann Scott</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-offline"></span>
                        <small>Sherman Stokes</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-offline"></span>
                        <small>Florence Pierce</small>
                        <span class="badge badge-info">1</span></a>
                </div>
                <div id="group-3" class="chat-group">
                        <strong>Friends</strong>
                        <a href="index.html#"><span class="user-status is-online"></span>
                        <small>Willard Mckenzie</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-busy"></span>
                        <small>Jenny Frazier</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-offline"></span>
                        <small>Chris Stewart</small>
                        <span class="badge badge-info is-hidden">0</span></a><a href="index.html#"><span class="user-status is-offline"></span>
                        <small>Olivia Green</small>
                        <span class="badge badge-info is-hidden">0</span></a>
                </div>
            </div>
            <div id="chat-box" style="top:400px">
                <div class="chat-box-header">
                    <a href="index.html#" class="chat-box-close pull-right"><i class="glyphicon glyphicon-remove"></i></a>
                    <span class="user-status is-online"></span><span class="display-name">Willard Mckenzie</span>
                    <small>Online</small>
                </div>
                <div class="chat-content">
                    <ul class="chat-box-body">
                        <li>
                            <p><img src="/code/images/128.jpg" class="avt"/><span class="user">John Doe</span><span class="time">09:33</span></p>
                            <p>Hi, George Richards!</p>
                        </li>
                        <li class="odd">
                            <p><img src="/code/images/48.jpg" class="avt"/><span class="user">George Richards</span><span class="time">09:33</span></p>
                            <p>Hi, Willard Mckenzie!</p>
                        </li>
                    </ul>
                </div>
                <div class="chat-textarea"><input placeholder="Type your message" class="form-control"/></div>
            </div>
        </div>-->
        <!--END CHAT FORM-->
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title"><?= isset($this->context->title) ? $this->context->title : '' ?></div>
                </div>
                <?= Breadcrumbs::widget([
                    'tag' => 'ol',
                    'options' => ['class' => 'breadcrumb page-breadcrumb pull-right'],
                    'itemTemplate' => "<li>{link}<i class=\"fa fa-angle-right\"></i></li>",
                    'homeLink' => ['label' => '主页', 'url' => '/super' , 'template' => '<li><i class="fa fa-home"></i>{link}<i class="fa fa-angle-right"></i></li>'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->
            <div class="page-content">
                <?= $content ?>
            </div>
            <!--END CONTENT-->
            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">Copyright © 2015-2016  版权所有</div>
            </div>
            <!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>