<?php

namespace frontend\modules\home\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\MyController;

class TutorialsController extends MyController {

    public $enableCsrfValidation = false;

    public function actionIndex($rewrite, $id)
	{
		echo $id;
		\common\components\Utility::debugData($rewrite);
    }
}
