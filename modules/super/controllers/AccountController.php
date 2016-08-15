<?php

namespace app\modules\super\controllers;

use Yii;
use app\models\Account;
use app\models\AccountSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\AnlColumns;
use app\components\AnlAttribute;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends SuperController
{
    public $title = "用户列表";
    public $descriptions = "";
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->model = $searchModel;
        $attributeLabels = $searchModel->attributeLabels(); 
        //获取$attributeLabels的变量进行初始化
        $labels = array_fill_keys(array_keys($attributeLabels), []);
        
        /**
         * 自定义列显示规则
         *
        $labels['type']['filterType'] = GridView::FILTER_SELECT2;
        $labels['bank']['filterType'] = GridView::FILTER_SELECT2;
        $labels['money']['pageSummary'] = true;
        $labels['id']['pageSummary'] = "小计";
        $labels['status']['class'] = 'kartik\grid\BooleanColumn';
        $labels['created']['format'] = [
            'date',
            'Y-M-d'
        ];
        */
        $labels['id']['mergeHeader'] = true;
        $labels['updated']['mergeHeader'] = true;
        $labels['status']['class'] = 'kartik\grid\BooleanColumn';
        unset($labels['auth_key'], $labels['password_hash'], $labels['password_reset_token']);
        foreach ($labels as $k => $v) {
            $labels[$k]['attribute'] = $k;
            $labels[$k]['model'] = $this->model;
            $columns[] = (new AnlColumns($labels[$k]))->gen();
        }

        $columns[] = [
            'class' => '\kartik\grid\ActionColumn'
        ];

        return $this->render('@app/views/layouts/index.php', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'columns' => $columns
        ]);
    }

    /**
     * Displays a single Account model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            $attributeLabels = $model->attributeLabels();
            $labels = array_fill_keys(array_keys($attributeLabels), []);
            $attributes = array();
            $actionBtn = false;
            foreach ($labels as $k => $v) {
                $labels[$k]['attribute'] = $k;
                $labels[$k]['model'] = $model;
                $attributes[] = (new AnlAttribute($labels[$k]))->gen();
            }
            return $this->render('@app/views/layouts/view', [
                'model' => $model,
                'attributes'=>$attributes,
                'actionBtn'=>$actionBtn,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Account();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password_hash = md5($model->password_hash . 'zaq1xsw2');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $password_hash = $model->password_hash;

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            if ($password_hash == $post['Account']['password_hash']) {
                $model->password_hash = $password_hash;
            } else {
                $model->password_hash = md5($post['Account']['password_hash'] . 'zaq1xsw2');
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Account model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ($id != 2) {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
