<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

class MyModel extends ActiveRecord
{
    const ATTR_DATE = 'Date';
    private function encode($elem){
        if(is_array($elem)){ // если массив экранируем каждый элемент массива
            foreach($elem as &$e){
                $e = static::encode($e);
            }
        }
        if(!is_array($elem) && !is_object($elem) && !is_bool($elem)){
            return Html::encode($elem);
        }
        return $elem;
    }

    public function beforeSave($insert)
    {
        foreach($this->attributes as $key=>$attribute){
            if($key == static::ATTR_DATE){
                $this->$key = date("yyyy-MM-dd",strtotime($this->$key));
            }
        }
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        foreach($this->attributes as $key=>$attribute){
            $this->$key = static::encode($attribute);
            if($key == static::ATTR_DATE){
                $this->$key = date("d.m.yy",strtotime($this->$key));
            }
        }
        parent::afterFind();
    }

    public function afterSave($insert, $changedAttributes)
    {
        foreach($this->attributes as $key=>$attribute){
            $this->$key = static::encode($attribute);
        }
        parent::afterSave($insert, $changedAttributes);
    }
}