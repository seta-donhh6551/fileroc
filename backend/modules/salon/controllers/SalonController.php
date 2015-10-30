<?php

namespace app\modules\salon\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Salon;
use common\models\SalonOpen;
use common\models\SalonOpenForm;
use common\models\SalonFacility;
use common\models\SalonMembertype;
use backend\components\MyController;
use vendor\calendar\classes\Calendar;
use yii\db\Expression;

/*
 * SalonController
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */

class SalonController extends MyController
{
    /*
     * Action SalonOpen
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionOpen($salonId = null)
    {
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        if (!$salonId) {
            $salonId = $userAuth['salon_id'];
        }
        $salonModel = new Salon();

        //get info salon
        $salonOb = $salonModel->getBySalonId($salonId);

        //get salon open max by salon_id
        $salonOpenMax = SalonOpen::getMaxDatetime($salonId);
        $salonDateMax = date('Y-m-d');

        if ($salonOpenMax) {
            $salonDateMax = $salonOpenMax->salon_date;
        }

        //set data for form
        $salonOpenFormModel = new SalonOpenForm();

        //submit form
        if (Yii::$app->request->isPost) {
            $dataPost = Yii::$app->request->Post();

            if ($salonOpenFormModel->saveData($dataPost, $salonId, $salonDateMax)) {
                return $this->redirect(Url::to(['/salon/salon/calendar/', 'salonId' => $salonId]));
            }
        }

        return $this->render('salon_open', [
                    'salonOb' => $salonOb,
                    'salonId' => $salonId,
                    'salonOpenFormModel' => $salonOpenFormModel,
                    'salonDateMax' => $salonDateMax
        ]);
    }

    /*
     * calendar
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionCalendar($salonId = null)
    {
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        if (!$salonId) {
            $salonId = $userAuth['salon_id'];
        }
        $dataGet = Yii::$app->request->get();
        $month = isset($dataGet['m']) ? $dataGet['m'] : date('m');
        $year = isset($dataGet['y']) ? $dataGet['y'] : date('Y');

        $salonOpenOb = new SalonOpen();
        $strMonth = date('Y-m');
        if ($month && $year) {
//            $strMonth = date('Y-m', strtotime($year . '-' . $month . '-01'));
            $strMonth = date('Y-m', mktime(0, 0, 0, $month, 1, $year));
        }

        $salonOpenInMonth = $salonOpenOb->getBySalonIdAndMonth($salonId, $strMonth);
        $listSalonOpenCloseInMonth = $salonOpenOb->formatDataOpenClose($salonOpenInMonth);
        $dataDateType = $salonOpenOb->formatDataDateType($salonOpenInMonth);

        $calendar = new Calendar($month, $year);
        $calendar->standard('today')
                ->standard('prev-next')
                ->standard('holidays');
        return $this->render('salon_open_cal', [
                    'salonId' => $salonId,
                    'calendar' => $calendar,
                    'yearSelected' => $year,
                    'listSalonOpenCloseInMonth' => $listSalonOpenCloseInMonth,
                    'dataDateType' => $dataDateType,
        ]);
    }

    /*
     * @description: Preset
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionPreset($salonId = null, $salonDate = null)
    {
        Yii::$app->view->title = Yii::t('app', 'title salon preset');
        Yii::$app->layout = false;
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();

        if (!$salonId) {
            $salonId = $userAuth['salon_id'];
        }

        $salonOpenFormModel = new SalonOpenForm();
        //get info salon
        $salonOpenData = $salonOpenFormModel->getBySalonIdAndDate($salonId, $salonDate);
        if (!$salonOpenData) {
            $salonData = $salonOpenFormModel->getBySalonId($salonId);
            $openDatetime = $salonDate . ' ' . $salonData->open_time;
            $closeDatetime = $salonDate . ' ' . $salonData->close_time;
        } else {
            $openDatetime = $salonOpenData->open_datetime;
            $closeDatetime = $salonOpenData->close_datetime;
        }

        $hasError = true;
        if (Yii::$app->request->isPost) {
            $dataPost = Yii::$app->request->Post();

            if ($salonOpenFormModel->editData($dataPost, $salonId, $salonDate)) {
                $hasError = false;
            }
        }

        return $this->render('salon_preset_edit', [
                    'hasError' => $hasError,
                    'openDatetime' => $openDatetime,
                    'closeDatetime' => $closeDatetime,
                    'salonId' => $salonId,
                    'salonDate' => $salonDate,
                    'salonOpenFormModel' => $salonOpenFormModel,
        ]);
    }

    /*
     * Salon Setting
     *
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionSetting($salonId)
    {
        $request = Yii::$app->request;
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        //$salonId = $userAuth['salon_id'];
        $model = Salon::findOne($salonId);
        $view = 'setting';

        //get salon open
        $salonOpen = new \common\models\SalonOpen();
        $openDate = $salonOpen->getFirstSalonOpenBySalonId($salonId);

        $data['salon_open'] = '';
        if ($openDate) {
            $data['salon_open'] = $openDate->salon_date;
        }

        //get salon facility
        $salonFacility = new \common\models\SalonFacility();
        $data['salon_facility'] = $salonFacility->getSummarySalonFacilityBySalonId($salonId);

        //get salon membertype
        $salonMembertype = new \common\models\SalonMembertype();
        $data['salon_membertype'] = $salonMembertype->getAllSalonMembertypeBySalonId($salonId);

        if ($request->isPost) {
            $post = $request->post();
            $model->load($post);
            $model->open_time = $post['Salon']['open_date_hour'] . ':' . $post['Salon']['open_date_min'] . ':00';
            $model->close_time = $post['Salon']['close_date_hour'] . ':' . $post['Salon']['close_date_min'] . ':00';
            $model->upd_datetime = new \yii\db\Expression('NOW()');
            $model->save();
            if (!$model->getErrors()) {
                $view = 'setting_complete';
            }
        }

        $data['salon_id'] = $salonId;

        return $this->render($view, [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

}
