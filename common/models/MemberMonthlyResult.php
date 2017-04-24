<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_monthly_result".
 *
 * @property integer $id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property integer $salon_id
 * @property integer $num_year
 * @property integer $num_month
 * @property string $batch_datetime
 * @property integer $salon_membertype_id
 * @property integer $count_limit
 * @property integer $count_visit
 * @property integer $count_extra_visit
 * @property integer $count_cancel
 * @property integer $count_reserve_web
 * @property integer $count_event_entry
 * @property integer $count_event_entry_web
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberMonthlyResult extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_monthly_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'salon_id'], 'required'],
            [['member_id', 'salon_id', 'num_year', 'num_month', 'salon_membertype_id', 'count_limit', 'count_visit', 'count_extra_visit', 'count_cancel', 'count_reserve_web', 'count_event_entry', 'count_event_entry_web', 'admin_id'], 'integer'],
            [['batch_datetime', 'reg_datetime', 'upd_datetime'], 'safe'],
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
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'salon_id' => 'Salon ID',
            'num_year' => 'Num Year',
            'num_month' => 'Num Month',
            'batch_datetime' => 'Batch Datetime',
            'salon_membertype_id' => 'Salon Membertype ID',
            'count_limit' => 'Count Limit',
            'count_visit' => 'Count Visit',
            'count_extra_visit' => 'Count Extra Visit',
            'count_cancel' => 'Count Cancel',
            'count_reserve_web' => 'Count Reserve Web',
            'count_event_entry' => 'Count Event Entry',
            'count_event_entry_web' => 'Count Event Entry Web',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
