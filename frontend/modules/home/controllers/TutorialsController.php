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
		
		return $this->render('index', [
            'model' => $modelTutorial,
			'listCategory' => $listCategory
        ]);
    }
    
    public function actionList()
	{
        Yii::$app->view->title = 'Hướng dẫn thủ thuật phần mềm miễn phí';
        
		$model = \common\models\Category::findOne(['id' => $this->defaultCate]);
		if(!$model){
            throw new \yii\web\HttpException(404, 'The requested item could not be found.');
		}
        
		//set active menu on header
		$this->activeMenu = $model;
        $this->infoConfig = ['keywords' => $model->keywords, 'description' => $model->description];
        
        $listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
        
        return $this->render('list', [
            'model' => $model,
            'listCategory' => $listCategory
        ]);
    }
}
