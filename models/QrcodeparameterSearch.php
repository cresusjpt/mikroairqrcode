<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Qrcodeparameter;

/**
 * QrcodeparameterSearch represents the model behind the search form of `app\models\Qrcodeparameter`.
 */
class QrcodeparameterSearch extends Qrcodeparameter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'logo', 'titre', 'police'], 'integer'],
            [['taille', 'logo_source', 'background', 'foreground'], 'safe'],
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
        $query = Qrcodeparameter::find();

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
            'logo' => $this->logo,
            'titre' => $this->titre,
            'police' => $this->police,
        ]);

        $query->andFilterWhere(['like', 'taille', $this->taille])
            ->andFilterWhere(['like', 'logo_source', $this->logo_source])
            ->andFilterWhere(['like', 'background', $this->background])
            ->andFilterWhere(['like', 'foreground', $this->foreground]);

        return $dataProvider;
    }
}
