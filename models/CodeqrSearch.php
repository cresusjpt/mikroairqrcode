<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Codeqr;

/**
 * CodeqrSearch represents the model behind the search form of `app\models\Codeqr`.
 */
class CodeqrSearch extends Codeqr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'partenaire', 'diffuser'], 'integer'],
            [['source'], 'safe'],
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
        $query = Codeqr::find();

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
            'partenaire' => $this->partenaire,
            'diffuser' => $this->diffuser,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source]);

        return $dataProvider;
    }
}
