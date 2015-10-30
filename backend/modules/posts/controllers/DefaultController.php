<?php

namespace backend\modules\posts\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Posts;
use common\components\Utility;

/**
 * Default controller class
 * Posts class
 *
 * @package
 * @category Posts
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class DefaultController extends MyController {

    public function actionIndex() {
        Yii::$app->view->title = 'Quản lý bài viết';

        $active = 3;
        $query = Posts::find();
        
        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count()
        ]);
		
		$model_category = new \common\models\Category();
		$listCategory = $model_category->getListCategory();
		
        $listAll = $query
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index', [
                    'listAll' => $listAll,
					'listCategory' => $listCategory,
                    'active' => $active,
                    'pages' => $pagination
                ]
        );
    }

    public function actionDelete($id) {
        Yii::$app->view->title = 'Xóa bài viết';

        $model = Posts::findOne(['id' => $id]);
		if($model){
			@unlink('../../uploads/'.$model->thumb);
			@unlink('../../uploads/thumb/'.$model->thumb);
			$model->delete();
		}

        Yii::$app->response->redirect(array('/posts'));
    }

}
