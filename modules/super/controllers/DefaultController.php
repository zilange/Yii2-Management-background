<?php

namespace app\modules\super\controllers;


/**
 * Default controller for the `super` module
 */
class DefaultController extends SuperController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
