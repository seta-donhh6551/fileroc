<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class UserAddForm extends Model
{

    public $pos1;
    public $pos2;
    public $pos3;
    public $data = '';
    public $link_popup;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['pos1', 'pos2', 'pos3'], 'required', 'message' => \Yii::t('app', 'validation required')],
            [['pos1', 'pos2', 'pos3'], 'integer', 'message' => \Yii::t('app', 'validation integer')],
            [['pos1'], 'string', 'length' => 7, 'notEqual' => \Yii::t('app', 'validation length string {number}', ['number' => 7])],
            [['pos2'], 'string', 'length' => 5, 'notEqual' => \Yii::t('app', 'validation length string {number}', ['number' => 5])],
            [['pos3'], 'string', 'length' => 1, 'notEqual' => \Yii::t('app', 'validation length string {number}', ['number' => 1])],
        ];
    }

    /**
     * attributeLabels
     *
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'pos1' => \Yii::t('app', 'Pos 1'),
            'pos2' => \Yii::t('app', 'Pos 2'),
            'pos3' => \Yii::t('app', 'Pos 3'),
        ];
    }

}
