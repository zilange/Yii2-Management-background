<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

class AnlColumns extends Component {

    public $filterType;
    public $model;
    public $attribute;
    public $class;
    public $noWrap      = true;
    public $format      = 'raw';
    public $pageSummary = false;
    public $mergeHeader = false;
    public $filter      = true;
    public $width;
    public $header;
    public $group       = false;
    public $subGroupOf  = false;

    /**
     * 生成GridView列数据
     * 
     * @param
     *            $attribute
     * @param string $filterType            
     * @return multitype:string NULL unknown
     */
    function gen()
    {
        if (!$this->class)
        {
            $this->class = \kartik\grid\DataColumn::className();
        }

        $col = [
            'class'     => $this->class,
            'attribute' => $this->attribute,
            'vAlign'    => 'middle',
            'width'     => $this->width,
            'noWrap'    => $this->noWrap,
            'group'     => $this->group,
            'subGroupOf' => $this->subGroupOf,
            //'label'     => ArrayHelper::getValue($this->model->attributeLabels(), $this->attribute),
            'value'     => function ($model, $key, $index, $widget)
            {

                $callFunc    = $widget->attribute . "Func";
                $callFuncBak = \yii\helpers\Inflector::variablize($callFunc);
                if (method_exists($model, $callFunc))
                {
                    return $model->$callFunc($model, $key, $index, $widget);
                }
                elseif (method_exists($model, $callFuncBak))
                {
                    return $model->$callFuncBak($model, $key, $index, $widget);
                }
                else
                {

                    $attribute = $widget->attribute;
                    return $model->$attribute;
                }
            },
            'format'      => $this->format,
            'pageSummary' => $this->pageSummary,
            'mergeHeader' => $this->mergeHeader,
            'filter'      => $this->filter,
        ];

        if ($this->header)
        {
            $col['header'] = $this->header;
        }
        switch ($this->filterType)
        {

            case GridView::FILTER_SELECT2:
                
                if ( ! is_array($this->filter))
                {
                    $model    = $this->model;
                    $callFunc = $this->attribute . "Filter";
                    if (method_exists($model, $callFunc))
                    {
                        $this->filter = $model->$callFunc();
                    }
                    else
                    {
                        $callFunc = \yii\helpers\Inflector::variablize($callFunc);
                        $this->filter   = $model->$callFunc();
                    }
                }

                $col = ArrayHelper::merge($col, [
                            'filterInputOptions'  => [
                                'placeholder' => '全部'
                            ],
                            'filterType'          => GridView::FILTER_SELECT2,
                            'filter'              => $this->filter,
                            'filterWidgetOptions' => [
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ]
                ]);

                break;
        }
        return $col;
    }

}

?>