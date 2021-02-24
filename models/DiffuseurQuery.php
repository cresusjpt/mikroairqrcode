<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Diffuseur]].
 *
 * @see Diffuseur
 */
class DiffuseurQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Diffuseur[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Diffuseur|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
