<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Partenaire;

/**
 * PartenaireSearch represents the model behind the search form of `app\models\Partenaire`.
 */
class PartenaireSearch extends Partenaire
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'distributeur_id'], 'integer'],
            [['type', 'numero', 'raison_sociale', 'adresse_1', 'adresse_2', 'code_postal', 'ville', 'telephone', 'mobile', 'email', 'logo', 'template'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Partenaire::find()->orderBy(['raison_sociale'=>'ASC']);

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
            'distributeur_id' => $this->distributeur_id,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'raison_sociale', $this->raison_sociale])
            ->andFilterWhere(['like', 'adresse_1', $this->adresse_1])
            ->andFilterWhere(['like', 'adresse_2', $this->adresse_2])
            ->andFilterWhere(['like', 'code_postal', $this->code_postal])
            ->andFilterWhere(['like', 'ville', $this->ville])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'template', $this->template]);

        return $dataProvider;
    }
}
