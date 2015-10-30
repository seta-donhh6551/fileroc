<?php

namespace backend\modules\category\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Category;
use common\components\Utility;
use yii\web\UploadedFile;

/**
 * Default controller class
 * Category class
 * @category Category
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 */
class InputController extends MyController
{
    /*
     * Category Input
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex($id = null)
    {
        Yii::$app->view->title = 'Fileroc ｜ Thêm mới, sửa menu';
        $model = $this->loadModel($id);
        $request = Yii::$app->request;
        
        if ($request->isPost && $request->Post('submit')) {
            $post = $request->Post('Category');
            $model->attributes = $post;
            
            if ($model->validate()) {
				$imgUpload = UploadedFile::getInstance($model, 'icon');
                if($imgUpload){
                    $allowType = ['jpg','png','gif']; 
                    $extend = pathinfo($imgUpload->name, PATHINFO_EXTENSION);
                    if(!in_array($extend,$allowType) ) {
                        die('file không hợp lệ');
                    }
                    $baseName = $imgUpload->baseName.'.'.$imgUpload->extension;
                    if(file_exists('../../uploads/icons/'.$imgUpload->baseName.'.'.$imgUpload->extension)){                     
                        $baseName = date('dmY-His').$imgUpload->baseName.'.'.$imgUpload->extension;
                    }
                    $imgUpload->saveAs('../../uploads/icons/'.$baseName);
                    
                    $model->icon = $baseName;
                }
                $model->rewrite = str_replace(' ','-',Utility::replaceUrl($post['name']));
                $model->save();
                Yii::$app->response->redirect(array('/category'));
            }
        }
        
		//list categorys
        $cateModel = new \common\models\Category();
        $listCategory = $cateModel->getListCategory();
		
        return $this->render('index', ['model'=>$model,'listCate'=>$listCategory]);
    }
    
    /*
     * Load model
     * @since 27/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function loadModel($id = null)
    {
        $cateModel = new Category();
        $model = Category::findOne($id);
        //find one
        if($model != null){
            $cateModel = $model;
        }
        //record not found
        if($id != null && $model == null){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        
        return $cateModel;
    }
}
