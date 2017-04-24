<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_ticket".
 *
 * @property integer $member_ticket_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_id
 * @property integer $salon_ticket_id
 * @property integer $status
 * @property integer $use_num_exist
 * @property string $activate_date
 * @property string $disable_date
 * @property string $descrption
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberTicket extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'salon_ticket_id'], 'required'],
            [['member_id', 'salon_id', 'salon_ticket_id', 'status', 'use_num_exist', 'admin_id'], 'integer'],
            [['activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['descrption', 'memo'], 'string'],
            [['pos_member_cd'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_ticket_id' => 'Member Ticket ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_id' => 'Salon ID',
            'salon_ticket_id' => 'Salon Ticket ID',
            'status' => 'Status',
            'use_num_exist' => 'Use Num Exist',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'descrption' => 'Descrption',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
