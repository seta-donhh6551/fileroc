<?php
namespace common\components;

use yii\db\ActiveQuery;

class MyActiveQuery extends ActiveQuery
{
    public function visible($del_flg = 0)
    {
        $this->andWhere('del_flg = :del_flg',[':del_flg'=>$del_flg]);
        return $this;
    }
}

