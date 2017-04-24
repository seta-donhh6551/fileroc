<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_posts".
 *
 * @property string $id
 * @property string $title
 * @property string $rewrite
 * @property string $author
 * @property string $keywords
 * @property string $description
 * @property integer $views
 * @property integer $type
 * @property string $urlimg
 * @property string $urlvideo
 * @property string $thumb
 * @property string $info
 * @property string $fullcontent
 * @property integer $status
 * @property integer $cate_id
 */
class Posts extends \yii\db\ActiveRecord
{
    public $imgUpload;
	public $imgIcon;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url_soft', 'cate_id', 'filesize', 'required', 'short_info', 'author'], 'required', 'message' => \yii::t('app', 'validation required')],
            [['keywords', 'description', 'short_intro', 'info', 'info_function', 'fullcontent', 'version', 'time_limit'], 'string'],
            [['views', 'type', 'status', 'cate_id', 'sub_id', 'kid_id', 'total_down'], 'integer'],
            [['title', 'rewrite', 'url_soft', 'url_provide1', 'url_provide2', 'url_video'], 'string', 'max' => 255],
            [['author', 'author_url'], 'string', 'max' => 50],
            ['imgUpload', 'file']
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
            'author' => 'Author',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'views' => 'Views',
            'type' => 'Type',
            'url_soft' => 'Url soft',
            'version' => 'Version',
			'total_down' => 'Total down',
			'filesize' => 'File size',
			'required' => 'Required',
			'time_limit' => 'Time limit',
            'thumb' => 'Thumb',
            'info' => 'Info',
            'fullcontent' => 'Fullcontent',
            'status' => 'Status',
            'cate_id' => 'Cate ID',
        ];
    }

    /**
     * @description gel all posts
     * @Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @Date 28/02/2015
     */
    public function getListPosts($data=[], $limit = null, $offset = null, $cateId = null)
    {
        $query = new \yii\db\Query();
        $query->select('*')
                ->from($this->tableName());
        if ($cateId){
           $query->where(['cate_id' => $cateId]);
        }
		if(isset($data['keyword']) && $data['keyword'] != null){
			$query->andWhere(['LIKE', 'title', $data['keyword']]);
		}
        $type = (isset($data['type']) && $data['type'])?$data['type']:'id';
        $sort = (isset($data['sort']) && $data['sort'])?$data['sort']:'asc';
		if($limit){
			$query->limit($limit);
		}
		if($offset){
			$query->offset($offset);
		}
        $command = $query->createCommand();
        $result = $command->queryAll();

        return $result;
    }

    /**
     * @description get list posts
     * @Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @Date 01/06/2015
     */
    public static function getListBySubId($subId = null, $child = false, $limit = false, $offset = false)
    {
        $query = new \yii\db\Query();
        $query->select('*')
                ->from(self::tableName());
		if($subId && $child == false){
			$query->where(['sub_id' => $subId]);
		}
		if($subId && $child == true){
			$query->where(['kid_id' => $subId]);
		}
        if($limit){
            $query->limit($limit);
        }
        if($offset){
            $query->offset($offset);
        }

        $command = $query->createCommand();
        $result = $command->queryAll();

        return $result;
    }

    /**
     * @description update view ++
     * @Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * @Date 07/06/2015
     */
    public function setTotalDownload($id)
    {
        $command = \Yii::$app->db->createCommand('UPDATE '.self::tableName().' SET total_down = total_down+1 WHERE id = '.$id);
        $command->execute();
    }
}
