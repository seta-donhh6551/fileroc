<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use frontend\controllers\MyController;

class PopularController extends MyController
{
    public $enableCsrfValidation = false;

    public function actionIndex($rewrite = null, $slug = null)
    {
        $model = \common\models\Category::findOne(['id' => 4]);
		if($rewrite){
			$model = \common\models\Category::findOne(['rewrite' => $rewrite]);
		}
		
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
        
        //switch between menu
        $orderBy = ['views' => SORT_DESC];
        $infoData = ['title' => 'Tải về nhiều nhất', 'rewrite' => 'tai-nhiet-nhat'];
        $infoData['text'] = 'Top những phần mềm '.$model->name.' được tải về nhiều nhất';
        if($slug == 'moi-cap-nhat'){
            $orderBy = ['id' => SORT_DESC];
            $infoData = ['title' => 'Phần mềm mới cập nhật', 'rewrite' => 'moi-cap-nhat'];
            $infoData['text'] = 'Danh sách những phần mềm '.$model->name.' mới được cập nhật';
        }
        
		//set active menu on header
		$this->activeMenu = $model;
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
        $query = \common\models\Posts::find()
                    ->where(['cate_id' => $model->id])
                    ->andWhere(['status' => 1])
                    ->orderBy($orderBy);
        
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);
        
        $listPost = $query->offset($pagination->offset)
						->limit($pagination->limit)
						->all();
        
        Yii::$app->view->title = $infoData['text'].'. Freefile.vn, tải phần mềm miễn phí';

		return $this->render('index', [
            'model' => $model,
			'listPost' => $listPost,
            'pages' => $pagination,
            'infoData' => $infoData
		]);
	}
}
