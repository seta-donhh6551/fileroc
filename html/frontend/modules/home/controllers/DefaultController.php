<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use frontend\controllers\MyController;

class DefaultController extends MyController{
    public $enableCsrfValidation = false;

    public function actionIndex() {
        Yii::$app->view->title = 'Free download software';

		$cateId = 4;
		$modelPost = new \common\models\Posts();
		$listPost = $modelPost->getListPosts(array(), 10, null, $cateId);
		$listAllPost = $modelPost->getListPosts(array(), 10, null);

		return $this->render('index', [
			'listPost' => $listPost,
			'listAllPost' => $listAllPost,
			'subCategory' => [
				'listMenu' => Yii::$app->controller->listMenu[0]['listSubMenu'],
				'titleMenu' => 'Window',
				'rewrite' => 'windows'
			]
		]);
	}

    public function actionSearch()
    {
		$keyword = Yii::$app->request->Get('keyword');
		if($keyword == null){
			Yii::$app->response->redirect('/');
		}

		$modelPost = new \common\models\Posts();
		$listPost = $modelPost->getListPosts(['keyword' => $keyword]);

		Yii::$app->view->title = 'Results for '.$keyword.' .Fileroc ,Free download software';

		return $this->render('search', [
			'listPost' => $listPost,
			'subCategory' => [
				'listMenu' => Yii::$app->controller->listMenu[0]['listSubMenu'],
				'titleMenu' => 'Window',
				'rewrite' => 'windows'
			]
		]);
    }

}
