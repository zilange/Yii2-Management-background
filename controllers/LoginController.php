<?php

namespace app\controllers;

use app\models\Account;
use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
    public $layout = false;

    public function init()
    {

    }

    /**
     * 用户登录
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        Yii::$app->user->logout();
        $message = null;
        $uid = false;
        $autologin = false;
        $token = Yii::$app->request->get("token");
        $jump = Yii::$app->request->get('jump', '/super/');
        if (Yii::$app->request->isPost) {
            $username = Yii::$app->request->post('username');
            $password = Yii::$app->request->post('password');
            $autologin = Yii::$app->request->post('autologin', 0);
            if (!$username || !$password || strlen($password) < 4) {
                $message = '用户名或密码格式不正确！';
            }
            if (!isset($message)) {
                $account = Account::find()->where(['username' => $username])->one();
                if ($account !== null) {
                    if ($account->validatePassword($password)) {
                        if (Yii::$app->user->login($account, $autologin ? 3600 * 24 * 30 : 0)) {
                            $uid = $account->id;
                        }
                    } else {
                        $message = '用户名或密码不正确！';
                    }
                } else {
                    $message = '用户不存在！';
                }
            }
        }

        if ($uid) {
            Yii::$app->user->logout();
            $account = Account::findIdentity($uid);
            if (!$account) {
                $data['message'] = '需要开通，请与管理员联系！';
            } elseif ($account->status == 0) {
                $data['message'] = '账户在审核中，审核通过后方可登录！';
            } else {
                Yii::$app->user->login($account, $autologin ? 3600 * 24 * 30 : 0);
                Yii::$app->session->set('token', $token);
                return $this->redirect($jump);
            }
        }
        return $this->render('index', ['message' => $message]);
    }
}
