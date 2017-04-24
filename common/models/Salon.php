<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon".
 *
 * @property integer $salon_id
 * @property integer $salon_group_id
 * @property string $pos_shop_cd
 * @property string $salon_name
 * @property string $salon_kana
 * @property string $salon_tel
 * @property string $zip_cd
 * @property string $jis_code
 * @property string $addr_ken
 * @property string $addr_shi
 * @property string $addr_cho
 * @property string $addr_bldg
 * @property double $longitude
 * @property double $latitude
 * @property integer $salon_type
 * @property integer $gender_type
 * @property string $holiday_other
 * @property string $open_time
 * @property string $close_time
 * @property string $open_other
 * @property integer $reservable_days
 * @property integer $capacity
 * @property integer $timelimit_atday
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Salon extends \yii\db\ActiveRecord
{

    public $open_date_hour;
    public $open_date_min;
    public $close_date_hour;
    public $close_date_min;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_group_id', 'pos_shop_cd', 'salon_name', 'salon_kana', 'salon_tel', 'zip_cd', 'jis_code', 'addr_ken', 'addr_shi', 'addr_cho', 'longitude', 'latitude', 'capacity'], 'required', 'message' => \Yii::t('app', 'validation required')],
            [['salon_group_id', 'salon_type', 'gender_type', 'reservable_days', 'capacity', 'timelimit_atday', 'status', 'admin_id'], 'integer', 'message' => \Yii::t('app', 'validation integer')],
            [['longitude', 'latitude'], 'number', 'message' => \Yii::t('app', 'validation number')],
            [['open_time', 'close_time', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['pos_shop_cd'], 'string', 'max' => 6, 'tooLong' => \Yii::t('app', 'validation max string {number}', ['number' => 6])],
            [['salon_name', 'salon_kana', 'addr_ken', 'addr_shi', 'addr_cho', 'addr_bldg', 'holiday_other', 'open_other'], 'string', 'max' => 255, 'tooLong' => \Yii::t('app', 'validation max string {number}', ['number' => 255])],
            [['salon_tel'], 'string', 'max' => 12, 'tooLong' => \Yii::t('app', 'validation max string {number}', ['number' => 12])],
            [['zip_cd'], 'string', 'max' => 8, 'tooLong' => \Yii::t('app', 'validation max string {number}', ['number' => 8])],
            [['jis_code'], 'string', 'max' => 5, 'tooLong' => \Yii::t('app', 'validation max string {number}', ['number' => 5])],
            [['timelimit_atday'], 'string', 'max' => 3, 'tooLong' => \Yii::t('app', 'validation max string 3')],
            [['close_time'], 'validateCloseDateField'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_id' => 'Salon ID',
            'salon_group_id' => 'Salon Group ID',
            'pos_shop_cd' => 'Pos Shop Cd',
            'salon_name' => '名称',
            'salon_kana' => '名称（カナ）',
            'salon_tel' => '電話番号',
            'zip_cd' => '郵便番号',
            'jis_code' => '都道府県',
            'addr_ken' => 'Addr Ken',
            'addr_shi' => '市区町村',
            'addr_cho' => '町名以下',
            'addr_bldg' => 'ビル名以下',
            'longitude' => '緯度',
            'latitude' => '経度',
            'salon_type' => 'サロン種別',
            'gender_type' => '性別限定区分',
            'holiday_other' => '定休日',
            'open_time' => 'Open Time',
            'close_time' => 'Close Time',
            'open_other' => '営業時間（その他',
            'reservable_days' => '予約可能日数',
            'capacity' => '予約可能日数',
            'timelimit_atday' => '受入可能人数',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    public function validateCloseDateField($attribute)
    {
        if ($this->close_time <= $this->open_time) {
            $this->addError($attribute, \Yii::t('app', 'validation open time greate than close time'));
        }
    }

    /*
     * getBySalonId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @return object
     */

    public static function getBySalonId($salonId)
    {
        return Salon::findOne(['salon_id' => $salonId]);
    }

    /*
     * getSalonByGroupId
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     * @param $groupId int
     * @return object
     */

    public static function getSalonByGroupId($groupId)
    {
        return Salon::findAll(['salon_group_id' => $groupId]);
    }

}
