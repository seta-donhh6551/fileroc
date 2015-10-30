<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_ticket".
 *
 * @property integer $salon_ticket_id
 * @property integer $salon_id
 * @property string $ticket_name
 * @property string $description
 * @property integer $use_num_limit
 * @property string $use_limit_type
 * @property integer $use_term
 * @property integer $facility_id
 * @property integer $salon_facility_term_id
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonTicket extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'ticket_name', 'use_term', 'facility_id', 'salon_facility_term_id'], 'required'],
            [['salon_id', 'use_num_limit', 'use_term', 'facility_id', 'salon_facility_term_id', 'status', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['ticket_name'], 'string', 'max' => 255],
            [['use_limit_type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_ticket_id' => 'Salon Ticket ID',
            'salon_id' => 'Salon ID',
            'ticket_name' => 'Ticket Name',
            'description' => 'Description',
            'use_num_limit' => 'Use Num Limit',
            'use_limit_type' => 'Use Limit Type',
            'use_term' => 'Use Term',
            'facility_id' => 'Facility ID',
            'salon_facility_term_id' => 'Salon Facility Term ID',
            'status' => 'Status',
            'activate_date' => 'Activate Date',
            'disable_date' => 'Disable Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
