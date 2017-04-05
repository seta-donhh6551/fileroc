<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_software_related".
 *
 * @property string $id
 * @property integer $post_id
 * @property integer $tutorial_id
 * @property string $created_at
 * @property integer $delete_flag
 */
class SoftwareRelated extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_software_related';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'tutorial_id'], 'required'],
            [['post_id', 'tutorial_id', 'delete_flag'], 'integer'],
            [['created_at'], 'safe']
        ];
    }
	
	public static function listRelated($tutorialId)
	{
		$query = new \yii\db\Query;
		$query  ->select([
					'tbl_software_related.post_id',
					'tbl_software_related.tutorial_id',
					'tbl_posts.title',
					'tbl_posts.rewrite',
					'tbl_posts.total_down',
					'tbl_posts.short_info',
					'tbl_posts.icon',
				]) 
				->from(self::tableName())
				->leftJoin('tbl_posts', 'tbl_posts.id = tbl_software_related.post_id')
				->where(['tutorial_id' => $tutorialId]);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
	
	public static function deleteAllRelation($tutorialId)
	{
		$query = new \yii\db\Query;
		$query	->createCommand()
				->delete(self::tableName(), ['tutorial_id' => $tutorialId])
				->execute();
	}
	
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'tutorial_id' => 'Tutorial ID',
            'created_at' => 'Created At',
            'delete_flag' => 'Delete Flag',
        ];
    }
}
