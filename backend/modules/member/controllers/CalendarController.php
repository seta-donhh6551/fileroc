<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use yii\web\Request;
use vendor\calendar\classes\Calendar;
use backend\components\MyController;

/**
 * Default controller class
 * Member history class
 *
 * @package
 * @category User history
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class CalendarController extends MyController
{

    public $enableCsrfValidation = false;

    /**
     * @Action Index Action
     * @Description Calendar Controller
     * @author Ha Huu Don <donhh6551@setacinq.com.vn>
     * @date 09/02/2014
     */
    public function actionIndex()
    {
        $this->layout = false;
        
        $request = Yii::$app->request;
        
        //Set rule for field
        $field = $request->Get('field');
        if($field == null){
            Yii::$app->response->redirect(array('/site/errors'));
        }
        
        $dataGet = $request->get();
        $month = isset($dataGet['m']) ? $dataGet['m'] : NULL;
        $year = isset($dataGet['y']) ? $dataGet['y'] : NULL;
        
        $calendar = new Calendar($month, $year);
        $calendar->standard('today')
                ->standard('prev-next')
                ->standard('holidays');
        
        return $this->render('index', [
                                'field' => $field, 
                                'calendar' => $calendar, 
                                'haMonth' => $month,
                                'haYear' => $year
                            ]);
    }

}