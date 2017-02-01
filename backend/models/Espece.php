<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Espece".
 *
 * @property integer $id
 * @property string $nom_courant
 * @property string $nom_latin
 * @property string $description
 *
 * @property Animal[] $animals
 */
class Espece extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Espece';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom_courant', 'nom_latin'], 'required'],
            [['description'], 'string'],
            [['nom_courant', 'nom_latin'], 'string', 'max' => 40],
            [['nom_latin'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nom_courant' => Yii::t('app', 'Nom Courant'),
            'nom_latin' => Yii::t('app', 'Nom Latin'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animal::className(), ['espece_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return EspeceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EspeceQuery(get_called_class());
    }
}
