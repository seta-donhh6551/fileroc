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
