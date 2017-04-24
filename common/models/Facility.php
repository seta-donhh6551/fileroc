<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facility".
 *
 * @property integer $facility_id
 * @property string $facility_name
 * @property string $facility_kana
 * @property string $facility_type
 * @property string $facility_image
 * @property string $description
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Facility extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_name', 'facility_kana'], 'required'],
            [['description', 'memo'], 'string'],
            [['status', 'admin_id'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['facility_name', 'facility_kana', 'facility_type', 'facility_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'facility_id' => 'Facility ID',
            'facility_name' => 'Facility Name',
            'facility_kana' => 'Facility Kana',
            'facility_type' => 'Facility Type',
            'facility_image' => 'Facility Image',
            'description' => 'Description',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    /*
     * getBySalonId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param int $salonId
     * @param int $salonMemberTypeId
     * @param int $gender
     * @param booleen $getOther
     * @return array
     */

    public function getBySalonId($salonId = null, $salonMemberTypeId = null, $getOther = false, $gender)
    {
        $query = new \yii\db\Query();
        $strOtherCond = '=';
        if ($getOther) {
            $strOtherCond = '<>';
            $condition = 'AND salon_facility_term.status = 1 ';
        } else {
            $condition = 'AND salon_membertype_facility.status = 1 ';
        }

        $listAll = $query->select([
                    'facility.facility_id',
                    'facility_name',
                    'usage_time',
                    'max_usage_time',
                ])
                ->from('facility')
                ->join('LEFT JOIN', 'salon_facility', 'salon_facility.facility_id = facility.facility_id')
                ->join('LEFT JOIN', 'salon_facility_term', 'salon_facility_term.facility_id = facility.facility_id AND salon_facility_term.salon_id = salon_facility.salon_id')
                ->join('LEFT JOIN', 'salon_membertype_facility', 'salon_membertype_facility.facility_id = salon_facility_term.facility_id AND salon_facility_term.salon_id = salon_membertype_facility.salon_id')
                ->where(
                        'salon_facility.salon_id = :salon_id '
                        . 'AND salon_membertype_facility.salon_membertype_id ' . $strOtherCond . ' :salon_membertype_id '
                        . 'AND salon_facility.reserve_flg = 1 '
                        . 'AND (
                                    salon_facility.status=1
                                    OR
                                    (salon_facility.status=0 AND (activate_date <= NOW() AND disable_date >= NOW() ))
                                    OR
                                    (salon_facility.status=8 AND (activate_date <= NOW() AND disable_date >= NOW() ))
                                ) '
                        . 'AND (salon_facility.gender_flg=0 or salon_facility.gender_flg= :gender) '
                        . $condition,
                        [':salon_membertype_id' => $salonMemberTypeId, ':salon_id' => $salonId, ':gender' => $gender]
                )
                ->groupBy(array('facility.facility_id'))
                ->orderBy(['salon_facility.order_no' => SORT_ASC])
                ->all();

        return $listAll;
    }

    /**
     * description: Get facility_name via salon_membertype_id
     * Author: Do Ngoc Tuan(tuandn6264@seta-asia.com.vn)
     */
    public static function getFacilityNameBySalonMemberType($salonMembertypeId)
    {
        $query = new \yii\db\Query();
        $query->select(self::tableName() . '.facility_name')
                ->from(self::tableName())
                ->join('INNER JOIN', 'salon_membertype_facility', 'salon_membertype_facility.facility_id =' . self::tableName() . '.facility_id')
                ->where(['salon_membertype_facility.salon_membertype_id' => $salonMembertypeId]);
        $command = $query->createCommand();
        return $command->queryAll();
    }

}
