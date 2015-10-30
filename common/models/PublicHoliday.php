<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "public_holiday".
 *
 * @property string $holiday_date
 * @property string $holiday_name
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class PublicHoliday extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public_holiday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['holiday_date', 'holiday_name'], 'required'],
            [['holiday_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['admin_id'], 'integer'],
            [['memo'], 'string'],
            [['holiday_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'holiday_date' => 'Holiday Date',
            'holiday_name' => 'Holiday Name',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
