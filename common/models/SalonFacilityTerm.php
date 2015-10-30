<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_facility_term".
 *
 * @property integer $salon_facility_term_id
 * @property integer $facility_id
 * @property integer $salon_id
 * @property integer $usage_time
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonFacilityTerm extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_facility_term';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_id', 'salon_id', 'usage_time'], 'required'],
            [['facility_id', 'salon_id', 'usage_time', 'status', 'admin_id'], 'integer'],
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
            'salon_facility_term_id' => 'Salon Facility Term ID',
            'facility_id' => 'Facility ID',
            'salon_id' => 'Salon ID',
            'usage_time' => 'Usage Time',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
