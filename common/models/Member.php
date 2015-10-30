<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
 * Date 21/01/2015
 *
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_id
 * @property string $user_name
 * @property string $user_kana
 * @property string $user_tel
 * @property string $user_tel2
 * @property string $user_email
 * @property integer $gender
 * @property string $birthday
 * @property string $zip_cd
 * @property string $jis_cd
 * @property string $addr_1
 * @property string $addr_2
 * @property string $addr_3
 * @property integer $salon_membertype_id
 * @property integer $use_limit
 * @property integer $timelimit_atday
 * @property integer $status
 * @property string $entry_date
 * @property string $withdraw_date
 * @property string $descrption
 * @property integer $salon_staff_id
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Member extends \yii\db\ActiveRecord
{

    public $membertype_id;
    public $membertype_name;
    public $createYear;
    public $createMonth;
    public $createDay;
    public $pos_id;
    public $pos1;
    public $pos2;
    public $pos3;
    //Member status label based on [member.status]
    public static $memberStatus = array(
        '0' => '0.仮会員',
        '1' => '1.本会員',
        '2' => '2.休会会員',
        '9' => '9.退会済み'
    );
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'use_limit', 'status', 'reg_datetime'], 'required'],
            [['salon_id', 'gender', 'salon_membertype_id', 'use_limit', 'timelimit_atday', 'status', 'salon_staff_id', 'admin_id'], 'integer'],
            [['birthday', 'membertype_id', 'status', 'entry_date', 'withdraw_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['descrption', 'memo'], 'string'],
            [['pos_member_cd'], 'string', 'max' => 13],
            [['user_name', 'user_kana', 'user_email', 'addr_1', 'addr_2', 'addr_3'], 'string', 'max' => 255],
            [['user_tel', 'user_tel2'], 'string', 'max' => 12],
            [['zip_cd'], 'string', 'max' => 8],
            [['jis_cd'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_id' => 'Salon ID',
            'user_name' => 'User Name',
            'user_kana' => 'User Kana',
            'user_tel' => 'User Tel',
            'user_tel2' => 'User Tel2',
            'user_email' => 'User Email',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'zip_cd' => 'Zip Cd',
            'jis_cd' => 'Jis Cd',
            'addr_1' => 'Addr 1',
            'addr_2' => 'Addr 2',
            'addr_3' => 'Addr 3',
            'salon_membertype_id' => 'Salon Membertype ID',
            'use_limit' => 'Use Limit',
            'timelimit_atday' => 'Timelimit Atday',
            'status' => 'Status',
            'entry_date' => 'Entry Date',
            'withdraw_date' => 'Withdraw Date',
            'descrption' => 'Descrption',
            'salon_staff_id' => 'Salon Staff ID',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

    /**
     * description Get Member Info Join With Salon_membertype
     * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date 30/01/2015
     */
    public static function getMemberWithSalonMembertype($memberId, $salonId = null)
    {
        $query = new \yii\db\Query();
        $condition = [];
        $condition['member_id'] = $memberId;
        if ($salonId) {
            $condition['member.salon_id'] = $salonId;
        }
        $query->select('*, member.status AS member_status')
                ->from(self::tableName())
                ->join('LEFT JOIN', 'salon_membertype', 'salon_membertype.salon_membertype_id =' . self::tableName() . '.salon_membertype_id'
                )
                ->where($condition);
        $command = $query->createCommand();
        return $command->queryOne();
    }

    /**
     * Get info booking
     * @author Nguyen Binh Nguyen(nguyennb6390@seta-asia.com.vn)
     * @param int $memberId
     * @return array
     */
    public function getInfoBooking($memberId = null)
    {
        $query = new \yii\db\Query();
        $listAll = $query->select([
                    'user_name',
                    'user_kana',
                    'user_tel',
                    'member.admin_id',
                    'member.salon_id',
                    'member.gender',
                    'salon_membertype.gender_type',
                    'salon_membertype.salon_membertype_id',
                    'salon_membertype.use_limit',
                    'salon_membertype.start_time',
                    'salon_membertype.close_time',
                    'salon_membertype.timelimit_flg',
                    'salon.salon_name',
                    'membertype_name',
                    'pos_member_cd',
                    'reservable_days',
                    'capacity',
                ])
                ->from('member')
                ->join('INNER JOIN', 'salon_membertype', 'member.salon_id = salon_membertype.salon_id AND salon_membertype.salon_membertype_id = member.salon_membertype_id')
                ->join('INNER JOIN', 'salon', 'salon.salon_id = member.salon_id')
                ->where(['member.member_id' => $memberId])
                ->one();

        return $listAll;
    }

    /**
     * description Get list pagination
     * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date 21/01/2015
     * Update 27/01/2015
     */
    public function listMemberAjaxSearch($data=[], $limit, $offset, $salonId)
    {
        $table = $this->tableName();
        $query = new \yii\db\Query();
        $query->select('member_id,pos_member_cd,user_name,user_kana,user_tel,gender,addr_1,addr_2,addr_3,member.use_limit,member.timelimit_atday,member.status,member.salon_membertype_id,salon_membertype.membertype_name')
                ->from($table)
                ->join('LEFT JOIN', 'salon_membertype', 'salon_membertype.salon_membertype_id =' . $table . '.salon_membertype_id'
        );
        $where = [$table.'.salon_id' => $salonId];
        if(isset($data['status']) && $data['status'] != null){
            $where[$table.'.status'] = $data['status'];
        }
        if(isset($data['salon_membertype_id']) && $data['salon_membertype_id'] != null){
            $where['salon_membertype.salon_membertype_id'] = $data['salon_membertype_id'];
        }
        $query->where($where);
        $type = (isset($data['type']) && $data['type'])?$data['type']:'member_id';
        $sort = (isset($data['sort']) && $data['sort'])?$data['sort']:'asc';
        $query->orderBy($type . ' ' . $sort);
        if ($offset != null) {
            $query->limit($limit);
            $query->offset($offset);
        } else {
            $query->limit($limit);
            $query->offset(0);
        }
        $command = $query->createCommand();
        $result = $command->queryAll();

        return $result;
    }

}
