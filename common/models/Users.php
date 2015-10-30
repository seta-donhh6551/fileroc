<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property integer $gender
 * @property string $phone
 * @property string $adress
 * @property string $email
 * @property string $level
 * @property integer $status
 */
class Users extends \yii\db\ActiveRecord
{
    public $repassword;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'repassword','email'], 'required', 'message' => \yii::t('app', 'validation required')],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => \yii::t('app', 'validation match')],
            [['email'], 'email', 'message' => \yii::t('app', 'validation email')],
            [['gender', 'level', 'status'], 'integer'],
            [['name', 'adress', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'adress' => 'Adress',
            'email' => 'Email',
            'level' => 'Level',
            'status' => 'Status',
        ];
    }
    
    /**
     * @description gel all user
     * @Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @Date 28/02/2015
     */
    public function getListUsers()
    {
        $query = new \yii\db\Query();
        $query->select('*')
                ->from($this->tableName());    
        $command = $query->createCommand();
        return $command->queryAll();
    }
}
