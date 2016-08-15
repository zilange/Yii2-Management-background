<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class TMSController extends Controller
{
    private $user;
    public $title;
    public $description = null;
    public $hideAddBtn = true;
    public $access = false;

    public function init()
    {
        //parent::init();
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws ForbiddenHttpException
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/login');
            return false;
        }

        if ($this->access || Yii::$app->user->can('/' . Yii::$app->controller->route)) {
            return true;
        } else {
            throw new ForbiddenHttpException('对不起，您现在还没有获取此操作权限！');
        }
    }
}
