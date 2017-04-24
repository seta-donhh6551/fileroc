<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_facility".
 *
 * @property integer $salon_facility_id
 * @property integer $salon_id
 * @property integer $facility_id
 * @property string $salon_facility_name
 * @property string $description
 * @property integer $order_no
 * @property integer $reserve_flg
 * @property integer $gender_flg
 * @property integer $time_flg
 * @property integer $status
 * @property integer $interval_minutes
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonFacility extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'facility_id', 'salon_facility_name'], 'required'],
            [['salon_id', 'facility_id', 'order_no', 'reserve_flg', 'gender_flg', 'time_flg', 'status', 'interval_minutes', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['salon_facility_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_facility_id' => 'Salon Facility ID',
            'salon_id' => 'Salon ID',
            'facility_id' => 'Facility ID',
            'salon_facility_name' => 'Salon Facility Name',
            'description' => 'Description',
            'order_no' => 'Order No',
            'reserve_flg' => 'Reserve Flg',
            'gender_flg' => 'Gender Flg',
            'time_flg' => 'Time Flg',
            'status' => 'Status',
            'interval_minutes' => 'Interval Minutes',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    /*
     * Get sumary salon facility by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function getSummarySalonFacilityBySalonId($salonId)
    {
        return (new \yii\db\Query())
                        ->select('COUNT(*) AS cnt, facility.facility_id, facility.facility_name')
                        ->from('salon_facility')
                        ->innerJoin('facility', 'salon_facility.facility_id = facility.facility_id')
                        ->where(['salon_facility.salon_id' => $salonId, 'facility.status' => 1, 'salon_facility.status' => 1])
                        ->groupBy('facility.facility_id')
                        ->all();
    }

}
