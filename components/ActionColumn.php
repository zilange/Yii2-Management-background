<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of ActionColumn
 *
 * @author kevin.ye
 */
class ActionColumn extends \kartik\grid\ActionColumn {

    public $width = '200px';
    public $viewLabel   = '查看';
    public $updateLabel = '编辑';
    public $deleteLabel = '删除';

    /**
     * Render default action buttons
     *
     * @return string
     */
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view']))
        {
            $this->buttons['view'] = function ($url, $model)
            {
                return \yii\helpers\Html::a('<i class="fa fa-search"></i> '.$this->viewLabel, $url, ['class' => 'btn btn-info btn-xs']);
            };
        }
        if (!isset($this->buttons['update']))
        {
            $this->buttons['update'] = function ($url, $model)
            {
                return \yii\helpers\Html::a('<i class="fa fa-edit"></i> '.$this->updateLabel, $url, ['class' => 'btn btn-orange btn-xs']);
            };
        }
        if (!isset($this->buttons['delete']))
        {
            $this->buttons['delete'] = function ($url, $model)
            {
                $options = [
                    'class'        => 'btn btn-dark btn-xs',
                    'data-confirm' => '确定删除？',
                    'data-method'  => 'post',
                    'data-pjax'    => '0'
                ];
                return \yii\helpers\Html::a('<i class="fa fa-times" style="width:12px"></i> '.$this->deleteLabel, $url, $options);
            };
        }
    }

}
