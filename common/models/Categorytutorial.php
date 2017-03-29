<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_caterory_tutorial".
 *
 * @property string $id
 * @property string $name
 * @property string $rewrite
 * @property string $keywords
 * @property string $description
 * @property string $info
 * @property integer $order
 * @property string $icon
 * @property integer $status
 * @property string $created_at
 */
class Categorytutorial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_caterory_tutorial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'keywords', 'description', 'info', 'order', 'status'], 'required'],
            [['keywords', 'description', 'info'], 'string'],
            [['order', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'rewrite'], 'string', 'max' => 150],
            [['icon'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'rewrite' => 'Rewrite',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'info' => 'Info',
            'order' => 'Order',
            'icon' => 'Icon',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
