<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Partenaire]].
 *
 * @see Partenaire
 */
class PartenaireQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Partenaire[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Partenaire|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
