<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_reviews".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $review
 * @property integer $star
 * @property string $user_ip
 * @property integer $post_id
 * @property string $created_date
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'title', 'review', 'star', 'user_ip', 'post_id'], 'required'],
            [['review'], 'string'],
            [['star', 'post_id'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
            [['user_ip'], 'string', 'max' => 50]
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
            'email' => 'Email',
            'title' => 'Title',
            'review' => 'Review',
            'star' => 'Star',
            'user_ip' => 'User Ip',
            'post_id' => 'Post ID',
            'created_date' => 'Created Date',
        ];
    }
}
