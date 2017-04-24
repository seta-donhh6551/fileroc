<?php

namespace backend\modules\users\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Users;
use common\components\Utility;

/**
 * Default controller class
 * Users class
 * @category Users
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 */
class InputController extends MyController
{
    /*
     * Category Input
     * @since 28/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex($id = null)
    {
        Yii::$app->view->title = 'Users ｜ Thêm mới, sửa thông tin';
        $model = $this->loadModel($id);
        $request = Yii::$app->request;
        
        if ($request->isPost && $request->Post('submit')) {
            $post = $request->Post('Users');
            $model->attributes = $post;
            
            if ($model->validate()) {
                $model->save();
                Yii::$app->response->redirect(array('/users'));
            }
        }
        
        return $this->render('index', ['model'=>$model]);
    }
    
    /*
     * Load model
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function loadModel($id = null)
    {
        $userModel = new Users();
        $model = Users::findOne($id);
        //find one
        if($model != null){
            $userModel = $model;
        }
        //record not found
        if($id != null && $model == null){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        
        return $userModel;
    }
}
