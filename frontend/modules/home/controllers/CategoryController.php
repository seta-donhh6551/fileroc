<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class CategoryController extends MyController
{
    public $enableCsrfValidation = false;
    public $defaultCate = 4;

    public function actionTags($rewrite)
    {
        $model = \common\models\Category::findOne(['id' => $this->defaultCate]);
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
		
        //set active menu on header
		$this->activeMenu = $model;
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
		$listTags = \common\models\Tags::getListPostByTag($rewrite);
        if(!$listTags){
           throw new \yii\web\HttpException(404, 'The requested item could not be found.'); 
        }
        
		$listPopular = \common\models\Posts::find()
                        ->where(['status' => 1])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(5)
                        ->all();
		
        $listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
        
		Yii::$app->view->title = $listTags[0]['name'].' - Tải phần mềm miễn phí';
        
        return $this->render('tags', [
            'model' => $model,
            'listTags' => $listTags,
            'listCategory' => $listCategory,
			'listTutorials' => $listTags,
            'listPopular' => $listPopular
        ]);
    }

	public function actionSubcate($slug, $rewrite)
    {
        $model = \common\models\Category::findOne(['rewrite' => $rewrite, 'type' => 1]);
        if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }
        
        $homePageCate = $model->findOne(['id' => $model->parent_id]);
        
        //set active menu on header
		$this->activeMenu = $homePageCate;
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];

		$cateId = $model->id;
		
        $modelPost = \common\models\Posts::find()
					->where(['sub_id' => $cateId]);

		$listSubCategory = $model->getListSubCategory($cateId);
		
		$listPopular = $modelPost->orderBy(['views' => SORT_DESC])
						->limit(10)
						->all();

        Yii::$app->view->title = 'Phần mềm '.$homePageCate->name.', Tìm kiếm và tải phần mềm '.$model->name;
		
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $modelPost->count()
        ]);
		
		$listPost = $modelPost->offset($pagination->offset)
						->limit($pagination->limit)
						->all();
		
		return $this->render('index', [
			'model' => $model,
			'listPost' => $listPost,
			'listPopular' => $listPopular,
			'listChilds' => $model->getListSubCategory($cateId, 2, true),
			'infoCate' => $homePageCate,
			'pages' => $pagination,
            'listTutorials' => $this->newTutorials(6),
			'subCategory' => [
				'listMenu' => $listSubCategory,
				'titleMenu' => $model->name,
				'rewrite' => $model->rewrite
			]
		]);
    }

	public function actionChildcate($rewrite)
    {
        $model = \common\models\Category::findOne(['rewrite' => $rewrite, 'type' => 2]);
        if (!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }
		
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];

		$cateId = $model->id;
		$modelPost = \common\models\Posts::find()
					->where(['kid_id' => $cateId]);
		
		$pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $modelPost->count()
        ]);
		
		$listPost = $modelPost->offset($pagination->offset)
						->limit($pagination->limit)
						->all();

		$listSubCategory = $model->getListSubCategory($cateId);
		
        Yii::$app->view->title = $model->name.', Freefile.vn miễn phí download phần mềm';


		return $this->render('index', [
			'leftMenuTitle' => '',
			'model' => $model,
			'listPost' => $listPost,
			'infoCate' => $model->findOne(['id' => $model->parent_id]),
			'infoSubCate' => $model->findOne(['id' => $model->child_id]),
			'listChilds' => $model->getListSubCategory($model->child_id, 2, true),
			'pages' => $pagination,
			'subCategory' => [
				'listMenu' => $listSubCategory,
				'titleMenu' => $model->name,
				'rewrite' => $model->rewrite
			]
		]);
    }
}
