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
	
	public function init()
	{
            $model_category = new Category();
            $listMenu = $model_category->getListCategory(0);
            if($listMenu)
            {
                foreach($listMenu as $key => $val)
                {
                    $listSubMenu = $model_category->getListSubCategory($val['id'], 1);
                    $listMenu[$key]['listSubMenu'] = $listSubMenu;
                    foreach($listSubMenu as $k => $v){
                        $listMenu[$key]['listSubMenu'][$k]['listChildMenu'] = $model_category->getListSubCategory($v['id'], 2, true);
                    }				
                }
            }

            $this->listMenu = $listMenu;
	}
}

