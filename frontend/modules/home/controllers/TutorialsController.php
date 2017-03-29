<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class TutorialsController extends MyController {

    public $enableCsrfValidation = false;

    public function actionIndex($rewrite, $id)
	{
		$model = \common\models\Category::findOne(['id' => 4]);
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
        
		return $this->render('index', [
            'model' => $modelTutorial
        ]);
    }
}
