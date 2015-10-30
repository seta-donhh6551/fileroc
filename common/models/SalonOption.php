<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_option".
 *
 * @property integer $salon_option_id
 * @property integer $salon_id
 * @property string $option_name
 * @property string $description
 * @property integer $status
 * @property string $activate_date
 * @property string $disable_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonOption extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_id', 'option_name'], 'required'],
            [['salon_id', 'status', 'admin_id'], 'integer'],
            [['description', 'memo'], 'string'],
            [['activate_date', 'disable_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['option_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_option_id' => 'Salon Option ID',
            'salon_id' => 'Salon ID',
            'option_name' => 'Option Name',
            'description' => 'Description',
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
