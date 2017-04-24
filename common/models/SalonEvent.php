<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_event".
 *
 * @property integer $salon_event_id
 * @property integer $salon_id
 * @property integer $salon_event_mst_id
 * @property string $event_name
 * @property string $description
 * @property integer $usage_time
 * @property string $start_datetime
 * @property string $end_datetime
 * @property integer $capacity
 * @property integer $capacity_web
 * @property integer $participant
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonEvent extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'salon_event_mst_id', 'event_name', 'usage_time', 'capacity', 'capacity_web'], 'required'],
            [['salon_id', 'salon_event_mst_id', 'usage_time', 'capacity', 'capacity_web', 'participant', 'status', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['start_datetime', 'end_datetime', 'activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['event_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_event_id' => 'Salon Event ID',
            'salon_id' => 'Salon ID',
            'salon_event_mst_id' => 'Salon Event Mst ID',
            'event_name' => 'Event Name',
            'description' => 'Description',
            'usage_time' => 'Usage Time',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
            'capacity' => 'Capacity',
            'capacity_web' => 'Capacity Web',
            'participant' => 'Participant',
            'status' => 'Status',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
