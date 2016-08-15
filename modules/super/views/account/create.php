<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Account */

$this->title = $this->context->title;
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
<div class="portlet box">
        <div class="panel">
            <div class="panel-heading">添加数据</div>
            <div class="form-body pal">
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>

            </div>

        </div>
    </div>
</div>
