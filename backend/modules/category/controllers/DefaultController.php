<?php

namespace backend\modules\category\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Category;

/**
 * Default controller class
 * Category class
 *
 * @package
 * @category Category
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class DefaultController extends MyController
{
    /*
     * Category index
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex()
    {
        Yii::$app->view->title = 'Free download｜Quản lý menu';
		
        $query = Category::find();
        
        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);

        $data['listAll'] = $query
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        
		$cateModel = new Category();
		$data['listCate'] = $cateModel->getListCategory(99);
		$data['pages'] = $pagination;
		
        return $this->render('index', $data);
    }
    
    /*
     * Category delete
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionDelete($id)
    {
        Yii::$app->view->title = 'Đùa chút thôi ｜ Xóa menu';
        
        $model = Category::findOne(['id'=>$id]);
        
        if($id != null && $model){
            $model->delete();
        }
        
        Yii::$app->response->redirect(array('/category'));
    }
}
