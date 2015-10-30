<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_schedule".
 *
 * @property integer $member_schedule_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property string $user_name
 * @property string $user_kana
 * @property string $user_tel
 * @property string $start_datetime
 * @property string $end_datetime
 * @property integer $entry_type
 * @property integer $status
 * @property integer $visit_type
 * @property integer $visit_flg
 * @property string $cancel_date
 * @property integer $count_monthly
 * @property string $description
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberSchedule extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'user_kana', 'user_tel', 'start_datetime', 'end_datetime', 'entry_type', 'count_monthly'], 'required'],
            [['member_id', 'salon_membertype_id', 'salon_id', 'entry_type', 'status', 'visit_type', 'visit_flg', 'count_monthly', 'admin_id'], 'integer'],
            [['start_datetime', 'end_datetime', 'cancel_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['description', 'memo'], 'string'],
            [['pos_member_cd', 'user_tel'], 'string', 'max' => 13],
            [['user_name', 'user_kana'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_schedule_id' => 'Member Schedule ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'user_name' => 'User Name',
            'user_kana' => 'User Kana',
            'user_tel' => 'User Tel',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
            'entry_type' => 'Entry Type',
            'status' => 'Status',
            'visit_type' => 'Visit Type',
            'visit_flg' => 'Visit Flg',
            'cancel_date' => 'Cancel Date',
            'count_monthly' => 'Count Monthly',
            'description' => 'Description',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    /**
     * description: Get Max Count_Month
     * Author: Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date: 30/01/2015
     * Params : $date = date('Y-m')
     */
    public static function getMaxCountMonth($member_id, $date)
    {
        $query = new \yii\db\Query();
        $query->select('MAX(count_monthly) as maxVal')
                ->from(self::tableName())
                ->where([
                    'member_id' => $member_id,
                    "DATE_FORMAT(start_datetime,'%Y-%m')" => $date
                ]);
        $command = $query->createCommand();
        $countMonthly = $command->queryOne();
        
        return $countMonthly['maxVal'];
    }
    
    /**
     * description: Get Member schedule
     * Author: Do Ngoc Tuan(tuandn6264@seta-asia.com.vn)
     * @param memberId
	 * @return array
     */
    public static function getMemberSchedule($memberId, $date = NULL, $type = NULL, $limit = NULL, $dateCompare = 'equal')
    {
        $query = new \yii\db\Query();
        $conditions = 'member.member_id = ' . $memberId;
        
        if ($date) {
           if ($dateCompare == 'equal') {
                $conditions .= ' AND DATE(member_schedule.start_datetime) = "'.$date.'"';
           } elseif ('smaller') {
               $conditions .= ' AND member_schedule.start_datetime >= "'.$date.'"';
           }
        }
        
        if ($type) {
            if (is_array($type)) {
                $conditions .= ' AND member_schedule.status IN (' . implode($type, ",") . ')';
            } else {
                $conditions .= ' AND member_schedule.status = ' . $type;
            }
        }
        
        $query->select('member_schedule.member_schedule_id, member_schedule.start_datetime, member_schedule.end_datetime, member_schedule.description')
                ->from(self::tableName())
                ->join('INNER JOIN', 'member', 'member.member_id = member_schedule.member_id')
                ->where($conditions)
                ->orderBy('member_schedule_id DESC');
        if ($limit) {
            $query->limit($limit);
        }      
        $command = $query->createCommand();
        
        return $command->queryAll();
    }

    /**
     * description Get Member schedule join with salon_membertype
     * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @param memberId
	 * @return array
     */
    public static function getMemberScheduleWithSalon($memberId, $orderBy = null)
    {
        $query = new \yii\db\Query();
        $conditions = [self::tableName().'.member_id' => $memberId];
        
        $query->select('member_schedule.member_schedule_id, member_schedule.start_datetime, member_schedule.end_datetime, member_schedule.description,member_schedule.entry_type,'
                . 'member_schedule.salon_membertype_id,member_schedule.cancel_date,member_schedule.status,member_schedule.visit_type,member_schedule.visit_flg,salon_membertype.membertype_name')
                ->from(self::tableName())
                ->join('LEFT JOIN', 'salon_membertype', 'salon_membertype.salon_membertype_id = member_schedule.salon_membertype_id')
                ->where($conditions);
        if ($orderBy) {
            $query->orderBy('start_datetime '.$orderBy);
        }      
        $command = $query->createCommand();
        return $command->queryAll();
    }
    /**
     * description Get count by day
     * @param int $salonId
     * @param string $strDateBooking
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public static function getCountBookByDay($salonId = null, $strDateBooking = null)
    {
        if (!$strDateBooking) {
            $strDateBooking = date('Y-m-d');
        }

        $query = new \yii\db\Query();
        $count = $query->select('*')
                ->from(self::tableName())
                ->where(['salon_id' => $salonId, 'DATE_FORMAT(start_datetime, "%Y-%m-%d")' => $strDateBooking])
                ->count();

        return $count;
    }
    
    /*
     * count member schedule today
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countMemberSchedule($salonId, $status)
    {
        $query = new \yii\db\Query();
        $query->select('COUNT(member_id) as cnt')
                ->from('member_schedule')
                ->where('`status` = :status AND salon_id = :salon_id', [':salon_id' => $salonId, ':status' => $status]);
        return $query->count();
    }
    
    /*
     * count member schedule before 3 month
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countMemberScheduleBeforeToday($salonId)
    {
        $command = \Yii::$app->db->createCommand("SELECT DATE_FORMAT(start_datetime, '%Y-%m') AS month, COUNT(member_schedule_id) AS count
            FROM member_schedule 
            WHERE `status` = 8 
            AND visit_flg = 1 
            AND salon_id = :salon_id
            AND DATE_SUB(NOW(),INTERVAL 3 MONTH) <= start_datetime
            GROUP BY DATE_FORMAT(start_datetime, '%Y-%m')
            ORDER BY start_datetime DESC
            ");
        $command->bindParam(':salon_id', $salonId);
        
        return $command->queryAll();
    }
    
    /*
     * count member schedule ater 3 month
     * 
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function countMemberScheduleAfterToday($salonId)
    {
        $command = \Yii::$app->db->createCommand("SELECT DATE_FORMAT(start_datetime, '%Y-%m') AS month, COUNT(member_schedule_id) AS count
            FROM member_schedule 
            WHERE `status` = 1 
            AND salon_id = :salon_id
            AND DATE_ADD(NOW(),INTERVAL 3 MONTH) >= start_datetime
            AND DATE_ADD(CURDATE(),INTERVAL 1 DAY) <= start_datetime
            GROUP BY DATE_FORMAT(start_datetime, '%Y-%m')
            ORDER BY start_datetime ASC
            ");
        
        $command->bindParam(':salon_id', $salonId);
        
        return $command->queryAll();
    }

    /**
     * getById
     * @param int $memberScheduleId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public static function getById($memberScheduleId = null)
    {
        return MemberSchedule::findOne(['member_schedule_id' => $memberScheduleId]);
    }
    /**
     * cancel
     * @param int $memberScheduleId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public static function cancel($memberScheduleId = null)
    {
        $attributes = array();
        $attributes['status'] = 9;
        $attributes['cancel_date'] = new \yii\db\Expression('NOW()');
        return MemberSchedule::updateAll($attributes, ['member_schedule_id' => $memberScheduleId]);
    }

}
