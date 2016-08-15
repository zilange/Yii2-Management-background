<?php

namespace app\modules\super;

use Yii;
use yii\web\ForbiddenHttpException;

/**
 * super module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\super\controllers';
    public $defaultRoute = 'default/index';
    public $layout = 'main';
    public $title = '后台管理';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        if (!$this->vaild(Yii::$app->requestedRoute)) {
            throw new ForbiddenHttpException('对不起，您还没有获取访问的权限!');
        }

        $this->modules = [
            'admin' => [
                'class' => 'mdm\admin\Module',
                //'layout' => 'left-menu',//yii2-admin的导航菜单
            ],
        ];
    }

    /**
     * 验证访问权限函数
     * @param $action
     * @return bool
     */
    private function vaild($action)
    {
        if ($action{0} != '/') {
            $action = '/' . $action;
        }

        if (Yii::$app->user->isGuest) {
            $loginUrl = \yii\helpers\Url::to(['/login', 'jump' => $action]);
            header('location:' . $loginUrl);
            exit;
        }

        if (Yii::$app->user->can($action) or \Yii::$app->user->can('/*') or \Yii::$app->user->can('/super/*')) {
            return true;
        } else {
            return false;
        }
    }
}
