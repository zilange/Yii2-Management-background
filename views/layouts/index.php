<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

//纯粹为了好看，引入editTable的CSS
\kartik\editable\EditableAsset::register($this);
$this->params['breadcrumbs'][] = $this->context->title;
?>
<div class="row">
<?if($this->context->descriptions):?>
    <div class="col-lg-12">
        <div class="note note-success">
            <h4 class="box-heading"><?= $this->context->title ?></h4>

            <p><?= $this->context->descriptions ?></p>
        </div>
    </div>
<?endif;?>

<?php if(Yii::$app->session['danger'] !== null):?>
    <div class="col-lg-12">
        <div class="note note-danger">
            <p><?= Yii::$app->session['danger']?></p>
        </div>
    </div>
<?php endif?>
<?php Yii::$app->session['danger'] = null?>

<div class="col-lg-12">

    <?php

    $hideBtn = \yii\helpers\ArrayHelper::getValue($this->context,"hideAddBtn",false);
    $before = $hideBtn?"":Html::a('<i class="glyphicon glyphicon-plus"></i> 添加新数据', ['create'], ['class' => 'btn btn-info']);

    /*$before .= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'container' => ['class' => 'pull-right'],
        'dropdownOptions' => ['menuOptions' => ['class' => 'pull-right']],
        'columns' => $columns,
        'filename' => $this->context->title,
        'showColumnSelector' => FALSE,
        'export' => false,
        'encoding' => 'gbk',
        'exportFormOptions' => ['id' => 'filter'],
        'exportConfig' => [
            ExportMenu::FORMAT_HTML => FALSE,
            ExportMenu::FORMAT_PDF  => FALSE,
            ExportMenu::FORMAT_TEXT => FALSE,
        ]
    ]);*/

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'pjax' => true,
        'floatHeader' => false,
        'hover' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'export' => false,
        'showPageSummary' => true,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
            'heading'=>'<h3 class="panel-title">{toolbar}<i class="fa fa-table fa-fw"></i> 数据列表</h3>',
            'showFooter'=>true,
            'before' => $before,
        ],

    ]); ?>


</div>
</div>