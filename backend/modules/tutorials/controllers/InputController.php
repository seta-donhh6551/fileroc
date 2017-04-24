<?php

namespace backend\modules\tutorials\controllers;

use Yii;
use yii\web\Controller;
use backend\components\MyController;
use yii\web\UploadedFile;
use yii\imagine\Image;
use \common\components\Utility;

/**
 * Default controller class
 * Tutorials class
 * @category Tutorials
 * @author Ha Huu Don <haanhdon@gmail.com>
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
        Yii::$app->view->title = 'Thêm mới, sửa bài viết | Freefile.vn';
        
		//get list software related
		$listSoftware = array();
		$listTagRelated = array();
		
        $model = new \common\models\Tutorials();
        if($id){
            $model = \common\models\Tutorials::findOne($id);
            if(empty($model))
            {
                throw new \yii\web\HttpException(404, 'Bài viết này không tồn tại.');
            }
			
			$listSoftware = \common\models\SoftwareRelated::listRelated($id);
			$listTagRelated = \common\models\Tags::listRelated($id);
        }
        
        //list categorys
        $listCategory = \common\models\Categorytutorial::find()
						->where(['status' => 1])
						->all();
		
        $request = Yii::$app->request;

        if($request->isPost && $request->Post('submit'))
        {
            $post = $request->Post('Tutorials');
			
            $autoResize = isset($post['autoResize']) && $post['autoResize'] == 1 ? true : false;
            
            $model->attributes = $post;
            if ($model->validate())
            {
                $imgUpload = UploadedFile::getInstance($model, 'imgUpload');
                if($imgUpload)
                {
                    $allowType = ['jpg','png','gif'];
                    $extend = pathinfo($imgUpload->name, PATHINFO_EXTENSION);
                    if(!in_array($extend,$allowType))
                    {
                        Yii::$app->getSession()->setFlash('errorUpload', 'Kiểu file không hợp lệ');
                        return $this->render('index', ['model' => $model, 'listCate' => $listCategory]);
                    }
                    else
                    {
                        $baseName = $imgUpload->baseName.'.'.$imgUpload->extension;
                        if(file_exists('../../uploads/'.$imgUpload->baseName.'.'.$imgUpload->extension))
                        {
                            $baseName = date('dmY-His').$imgUpload->baseName.'.'.$imgUpload->extension;
                        }

                        $imgUpload->saveAs('../../uploads/'.$baseName);

                        //Create thumb
                        Image::thumbnail('../../uploads/'.$baseName, Utility::$defaultImageThumb['width'], Utility::$defaultImageThumb['height'], $autoResize)
                        ->save('../../uploads/thumb/'.$baseName, ['quality' => 100]);
						
						Image::thumbnail('../../uploads/'.$baseName, Utility::$smallImageThumb['width'], Utility::$smallImageThumb['height'], $autoResize)
                        ->save('../../uploads/smaller/'.$baseName, ['quality' => 100]);

                        $model->thumb = $baseName;
                    }
                }
                
                $model->rewrite = str_replace(' ','-',Utility::replaceUrl(trim($post['title'])));
                $model->user_id = Yii::$app->user->getIdentity()->id;
				$model->cate_id = $post['cate_id'] != null ? $post['cate_id'] : 0;
                
				if($id == null)
                {
					$model->creat_date = new \yii\db\Expression('NOW()');
				}
                
                $model->save();
					
				//save relation software
                //delete all software old related
                \common\models\SoftwareRelated::deleteAllRelation($model->id, 0);
				if(isset($post['listsoft']))
				{
					$listSoft = array_unique($post['listsoft']);
					foreach($listSoft as $key => $value)
					{
						$softwareRelated = new \common\models\SoftwareRelated();
						$softwareRelated->post_id = $value;
						$softwareRelated->tutorial_id = $model->id;
						$softwareRelated->created_at = new \yii\db\Expression('NOW()');
						
						$softwareRelated->save();
					}
				}
				
				//save tags
                //delete all tags old related
                \common\models\Tags::deleteAllRelation($model->id, 0);
				if(isset($post['tags']) && $post['tags'] != null)
				{	
					$listTags = explode(',', $post['tags']);
					$listAllTags = array_unique($listTags);
					foreach($listAllTags as $key => $value)
					{
						$tagModel = new \common\models\Tags();
						$tagModel->name = trim($value);
						$tagModel->rewrite = str_replace(' ','-',Utility::replaceUrl(trim($value)));
						$tagModel->relation_id = $model->id;
						$tagModel->type = 0;
						$tagModel->created_at = new \yii\db\Expression('NOW()');
						
						$tagModel->save();
					}
				}
                
                Yii::$app->response->redirect(array('/tutorials'));
            }
        }

        return $this->render('index', [
			'model' => $model,
			'listCate' => $listCategory,
			'listRelated' => $listSoftware,
			'listTagRelated' => $listTagRelated
		]);
    }
}
