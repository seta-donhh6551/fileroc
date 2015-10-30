<?php

namespace backend\modules\users\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\components\Utility;
use common\models\Users;

/**
 * Default controller class
 * Users class
 *
 * @package
 * @category Users
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class DefaultController extends MyController
{
    public function actionIndex()
    {
        Yii::$app->view->title = 'Đùa chút thôi mà | quản lý thành viên';
        
        $model = new \common\models\Users();
        $listAll = $model->getListUsers();
        
        //Utility::debugData($listAll);
        return $this->render('index', ['listAll'=>$listAll]);
    }
    
    /*
     * Users delete
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionDelete($id)
    {
        Yii::$app->view->title = 'Đùa chút thôi ｜ Xóa users';
        
        //Do not del user_id = 1
        $model = Users::findOne(['id'=>$id]);
        
        if($id != null && $model && $id != 1){
            $model->delete();
        }
        
        Yii::$app->response->redirect(array('/users'));
    }
}
