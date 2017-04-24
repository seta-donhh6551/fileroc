<?php

namespace frontend\modules\account\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;
use frontend\controllers\MyController;

class DefaultController extends MyController{
    public $enableCsrfValidation = false;

    public function actionIndex() {
        Yii::$app->view->title = 'User login';
		$request = Yii::$app->request;

		$cateId = 4;
		$modelPost = new \common\models\Posts();
		$listPost = $modelPost->getListPosts(array(), 10, null, $cateId);
		$listAllPost = $modelPost->getListPosts(array(), 10, null);

		$model = new \common\models\LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

		return $this->render('index', [
			'model' => $model,
			'listPost' => $listPost,
			'listAllPost' => $listAllPost,
			'subCategory' => [
				'listMenu' => Yii::$app->controller->listMenu[0]['listSubMenu'],
				'titleMenu' => 'Window',
				'rewrite' => 'windows'
			]
		]);
	}
}
