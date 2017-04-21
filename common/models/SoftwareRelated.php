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
					'tbl_posts.icon'
				]) 
				->from(self::tableName())
				->leftJoin('tbl_posts', 'tbl_posts.id = tbl_software_related.post_id')
				->where([
					'tbl_software_related.tutorial_id' => $tutorialId,
				]);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
    
    public static function listTutorialsRelated($postId)
	{
		$query = new \yii\db\Query;
		$query  ->select([
					'tbl_software_related.post_id',
					'tbl_software_related.tutorial_id',
					'tbl_tutorials.title',
					'tbl_tutorials.rewrite',
					'tbl_tutorials.views',
					'tbl_tutorials.thumb'
				]) 
				->from(self::tableName())
				->leftJoin('tbl_tutorials', 'tbl_tutorials.id = tbl_software_related.tutorial_id')
				->where([
					'tbl_software_related.post_id' => $postId,
				]);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
	
	public static function deleteAllRelation($id, $type = 0)
	{
        $delType = [
			'tutorial_id' => $id,
			'type' => 0
		];
        if($type == 1){
            $delType = [
				'post_id' => $id,
				'type' => 1
			];
        }
		$query = new \yii\db\Query;
		$query	->createCommand()
				->delete(self::tableName(), $delType)
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
