<?php

namespace backend\modules\comment\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;

/**
 * Default controller class
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 */
class DefaultController extends MyController{

    public function actionIndex()
	{
        Yii::$app->view->title = 'Quản lý comments';
		$request = Yii::$app->request;
		
        $query = \common\models\Comment::find();
		if($request->Get('keyword'))
		{
			$query->where(['LIKE', 'title', $request->Get('keyword')]);
		}

        $pagination = new \yii\data\Pagination([
            'defaultPageSize' => \common\components\Utility::$defaultPageSize,
            'totalCount' => $query->count()
        ]);

        $listAll = $query->offset($pagination->offset)
						->limit($pagination->limit)
						->all();

        return $this->render('index', [
                    'listAll' => $listAll,
                    'pages' => $pagination,
					'keyword' => $request->Get('keyword')
                ]
        );
    }

    public function actionDelete($id)
	{
        Yii::$app->view->title = 'Xóa comment';

        $model = \common\models\Comment::findOne(['id' => $id]);
		if($model){
			$model->delete();
		}

        Yii::$app->response->redirect(array('/comment'));
    }

}
