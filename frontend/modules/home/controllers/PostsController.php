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
		
		//set active menu on header
		$homePageCate = \common\models\Category::findOne(['id' => $model->cate_id]);
		$this->activeMenu = $homePageCate;
		
        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];

        Yii::$app->view->title = 'Download '.$model->title;
		
		$listComment = \common\models\Reviews::findAll(['post_id' => $model->id]);

		return $this->render('index', [
			'model' => $model,
			'infoCate' => $modelCate->findOne(['id' => $model->cate_id]),
			'subCate' => $modelCate->findOne(['id' => $model->sub_id]),
			'listPost' => $modelPost->getListPosts(),
			'listComment' => $listComment
		]);
    }

	public function actionOption($rewrite){
		$model = \common\models\Posts::findOne(['rewrite'=>$rewrite]);
        if (!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
        }

        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];

        Yii::$app->view->title = 'Download options '.$model->title;

        $modelPost = new \common\models\Posts();
		$modelCate = new \common\models\Category();

		return $this->render('option', [
			'model' => $model,
			'infoCate' => $modelCate->findOne(['id' => $model->cate_id]),
			'subCate' => $modelCate->findOne(['id' => $model->sub_id]),
			'listPost' => $modelPost->getListPosts()
		]);
    }

	public function actionSecurity(){

		$request = Yii::$app->request;

		$modelPost = new \common\models\Posts();
		if($request->isPost && $request->Post('post_id')){
			$postId = $request->Post('post_id');
			$modelPost->setTotalDownload($postId);
			return 'true';
		}

		return 'false';
	}

	public function actionReview(){
		$request = Yii::$app->request;
		if($request->isPost && $request->Post('star')){
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
			if(count($listReview) > 0){
				return 'voted';
			}

			if($model->save(false)){
				return 'true';
			}

			return 'false';
		}

		return false;
	}
}
