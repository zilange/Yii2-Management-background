<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel-body pan">
<div class="account-form">

    <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'fieldConfig' => [],
                    'options' => ['enctype' => 'multipart/form-data'],
        ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'status')->textInput() ?>

    <?//= $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
	<div class="col-md-offset-3 col-md-9">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
