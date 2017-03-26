<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use frontend\controllers\MyController;

class DefaultController extends MyController
{
    public $enableCsrfValidation = false;

    public function actionIndex($rewrite = null)
    {
        $this->layout = "@app/views/layouts/default";
         
		$model = \common\models\Category::findOne(['id' => 4]);
		if($rewrite){
			$model = \common\models\Category::findOne(['rewrite' => $rewrite]);
		}
		
		if(!$model){
				throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
		
        $cateId = $model->id;
		
		//set active menu on header
		$this->activeMenu = $model;
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
        //get list poplular software
        $listPupolar = \common\models\Posts::find()
                    ->where(['cate_id' => $cateId])
                    ->orderBy(['views' => SORT_DESC])
                    ->limit(10)
                    ->all();
        
		$listSubCategory = $model->getListSubCategory($cateId);
		
        Yii::$app->view->title = 'Phần mềm dành cho '.$model->name.', Miễn phí download phần mềm';

		return $this->render('index', [
			'model' => $model,
            'listPupolar' => $listPupolar,
			'listTutorials' => $this->newTutorials(9),
			'listSubCategory' => $listSubCategory
		]);
	}

    public function actionSearch()
    {
		$keyword = Yii::$app->request->Get('keyword');
		if($keyword == null){
			Yii::$app->response->redirect('/');
		}
        
        //set active menu on header
        $model = \common\models\Category::findOne(['id' => 4]);
        if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
        
		$this->activeMenu = $model;
        
        $query = \common\models\Posts::find();
		$query->where(['LIKE', 'title', $keyword]);
        
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);
        
        $listPost = $query->offset($pagination->offset)
						->limit($pagination->limit)
						->all();
            
		Yii::$app->view->title = 'Kết quả tìm kiếm '.$keyword.'. Freefile.vn, tải phần mềm miễn phí';

		return $this->render('search', [
			'listPost' => $listPost,
            'pages' => $pagination,
			'subCategory' => []
		]);
    }

}
