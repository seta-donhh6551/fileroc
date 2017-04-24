<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_membertype_facility".
 *
 * @property integer $salon_membertype_facility_id
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property integer $facility_id
 * @property integer $max_usage_time
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonMembertypeFacility extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_membertype_facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_membertype_id', 'salon_id', 'facility_id', 'max_usage_time'], 'required'],
            [['salon_membertype_id', 'salon_id', 'facility_id', 'max_usage_time', 'status', 'admin_id'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_membertype_facility_id' => 'Salon Membertype Facility ID',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'facility_id' => 'Facility ID',
            'max_usage_time' => 'Max Usage Time',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
