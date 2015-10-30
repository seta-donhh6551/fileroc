<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_group".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberGroup extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'member_id'], 'required'],
            [['group_id', 'member_id', 'admin_id'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['pos_member_cd'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
