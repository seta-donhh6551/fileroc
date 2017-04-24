<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class PostsController extends MyController {

    public $enableCsrfValidation = false;

    public function actionIndex($rewrite)
	{
		$model = \common\models\Posts::findOne(['rewrite' => $rewrite]);
        if (!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }
		
		$modelPost = new \common\models\Posts();
		$modelCate = new \common\models\Category();
		//\common\components\Utility::debugData($model);
		//set active menu on header
		$this->activeMenu = \common\models\Category::findOne(['id' => $model->cate_id]);;
        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
        //get related software
        $listRelated = \common\models\Posts::find()
                        ->where(['sub_id' => $model->sub_id])
                        ->andWhere(['<>','id',$model->id])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();
        
        $listPopular = \common\models\Posts::find()
                        ->where(['status' => 1])
                        ->andWhere(['<>','id',$model->id])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();
        
        $listTags = \common\models\Tags::find()
                    ->where(['relation_id' => $model->id,'type' => 1])
                    ->all();
        
        $listTutorials = \common\models\SoftwareRelated::listTutorialsRelated($model->id);
        
        Yii::$app->view->title = 'Download '.$model->title;
		
		$listComment = \common\models\Reviews::findAll(['post_id' => $model->id]);

		return $this->render('index', [
			'model' => $model,
			'infoCate' => $modelCate->findOne(['id' => $model->cate_id]),
			'subCate' => $modelCate->findOne(['id' => $model->sub_id]),
			'listPost' => $modelPost->getListPosts(),
			'listComment' => $listComment,
            'listRelated' => $listRelated,
            'listPopular' => $listPopular,
            'listTags' => $listTags,
            'listTutorials' => $listTutorials
		]);
    }

	public function actionOption($rewrite)
    {
		$model = \common\models\Posts::findOne(['rewrite'=>$rewrite]);
        if (!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }
        
        //set active menu on header
		$this->activeMenu = \common\models\Category::findOne(['id' => $model->cate_id]);
        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
        //get related software
        $listRelated = \common\models\Posts::find()
                        ->where(['sub_id' => $model->sub_id])
                        ->andWhere(['<>','id',$model->id])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();
        
        $listPopular = \common\models\Posts::find()
                        ->where(['status' => 1])
                        ->andWhere(['<>','id',$model->id])
                        ->orderBy(['views' => SORT_DESC])
                        ->limit(10)
                        ->all();

        Yii::$app->view->title = 'Tùy chọn download '.$model->title.' - Tải '.$model->title.' miễn phí';

        $modelPost = new \common\models\Posts();
		$modelCate = new \common\models\Category();

		return $this->render('option', [
			'model' => $model,
			'infoCate' => $modelCate->findOne(['id' => $model->cate_id]),
			'subCate' => $modelCate->findOne(['id' => $model->sub_id]),
			'listPost' => $modelPost->getListPosts(),
            'listRelated' => $listRelated,
            'listPopular' => $listPopular
		]);
    }

	public function actionSecurity()
    {
		$request = Yii::$app->request;

		$modelPost = new \common\models\Posts();
		if($request->isPost && $request->Post('post_id'))
        {
			$postId = $request->Post('post_id');
			$modelPost->setTotalDownload($postId);
			return 'true';
		}

		return 'false';
	}

	public function actionReview()
    {
		$request = Yii::$app->request;
		if($request->isPost && $request->Post('star'))
        {
			$userIp = \common\components\Utility::getUserIp();
			$postId = $request->Post('post_id');
            
			$model = new \common\models\Reviews();
			$model->star   = $request->Post('star');
			$model->post_id = $request->Post('post_id');
			$model->name   = htmlspecialchars($request->Post('name'));
			$model->email  = htmlspecialchars($request->Post('email'));
			$model->title  = htmlspecialchars($request->Post('title'));
			$model->review = htmlspecialchars($request->Post('review'));
			$model->user_ip = $userIp;
			$model->created_date = new \yii\db\Expression('NOW()');
            
			//check has been voted
			$listReview = $model->getListReviewByIp($userIp, $postId);
			if(count($listReview) > 0)
            {
				return 'voted';
			}

			if($model->save(false))
            {
				return 'true';
			}

			return 'false';
		}

		return false;
	}
}
