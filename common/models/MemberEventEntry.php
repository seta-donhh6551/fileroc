<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_event_entry".
 *
 * @property integer $member_event_entry_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_membertype_id
 * @property integer $salon_id
 * @property string $user_name
 * @property string $user_kana
 * @property string $user_tel
 * @property integer $salon_event_id
 * @property integer $entry_type
 * @property integer $status
 * @property integer $visit_flg
 * @property string $cancel_date
 * @property string $description
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberEventEntry extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_event_entry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'user_kana', 'user_tel', 'entry_type'], 'required'],
            [['member_id', 'salon_membertype_id', 'salon_id', 'salon_event_id', 'entry_type', 'status', 'visit_flg', 'admin_id'], 'integer'],
            [['cancel_date', 'reg_datetime', 'upd_datetime'], 'safe'],
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
            'member_event_entry_id' => 'Member Event Entry ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_id' => 'Salon ID',
            'user_name' => 'User Name',
            'user_kana' => 'User Kana',
            'user_tel' => 'User Tel',
            'salon_event_id' => 'Salon Event ID',
            'entry_type' => 'Entry Type',
            'status' => 'Status',
            'visit_flg' => 'Visit Flg',
            'cancel_date' => 'Cancel Date',
            'description' => 'Description',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
