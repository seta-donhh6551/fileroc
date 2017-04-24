<?php

namespace common\components;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class MyActiveRecord extends \yii\db\ActiveRecord
{
    //Auto save time
    //http://www.yiiframework.com/wiki/684/save-and-display-date-time-fields-in-different-formats-in-yii2/
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() {
                    return date('Y-m-d H:i:s');
                }, //unix timestamp
            ],
        ];
    }
    
    public static function find()
    {
        return new MyActiveQuery(get_called_class());
    }
    
    /*public static function find()
    {
        return parent::find()->where(['del_flg' => 0]);
    }*/
}
