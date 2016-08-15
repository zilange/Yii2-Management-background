<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

class AnlAttribute extends Component {


    public $model;
    public $attribute;

    public $format = 'raw';

    /**
     * 生成GridView列数据
     * 
     * @param
     *            $attribute
     * @param string $filterType            
     * @return multitype:string NULL unknown
     */
    function gen() {
        $callFunc = $this->attribute . "Func";
        $callFuncBak = \yii\helpers\Inflector::variablize($callFunc);

        $attribute = [];

        if(method_exists($this->model, $callFunc)) {
            $attribute = $this->model->$callFunc($this->model);
        }
        elseif(method_exists($this->model, $callFuncBak)){
            $attribute = $this->model->$callFuncBak($this->model);
        }
        else{
            $attribute = ArrayHelper::getValue($this->model,$this->attribute);
        }
        $col = [

            'value' => $attribute,


            'label'=>  ArrayHelper::getValue($this->model->attributeLabels(), $this->attribute),

            'format' => $this->format,

        ];

        return $col;
    }

}

?>