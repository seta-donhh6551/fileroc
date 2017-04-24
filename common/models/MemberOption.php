<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_option".
 *
 * @property integer $member_option_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_id
 * @property integer $salon_option_id
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property string $description
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberOption extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id', 'salon_option_id'], 'required'],
            [['member_id', 'salon_id', 'salon_option_id', 'status', 'admin_id'], 'integer'],
            [['activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['description', 'memo'], 'string'],
            [['pos_member_cd'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_option_id' => 'Member Option ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_id' => 'Salon ID',
            'salon_option_id' => 'Salon Option ID',
            'status' => 'Status',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'description' => 'Description',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
