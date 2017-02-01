<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property integer $id
 * @property string $sexe
 * @property string $date_naissance
 * @property string $nom
 * @property string $commentaires
 * @property integer $espece_id
 *
 * @property Espece $espece
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_naissance'], 'required'],
            [['date_naissance'], 'safe'],
            [['commentaires'], 'string'],
            [['espece_id'], 'integer'],
            [['sexe'], 'string', 'max' => 1],
            [['nom'], 'string', 'max' => 30],
            [['espece_id'], 'exist', 'skipOnError' => true, 'targetClass' => Espece::className(), 'targetAttribute' => ['espece_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sexe' => Yii::t('app', 'Sexe'),
            'date_naissance' => Yii::t('app', 'Date Naissance'),
            'nom' => Yii::t('app', 'Nom'),
            'commentaires' => Yii::t('app', 'Commentaires'),
            'espece_id' => Yii::t('app', 'Espece ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspece()
    {
        return $this->hasOne(Espece::className(), ['id' => 'espece_id']);
    }

    /**
     * @inheritdoc
     * @return AnimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnimalQuery(get_called_class());
    }
}
