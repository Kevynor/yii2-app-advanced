<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Espece]].
 *
 * @see Espece
 */
class EspeceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Espece[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Espece|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
