<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_group".
 *
 * @property integer $group_id
 * @property string $title
 * @property string $permissions
 * @property string $created_at
 * @property string $updated_at
 * @property integer $del_flg
 *
 * @property Staff[] $staff
 */
class TblGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['permissions'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['del_flg'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'title' => 'Title',
            'permissions' => 'Permissions',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'del_flg' => 'Del Flg',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['group_id' => 'group_id']);
    }

}
