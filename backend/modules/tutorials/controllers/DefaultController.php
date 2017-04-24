<?php



namespace backend\modules\tutorials\controllers;



use Yii;

use yii\web\Controller;

use backend\components\MyController;



/**

 * Default controller class

 * @package

 * @category Posts

 * @author Ha Huu Don <donhh6551@setacinq.com.vn>

 */

class DefaultController extends MyController

{

    public $enableCsrfValidation = false;

    public function actionIndex()

	{

        Yii::$app->view->title = 'Quản lý tutorials';

     

		$request = Yii::$app->request;

		

		$modelCategory = new \common\models\Category();

		$listCategory = $modelCategory->getListCategory();

        

		$query = \common\models\Tutorials::find();

		if($request->Get('keyword'))

		{

			$query->where(['LIKE', 'title', $request->Get('keyword')]);

		}

		

        $query->leftJoin('tbl_user', 'tbl_user.id = tbl_tutorials.user_id');

        

		$pagination = new \yii\data\Pagination([

            'defaultPageSize' => \common\components\Utility::$defaultPageSize,

            'totalCount' => $query->count()

        ]);

		

		$listAll = $query->offset($pagination->offset)
						->orderBy(['id' => SORT_DESC])
						->limit($pagination->limit)

						->all();

				

        return $this->render('index', [

                'listAll' => $listAll,

                'listCategory' => $listCategory,

                'pages' => $pagination,

                'keyword' => $request->Get('keyword')

            ]

        );

    }

    public function actionSearch()
	{
		$request = Yii::$app->request;

		$returnData = [];
        if($request->isPost && $request->Post('keyword'))
        {
            $keyword = $request->Post('keyword');
            
            $query = \common\models\Tutorials::find();
			$listTutorials = $query->where(['LIKE', 'title', $keyword])->all();

			foreach($listTutorials as $key => $value)
			{
				$returnData[$key]['id'] = $value['id'];
				$returnData[$key]['title'] = $value['title'];		
			}
        }

		return json_encode($returnData);

	}

    public function actionDelete($id)

	{

        Yii::$app->view->title = 'Xóa bài viết';



        $model = \common\models\Tutorials::findOne(['id' => $id]);

		if($model)

        {

			@unlink('../../uploads/'.$model->thumb);

			@unlink('../../uploads/thumb/'.$model->thumb);

			$model->delete();

		}



        Yii::$app->response->redirect(array('/tutorials'));

    }



}

