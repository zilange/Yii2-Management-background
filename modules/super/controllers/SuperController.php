<?php

namespace app\modules\super\controllers;

use Yii;
use yii\web\Controller;

/**
 * Super controller for the `super` module
 */
class SuperController extends Controller
{
    private $user;
    public $title;
    public $descriptions;
    public $model;
    public $items;
    public $hideAddBtn = false;
    public $actionBtn = true;
    public $buttons = [];

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect('/user/login');
            return false;
        }

        if (Yii::$app->user->can('/' . Yii::$app->controller->route)) {
            return true;
        } else {
            $this->actionError('对不起，您现在还没获此操作的权限');
            return false;
        }
    }

    /**
     * @param $message
     * @param string $back
     * @return string
     */
    public function actionError($message, $back = 'javascript:history.go(-1)') {
        return $this->render('@app/views/layouts/message.php', [
            'message' => $message,
            'back' => $back,
            'error' => true
        ]);
    }

    /**
     * @param $message
     * @param string $back
     * @return string
     */
    public function actionSuccess($message, $back = 'javascript:history.go(-1)') {
        return $this->render('@app/views/layouts/message.php', [
            'message' => $message,
            'back' => $back,
            'error' => false
        ]);
    }
}
