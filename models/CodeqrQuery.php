<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Codeqr]].
 *
 * @see Codeqr
 */
class CodeqrQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Codeqr[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Codeqr|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
