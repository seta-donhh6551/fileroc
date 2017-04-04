<?php

namespace backend\modules\posts\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Posts;
use common\components\Utility;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * Default controller class
 * Posts class
 * @category Posts
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 */
class InputController extends MyController
{
	public $enableCsrfValidation = false;

    /*
     * Posts Input
     * @since 28/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex($id = null)
    {
        Yii::$app->view->title = 'Thêm mới, sửa bài viết | Free download';

        $model = $this->loadModel($id);
        $request = Yii::$app->request;

        if($request->isPost && $request->Post('submit'))
        {
            $post = $request->Post('Posts');
			Utility::debugData($post);
            $autoResize = isset($post['autoResize']) && $post['autoResize'] == 1 ? true : false;
            $model->attributes = $post;
            if ($model->validate())
            {
                $imgUpload = UploadedFile::getInstance($model, 'imgUpload');
                if($imgUpload)
                {
                    $allowType = ['jpg','png','gif'];
                    $extend = pathinfo($imgUpload->name, PATHINFO_EXTENSION);
                    if(!in_array($extend,$allowType) ) {
                        die('file không hợp lệ');
                    }
                    
                    $baseName = $imgUpload->baseName.'.'.$imgUpload->extension;
                    if(file_exists('../../uploads/'.$imgUpload->baseName.'.'.$imgUpload->extension)){
                        $baseName = date('dmY-His').$imgUpload->baseName.'.'.$imgUpload->extension;
                    }
                    
                    $imgUpload->saveAs('../../uploads/'.$baseName);

                    //Create thumb
                    Image::thumbnail('../../uploads/'.$baseName, 150, 210, $autoResize)
                    ->save('../../uploads/thumb/'.$baseName, ['quality' => 100]);

                    $model->thumb = $baseName;
                }
                
                $imgIcon = UploadedFile::getInstance($model, 'imgIcon');
                
                if($imgIcon)
                {
                    $allowType = ['jpg','png','gif'];
                    $extend = pathinfo($imgIcon->name, PATHINFO_EXTENSION);
                    if(!in_array($extend,$allowType) ) {
                        die('file không hợp lệ');
                    }
                    
                    $baseName = $imgIcon->baseName.'.'.$imgIcon->extension;
                    if(file_exists('../../uploads/icons/'.$imgIcon->baseName.'.'.$imgIcon->extension)){
                        $baseName = date('dmY-His').$imgIcon->baseName.'.'.$imgIcon->extension;
                    }
                    
                    $imgIcon->saveAs('../../uploads/icons/'.$baseName);
                    $model->icon = $baseName;
                }
				
                $model->rewrite = str_replace(' ','-',Utility::replaceUrl(trim($post['title'])));
                $model->user_id = Yii::$app->user->getIdentity()->id;
                
				if($id == null)
                {
					$model->creat_date = new \yii\db\Expression('NOW()');
				}
                
				$model->update_date = new \yii\db\Expression('NOW()');
                $model->save();
                
                Yii::$app->response->redirect(array('/posts'));
            }
        }

        //list categorys
        $cateModel = new \common\models\Category();
        $listCategory = $cateModel->getListCategory();

        return $this->render('index', ['model'=>$model,'listCate'=>$listCategory]);
    }

	/*
     * Get sub category
     * @since 28/09/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionGetsub()
    {
        $request = Yii::$app->request;
        $string = '<option value="">Select submenu</option>';

        if($request->isPost && $request->Post('cate_id'))
        {
            $cateId = $request->Post('cate_id');
            $subId = $request->Post('sub_id');
            $cateModel = new \common\models\Category();
            $listCategory = $cateModel->getListSubCategory($cateId);
            foreach($listCategory as $key => $value){
                if($subId == $value['id']){
                    $string .= '<option value="'.$value['id'].'" selected="selected">'.$value['name'].'</option>';
                }else{
                    $string .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                }
            }
        }
        echo $string;
        return;
    }

    public function actionGetkid()
    {
        $request = Yii::$app->request;
        $string = '<option value="">Select kid</option>';

        if($request->isPost && $request->Post('sub_id'))
        {
            $subId = $request->Post('sub_id');
            $kidId = $request->Post('kid_id');
            $cateModel = new \common\models\Category();
            $listCategory = $cateModel->getListSubCategory($subId, 2 , true);
            foreach($listCategory as $key => $value){
                if($kidId == $value['id']){
                    $string .= '<option value="'.$value['id'].'" selected="selected">'.$value['name'].'</option>';
                }else{
                    $string .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                }
            }
        }
        echo $string;
        return;
    }

	/*
     * Load model
     * @since 28/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function loadModel($id = null)
    {
        $postModel = new Posts();
        $model = Posts::findOne($id);
        //find one
        if($model != null){
            $postModel = $model;
        }

        //record not found
        if($id != null && $model == null){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }

        return $postModel;
    }
}
