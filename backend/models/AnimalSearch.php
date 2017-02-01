<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Animal;

/**
 * AnimalSearch represents the model behind the search form about `backend\models\Animal`.
 */
class AnimalSearch extends Animal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'espece_id'], 'integer'],
            [['sexe', 'date_naissance', 'nom', 'commentaires'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Animal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_naissance' => $this->date_naissance,
            'espece_id' => $this->espece_id,
        ]);

        $query->andFilterWhere(['like', 'sexe', $this->sexe])
            ->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'commentaires', $this->commentaires]);

        return $dataProvider;
    }
}
