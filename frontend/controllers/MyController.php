<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;

/**
 * Site controller
 */
class MyController extends Controller
{
    public $listMenu = [];
	public $infoConfig = ['keywords' => null, 'description' => null];
	public $activeMenu = null;

	public function init()
	{
        $model_category = new Category();
        $listMenu = $model_category->getListCategory(0);
        $this->listMenu = $model_category->getListCategory(0);
	}
    
    public function newTutorials($limit)
    {
        $modelTutorial = new \common\models\Tutorials();
		$listTutorials = $modelTutorial->find()
            ->where(['status' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->limit($limit)
            ->all();
        
        return $listTutorials;
    }
}

