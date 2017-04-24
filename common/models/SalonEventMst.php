<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_event_mst".
 *
 * @property integer $salon_event_mst_id
 * @property integer $salon_event_id
 * @property integer $salon_id
 * @property string $event_name
 * @property string $description
 * @property integer $usage_time
 * @property integer $capacity
 * @property integer $capacity_web
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonEventMst extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_event_mst';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_event_id', 'salon_id', 'event_name', 'usage_time', 'capacity'], 'required'],
            [['salon_event_id', 'salon_id', 'usage_time', 'capacity', 'capacity_web', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['event_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_event_mst_id' => 'Salon Event Mst ID',
            'salon_event_id' => 'Salon Event ID',
            'salon_id' => 'Salon ID',
            'event_name' => 'Event Name',
            'description' => 'Description',
            'usage_time' => 'Usage Time',
            'capacity' => 'Capacity',
            'capacity_web' => 'Capacity Web',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
