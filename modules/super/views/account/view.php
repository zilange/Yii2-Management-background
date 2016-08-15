<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Account */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-view">

    <div class="col-lg-12">
        <div class="portlet box">

            <div class="panel">
                <div class="panel-heading">数据查看</div>

                <div class="form-body pal">
                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            'created',
            'updated',
                    ],
                    ]) ?>
                    <p>
                        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => '确定要删除么?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>



</div>






</div>
