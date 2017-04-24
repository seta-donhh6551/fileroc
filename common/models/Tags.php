<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_tags".
 *
 * @property string $id
 * @property string $name
 * @property string $rewrite
 * @property integer $relation_id
 * @property string $created_at
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rewrite', 'relation_id', 'created_at'], 'required'],
            [['relation_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'rewrite'], 'string', 'max' => 150]
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
            'relation_id' => 'Relation ID',
            'created_at' => 'Created At',
        ];
    }
	
	public static function listRelated($relationId, $type = 0)
	{
		$query = new \yii\db\Query;
		$query  ->select('*') 
				->from(self::tableName())
				->where([
					'relation_id' => $relationId,
					'type' => $type
				]);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
	
    public static function getListTutorialsByTag($tagName)
	{
		$query = new \yii\db\Query;
		$query  ->select([
					'tbl_tags.id',
					'tbl_tags.name',
                    'tbl_tags.rewrite',
                    'tbl_tutorials.id',
					'tbl_tutorials.title',
					'tbl_tutorials.rewrite',
                    'tbl_tutorials.thumb',
                    'tbl_tutorials.info',
                    'tbl_tutorials.creat_date',
				]) 
				->from(self::tableName())
				->leftJoin('tbl_tutorials', 'tbl_tutorials.id = tbl_tags.relation_id')
				->where([
					'tbl_tags.rewrite' => $tagName,
                    'tbl_tags.type' => 0
				])
                ->groupBy(['tbl_tags.id']);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
    
    public static function getListPostByTag($tagName)
	{
		$query = new \yii\db\Query;
		$query  ->select([
					'tbl_tags.id',
					'tbl_tags.name',
                    'tbl_tags.rewrite',
                    'tbl_posts.id',
                    'tbl_posts.rewrite as soft_rewrite',
					'tbl_posts.title',
					'tbl_posts.author',
                    'tbl_posts.filesize',
                    'tbl_posts.type',
                    'tbl_posts.short_intro',
                    'tbl_posts.thumb',
                    'tbl_posts.info',
                    'tbl_posts.short_info',
                    'tbl_posts.icon'
				]) 
				->from(self::tableName())
				->leftJoin('tbl_posts', 'tbl_posts.id = tbl_tags.relation_id')
				->where([
					'tbl_tags.rewrite' => $tagName,
                    'tbl_tags.type' => 1
				])
                ->groupBy(['tbl_tags.id']);
		
		$command = $query->createCommand();
		
		return $command->queryAll();
	}
    
	public static function deleteAllRelation($relationId, $type = 0)
	{
		$query = new \yii\db\Query;
		$query	->createCommand()
				->delete(self::tableName(), [
					'relation_id' => $relationId,
					'type' => $type
				])
				->execute();
	}
}
