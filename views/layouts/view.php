<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="col-lg-12">
        <div class="portlet box">

            <div class="panel">
                <div class="panel-heading">数据查看</div>

                <div class="form-body pal">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => $attributes,
                    ]) ?>
                    <?if($actionBtn):?>
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
                    <?endif;?>
                </div>
            </div>
        </div>
    </div>

</div>
