<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_user".
 *
 * @property integer $admin_id
 * @property string $admin_pw
 * @property string $admin_name
 * @property string $admin_kana
 * @property integer $admin_type
 * @property integer $salon_id
 * @property string $pos_shop_cd
 * @property string $user_email
 * @property integer $status
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_pw', 'admin_name', 'admin_kana', 'admin_type'], 'required'],
            [['admin_type', 'salon_id', 'status'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['admin_pw', 'admin_name', 'admin_kana', 'user_email'], 'string', 'max' => 255],
            [['pos_shop_cd'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_pw' => 'Admin Pw',
            'admin_name' => 'Admin Name',
            'admin_kana' => 'Admin Kana',
            'admin_type' => 'Admin Type',
            'salon_id' => 'Salon ID',
            'pos_shop_cd' => 'Pos Shop Cd',
            'user_email' => 'User Email',
            'status' => 'Status',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
