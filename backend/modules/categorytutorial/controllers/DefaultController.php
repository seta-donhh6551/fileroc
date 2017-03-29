<?php

namespace backend\modules\categorytutorial\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;

/**
 * Default controller class
 * Category class
 *
 * @package
 * @category Category
 * @author Ha Huu Don <haanhdon@gmail.com>
 * @copyright
 * @link
 */
class DefaultController extends MyController
{
    /*
     * Category tutorial index
     * @since 29/03/2016
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex()
    {
        Yii::$app->view->title = 'Free download｜Quản lý menu tutorials';
		
        $query = \common\models\Categorytutorial::find();
        
        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);

        $listAll = $query->offset($pagination->offset)
							->limit($pagination->limit)
							->orderBy(['order' => SORT_ASC])
							->all();
        
		$cateModel = new \common\models\Category();
		$listCate= $cateModel->getListCategory(99);
		
        return $this->render('index', [
			'listAll' => $listAll,
			'pages' => $pagination,
			'listCate' => $listCate
		]);
    }
    
    /*
     * Category delete
     * @since 29/03/2016
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionDelete($id)
    {
        Yii::$app->view->title = 'Đùa chút thôi ｜ Xóa menu';
        
        $model = \common\models\Categorytutorial::findOne(['id' => $id]);
        if($id != null && $model){
            $model->delete();
        }
        
        Yii::$app->response->redirect(array('/categorytutorial'));
    }
}
