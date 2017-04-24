<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_membertype".
 *
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property string $membertype_name
 * @property string $description
 * @property integer $gender_type
 * @property integer $use_limit
 * @property integer $holiday_type
 * @property integer $timelimit_flg
 * @property string $start_time
 * @property string $close_time
 * @property integer $timelimit_atday
 * @property integer $facility_flg
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonMembertype extends \yii\db\ActiveRecord
{
    //Holiday type label based on [salon_membertype.holiday_type]
    public static $holidayType = array(
        '1' => '平日',
        '2' => 'ホリデイ(週末祝祭日･休日)',
        '9' => 'フリー'
    );
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_membertype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'membertype_name'], 'required'],
            [['salon_id', 'gender_type', 'use_limit', 'holiday_type', 'timelimit_flg', 'timelimit_atday', 'facility_flg', 'status', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['start_time', 'close_time', 'activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['membertype_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'membertype_name' => 'Membertype Name',
            'description' => 'Description',
            'gender_type' => 'Gender Type',
            'use_limit' => 'Use Limit',
            'holiday_type' => 'Holiday Type',
            'timelimit_flg' => 'Timelimit Flg',
            'start_time' => 'Start Time',
            'close_time' => 'Close Time',
            'timelimit_atday' => 'Timelimit Atday',
            'facility_flg' => 'Facility Flg',
            'status' => 'Status',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    /*
     * Get all salon membertype by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function getAllSalonMembertypeBySalonId($salonId)
    {
        return $this->find()
                        ->where(['salon_id' => $salonId, 'status' => 1])
                        ->all();
    }
    
    /*
     * Get count member membertype by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countAllMemberHaveMemberType($salonId)
    {
        $query = new \yii\db\Query();
        $query->select('COUNT(member.member_id) as cnt')
                ->from(self::tableName())
                ->where('member.`status` = 1 AND salon_membertype.salon_id = :salon_id AND member.salon_membertype_id IS NOT NULL', [':salon_id' => $salonId])
                ->leftJoin('member', 'member.salon_membertype_id = salon_membertype.salon_membertype_id');
        return $query->count();
    }
    
     /*
     * Get count member leave sytem by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countAllMemberLeaveSystem($salonId)
    {
        $query = new \yii\db\Query();
        $query->select('COUNT(member_id) as cnt')
                ->from('member')
                ->where('`status` = 2 AND salon_id = :salon_id', [':salon_id' => $salonId]);
        return $query->count();
    }
    
    /*
     * Get count member membertype by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countAllMemberGroupMemberType($salonId)
    {
        $query = new \yii\db\Query();
        $query->select('salon_membertype.membertype_name, COUNT(member.member_id) as cnt')
                ->from(self::tableName())
                ->where('member.`status` = 1 AND salon_membertype.salon_id = :salon_id AND member.salon_membertype_id IS NOT NULL', [':salon_id' => $salonId])
                ->leftJoin('member', 'member.salon_membertype_id = salon_membertype.salon_membertype_id')
                ->groupBy('member.salon_membertype_id');
        $command = $query->createCommand();
        return $command->queryAll();
    }
    
    /*
     * Get count member membertype by salon id
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countAllMemberVisitor($salonId)
    {
        $query = new \yii\db\Query();
        $query->select('COUNT(member_id) as cnt')
                ->from('member')
                ->where('`status` = 1 AND salon_id = :salon_id AND salon_membertype_id IS NULL', [':salon_id' => $salonId]);
        
        return $query->count();
    }

    /**
     * description: Get list Member type name for search
     * Author: Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date: 26/01/2015
     */
    public function getMemberTypeName($salonId)
    {
        $query = new \yii\db\Query();
        $query->select('*')
                ->from(self::tableName())
                ->where(['status' => 1, 'salon_id' => $salonId])
                ->orderBy('membertype_name asc');
        $command = $query->createCommand();
        return $command->queryAll();
    }

}
