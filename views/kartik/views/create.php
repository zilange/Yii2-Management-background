<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $this->context->title;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
<div class="portlet box">
        <div class="panel">
            <div class="panel-heading">添加数据</div>
            <div class="form-body pal">
                <?= "<?= " ?>$this->render('_form', [
                'model' => $model,
                ]) ?>

            </div>

        </div>
    </div>
</div>
