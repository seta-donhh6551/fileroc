<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class TutorialsController extends MyController {

    public $enableCsrfValidation = false;

    public function actionIndex($rewrite, $id)
	{
		Yii::$app->view->title = 'Freefile.vn, Hướng dẫn thủ thuật internet và pc miễn phí';
		
		$model = \common\models\Category::findOne(['id' => 4]);
		if(!$model){
				throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
		
		//set active menu on header
		$this->activeMenu = $model;
		$this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
		
		return $this->render('index', []);
    }
}
