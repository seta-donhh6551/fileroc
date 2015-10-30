<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\components\MyController;
use common\models\Member;
use common\models\MemberAction;
use common\models\MemberManager;
use common\models\SalonMembertype;
use common\models\UserAddForm;
use yii\db\Expression;
use yii\web\Session;
use yii\helpers\Url;

/*
 * MemberController
 * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
 */

class MemberController extends MyController
{
    /*
     * Member add
     *
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionAdd($salonId)
    {
        $request = Yii::$app->request;
        $model = new UserAddForm();
        $data = array();

        if ($request->isPost) {
            $post = $request->post();

            if (empty($post['UserAddForm']['pos1']) && empty($post['UserAddForm']['pos2']) && empty($post['UserAddForm']['pos3'])) {
                Yii::$app->response->redirect(array('/member/member/edit', 'salonId' => $salonId));
            } else {
                $model->load($post);
                if ($model->validate()) {
                    //request sever Pos
                    $posString = $post['UserAddForm']['pos1'] . $post['UserAddForm']['pos2'] . $post['UserAddForm']['pos3'];
                    $responPos = $this->getInformationPos($posString);
                    if ($responPos['status'] == TRUE) {
                        $model->data = json_encode($responPos['data']);
                    } else {
                        $model->addError('pos1', \Yii::t('app', 'pos error'));
                    }
                } else {

                }
            }
        }

        $data['salon_id'] = $salonId;

        return $this->render('add', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    /*
     * Member Search
     *
     * @since : 28/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionSearch($salonId, $memberId = null)
    {
        $this->layout = FALSE;
        $data = array();
        $request = Yii::$app->request;

         //check member id
        if($memberId != null) {
            $model = Member::findOne($memberId);
            if(empty($model) || $model->salon_id != $salonId) {
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            }
        }

        $data['pos'] = $request->get('pos');

        $data['salon_id'] = $salonId;
        $data['member_id'] = $memberId;

        return $this->render('search', [
                    'data' => $data,
        ]);
    }

    /*
     * Member edit
     *
     * @since : 28/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionEdit($salonId, $memberId = null)
    {
        $model = new Member();
        $data = array();
        $request = Yii::$app->request;

        //check member id
        if($memberId != null) {
            $model = Member::findOne($memberId);
            if(empty($model) || $model->salon_id != $salonId) {
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            }

            $data['pos_old'] = $model->pos_member_cd;
        }

        $data['member_id'] = $memberId;
        if(!empty($request->get('pos')) || !isset($data['pos_old'])) {
            $data['pos_old'] = $request->get('pos');
        }

        $data['pos'] = $request->get('pos');

        if ($request->isPost) {
            $post = $request->post();
            $model->load($post);
            //get salon membertype
            if($post['Member']['salon_membertype_id'] == 0) {
                $model->use_limit = 99;
                $model->salon_membertype_id = null;
            }
            else {
                $salonMembertype = SalonMembertype::findOne($post['Member']['salon_membertype_id']);
                $model->use_limit = $salonMembertype->use_limit;
                $model->timelimit_atday = $salonMembertype->timelimit_atday;
                $model->membertype_name = $salonMembertype->membertype_name;
            }


            $model->createYear = $post['Member']['createYear'];
            $model->createMonth = $post['Member']['createMonth'];
            $model->createDay = $post['Member']['createDay'];
            $model->status = 1;
            $model->salon_id = $salonId;
            $model->pos_member_cd = $post['Member']['pos1'] . $post['Member']['pos2'] . $post['Member']['pos3'];
            $model->reg_datetime = new \yii\db\Expression('NOW()');
            $model->pos_id = $post['Member']['pos_id'];

            if ($model->validate()) {
                $session = new Session;
                $session->open();
                $session['member_add'] = $model;
                return $this->redirect(Url::to(['/member/member/confirm/', 'salonId' => $salonId, 'memberId' => $memberId]));
            }
        } else {
            if (!empty($request->get('pos'))) {
                $userPos = $this->getInformationPos($data['pos']);
                $model->load($userPos['data']);
                $model->pos_id = $userPos['data']['Member']['pos_id'];
            }
        }


        $model->pos1 = substr($data['pos_old'], 0, 7);
        $model->pos2 = substr($data['pos_old'], 7, 5);
        $model->pos3 = substr($data['pos_old'], 12, 1);

        //get salon membertype
        $salonMembertype = new \common\models\SalonMembertype();
        $data['salon_membertype'] = $salonMembertype->getAllSalonMembertypeBySalonId($salonId);

        $data['salon_id'] = $salonId;

        return $this->render('edit', [
                    'model' => $model,
                    'data' => $data,
        ]);
    }

    /*
     * Member Confirm
     *
     * @since : 04/02/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionConfirm($salonId, $memberId = null)
    {
        $model = new Member();
        $memberManager = new MemberManager();
        $data = array();
        $request = Yii::$app->request;
        $session = new Session;
        $session->open();
        $member = $session['member_add'];
        
         //check member id
        if($memberId != null) {
            $model = Member::findOne($memberId);
            if(empty($model) || $model->salon_id != $salonId) {
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            }
        }

        if ($request->isPost) {
            $memberManager->saveData($member, $salonId);
            $session->remove('member_add');
            Yii::$app->response->redirect(array('/member/member/complete', 'salonId' => $salonId, 'memberId' => $member->member_id));
        }

        return $this->render('edit_confirm', [
                    'data' => $member,
                    'salonId' => $salonId,
        ]);
    }

    /*
     * Member Confirm
     *
     * @since : 04/02/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function actionComplete($salonId, $memberId)
    {
         //check member id
        if($memberId != null) {
            $model = Member::findOne($memberId);
            if(empty($model) || $model->salon_id != $salonId) {
                throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
            }
        }


        return $this->render('complete', [
                    'memberId' => $memberId,
                    'salonId' => $salonId,
        ]);
    }

    /*
     * Get information from server Pos
     *
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */
    public function getInformationPos($posString)
    {
        return array(
            'status' => TRUE,
            'data' => ['Member' => [
                    'pos_id' => 3988,
                    'user_name' => '知多 利雄',
                    'user_kana' => 'チタ　トシオ',
                    'user_tel' => '06098761234',
                    'user_tel2' => '06098',
                    'user_email' => 'user@pado.co.jp',
                    'gender' => 1,
                    'birthday' => '1980-11-24',
                    'zip_cd' => '123-4567',
                    'jis_cd' => 'anhct',
                    'addr_1' => '大阪府岸和田市',
                    'addr_2' => '土生町1-23-456',
                    'addr_3' => '○○マンションxxx',
                ]]
        );
    }

}
