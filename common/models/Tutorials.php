<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_tutorials".
 *
 * @property string $id
 * @property string $title
 * @property string $rewrite
 * @property string $keywords
 * @property string $description
 * @property integer $views
 * @property string $thumb
 * @property string $info
 * @property string $fullcontent
 * @property integer $order_by
 * @property integer $status
 * @property integer $user_id
 * @property string $creat_date
 */
class Tutorials extends \yii\db\ActiveRecord
{
    public $imgUpload;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tutorials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'rewrite', 'keywords', 'description', 'views', 'thumb', 'info', 'fullcontent', 'order_by', 'status', 'user_id', 'creat_date'], 'required'],
            [['keywords', 'description', 'info', 'fullcontent'], 'string'],
            [['views', 'order_by', 'status', 'user_id'], 'integer'],
            [['creat_date'], 'safe'],
            [['title', 'rewrite'], 'string', 'max' => 255],
            [['thumb'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'rewrite' => 'Rewrite',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'views' => 'Views',
            'thumb' => 'Thumb',
            'info' => 'Info',
            'fullcontent' => 'Fullcontent',
            'order_by' => 'Order By',
            'status' => 'Status',
            'user_id' => 'User ID',
            'creat_date' => 'Creat Date',
        ];
    }
}
