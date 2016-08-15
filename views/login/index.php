<!DOCTYPE html>
<html lang="zh-CN">
<head><title><?= Yii::$app->name ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="/code/vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
    <link type="text/css" rel="stylesheet" href="/code/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/code/vendors/bootstrap/css/bootstrap.min.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="/code/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="/code/vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="/code/css/themes/blue-dark.css" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="/code/css/style-responsive.css">
</head>
<body id="signin-page">
<div class="page-form">
    <?php $form = yii\widgets\ActiveForm::begin(['options' => ['class' => 'form']]) ?>
        <div class="header-content"><h1>后台登录</h1></div>
        <div class="body-content">
            <?php if(isset($message)):?>
                <div class="alert alert-danger">
                    <?= $message ?>
                </div>
            <?php endif;?>
            <p>用合作网站账号登录:</p>
            <div class="row mbm text-center">
                <div class="col-md-4"><a href="" class="btn btn-sm btn-twitter btn-block"><i class="fa fa-qq fa-fw"></i>QQ</a></div>
                <div class="col-md-4"><a href="" class="btn btn-sm btn-facebook btn-block"><i class="fa fa-weixin fa-fw"></i>微信</a></div>
                <div class="col-md-4"><a href="" class="btn btn-sm btn-google-plus btn-block"><i class="fa fa-weibo fa-fw"></i>新浪微博</a></div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username" placeholder="Username" name="username" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right">
                    <i class="fa fa-key"></i>
                    <input type="password" id="password" placeholder="Password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list">
                    <label><input type="checkbox" name="autologin" value="1">&nbsp;一个月内自动登录</label>
                </div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success">登录&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="forget-password">
                <h4></h4>
                <!--<p>忘记密码? 点击<a href='' class='btn-forgot-pwd'>这里</a>重置密码.</p>
                <p>没有账号? <a id="btn-register" href="">立即注册</a></p>-->
            </div>
            <hr>
            <p>© 2015-2016 深圳市集时通讯股份有限公司</p>
        </div>
    <?php yii\widgets\ActiveForm::end(); ?>
</div>
<script src="/code/js/jquery-1.10.2.min.js"></script>
<script src="/code/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/code/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="/code/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/code/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="/code/js/html5shiv.js"></script>
<script src="/code/js/respond.min.js"></script>
<script src="/code/vendors/iCheck/icheck.min.js"></script>
<script src="/code/vendors/iCheck/custom.min.js"></script>
<script>
    //BEGIN CHECKBOX & RADIO
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-grey',
        increaseArea: '20%' // optional
    });
    $('input[type="radio"]').iCheck({
        radioClass: 'iradio_minimal-grey',
        increaseArea: '20%' // optional
    });
    //END CHECKBOX & RADIO
</script>
</body>
</html>