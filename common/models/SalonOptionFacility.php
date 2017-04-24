<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_option_facility".
 *
 * @property integer $salon_option_facility_id
 * @property integer $salon_option_id
 * @property integer $salon_id
 * @property integer $facility_id
 * @property integer $use_limit
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonOptionFacility extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_option_facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_option_id', 'salon_id', 'facility_id'], 'required'],
            [['salon_option_id', 'salon_id', 'facility_id', 'use_limit', 'admin_id'], 'integer'],
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
            'salon_option_facility_id' => 'Salon Option Facility ID',
            'salon_option_id' => 'Salon Option ID',
            'salon_id' => 'Salon ID',
            'facility_id' => 'Facility ID',
            'use_limit' => 'Use Limit',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
