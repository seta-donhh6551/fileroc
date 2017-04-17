<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class TutorialsController extends MyController {

    public $enableCsrfValidation = false;
    public $defaultCate = 4;

    public function actionIndex($rewrite, $id)
	{
		$model = \common\models\Category::findOne(['id' => $this->defaultCate]);
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
        
		//set active menu on header
		$this->activeMenu = $model;
		
        $modelTutorial = \common\models\Tutorials::findOne(['id' => $id]);
        if(!$modelTutorial){
            throw new \yii\web\HttpException(404, 'Trang không tồn tại!');
        }
		
		$this->infoConfig = ['keywords' => $modelTutorial->keywords, 'description' => $modelTutorial->description];
        
        Yii::$app->view->title = $modelTutorial->title.' - Thủ thuật phần mềm miễn phí';
		
		$listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
		
		//get list related software
		$listRelatedSoft = \common\models\SoftwareRelated::listRelated($modelTutorial->id);
		
		return $this->render('index', [
            'model' => $modelTutorial,
			'listCategory' => $listCategory,
			'listRelatedSoft' => $listRelatedSoft
        ]);
    }
    
	public function actionList()
	{  
		$model = \common\models\Category::findOne(['id' => $this->defaultCate]);
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
		
		Yii::$app->view->title = 'Thủ thuật hướng dẫn';
		
		//set active menu on header
		$this->activeMenu = $model;
        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
		
		$listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
		
        $listPopular = \common\models\Posts::find()
                        ->where(['status' => 1])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();
        
		//get all list tutorials
		$query = \common\models\Tutorials::find();
		
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);
		
		$listTutorials = $query->offset($pagination->offset)
                        ->orderBy(['id' => SORT_DESC])
						->limit($pagination->limit)
						->all();
		
		return $this->render('list', [
            'model' => $model,
			'listTutorials' => $listTutorials,
            'listCategory' => $listCategory,
			'pages' => $pagination,
            'listPopular' => $listPopular
        ]);
	}
	
    public function actionCategory($rewrite)
	{   
		$model = \common\models\Category::findOne(['id' => $this->defaultCate]);
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
		
		$modelCate = \common\models\Categorytutorial::findOne(['rewrite' => $rewrite]);
        if (!$modelCate){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }
		
		Yii::$app->view->title = $modelCate->name.' - Thủ thuật hướng dẫn';
		
		//set active menu on header
		$this->activeMenu = $model;
        $this->infoConfig = ['keywords' => $modelCate->keywords, 'description' => $modelCate->description];
        
		//get all list tutorials
		$query = \common\models\Tutorials::find()
					->where(['status' => 1])
					->andWhere(['cate_id' => $modelCate->id]);
		
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);
		
        $listPopular = \common\models\Posts::find()
                        ->where(['status' => 1])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();
        
		$listTutorials = $query->offset($pagination->offset)
                        ->orderBy(['id' => SORT_DESC])
						->limit($pagination->limit)
						->all();
		
        $listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
        
        return $this->render('category', [
            'model' => $modelCate,
            'listCategory' => $listCategory,
			'listTutorials' => $listTutorials,
			'pages' => $pagination,
            'listPopular' => $listPopular
        ]);
    }
}
