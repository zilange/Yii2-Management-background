<?php

namespace app\controllers;

use Yii;

class UserController extends TMSController
{
    public $access = true;

    /**
     * 退出登录
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        $jump = Yii::$app->request->get('jump', '/super');

        Yii::$app->user->logout();
        Yii::$app->session->destroy();
        return $this->redirect(['/login', 'jump' => $jump]);
    }
}
