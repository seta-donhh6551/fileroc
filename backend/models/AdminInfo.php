<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_info".
 *
 * @property integer $info_id
 * @property integer $admin_id
 * @property string $info_title
 * @property string $info_body
 * @property integer $status
 * @property string $open_datetime
 * @property string $close_datetime
 * @property string $reg_datetime
 * @property string $upd_datetime
 */
class AdminInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'status', 'open_datetime', 'close_datetime'], 'required'],
            [['admin_id', 'status'], 'integer'],
            [['info_body'], 'string'],
            [['open_datetime', 'close_datetime', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['info_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'admin_id' => 'Admin ID',
            'info_title' => 'Info Title',
            'info_body' => 'Info Body',
            'status' => 'Status',
            'open_datetime' => 'Open Datetime',
            'close_datetime' => 'Close Datetime',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
        ];
    }
}
