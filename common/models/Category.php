<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 * @property string $rewrite
 * @property string $keywords
 * @property string $description
 * @property string $info
 * @property integer $order
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order'], 'required', 'message' => \Yii::t('app', 'validation required')],
            [['keywords', 'description', 'info'], 'string'],
            [['order', 'status', 'type', 'parent_id', 'child_id'], 'integer', 'message' => \Yii::t('app', 'validation integer')],
            [['name', 'rewrite', 'icon'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên menu',
            'rewrite' => 'Rewrite',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'info' => 'Mô tả',
            'order' => 'Thứ tự',
			'icon' => 'Icon',
			'type' => 'Type',
            'status' => 'Status',
        ];
    }
    
    /**
     * @description 
     * @Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @Date 20/02/2015
     */
    public function getListCategory($type = 0)
    {
        $query = new \yii\db\Query();
        $query->select('*')
                ->from($this->tableName())
				->where(['status' => 1]);
		if($type == 1 || $type == 0 || $type == 2){
			$query->andWhere(['type' => $type]);
		}
        
        $command = $query->createCommand();
        return $command->queryAll();
    }
	
	//sub level 1 & 2
    public function getListSubCategory($categoryId, $type = 1, $child = false)
    {
        $query = new \yii\db\Query();
        $query->select('*')->from($this->tableName());
        $query->where(['type' => $type]);
        if($child){
            $query->andWhere(['child_id' => $categoryId]);
        }else{
            $query->andWhere(['parent_id' => $categoryId]);
        }
        $command = $query->createCommand();
        return $command->queryAll();
    }
}
