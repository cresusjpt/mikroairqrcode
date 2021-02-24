<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diffuseur;

/**
 * DiffuseurSearch represents the model behind the search form of `app\models\Diffuseur`.
 */
class DiffuseurSearch extends Diffuseur
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'info_etat', 'param_duree_cycle_on', 'param_duree_cycle_off', 'param_frequence_connexion', 'param_vitesse_ventilo', 'param_compresseur'], 'integer'],
            [['info_unique_id', 'info_numero_serie', 'info_date_installation', 'info_date_derniere_connexion', 'info_emplacement', 'param_programmation'], 'safe'],
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
        $query = Diffuseur::find();

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
            'client_id' => $this->client_id,
            'info_date_installation' => $this->info_date_installation,
            'info_date_derniere_connexion' => $this->info_date_derniere_connexion,
            'info_etat' => $this->info_etat,
            'param_duree_cycle_on' => $this->param_duree_cycle_on,
            'param_duree_cycle_off' => $this->param_duree_cycle_off,
            'param_frequence_connexion' => $this->param_frequence_connexion,
            'param_vitesse_ventilo' => $this->param_vitesse_ventilo,
            'param_compresseur' => $this->param_compresseur,
        ]);

        $query->andFilterWhere(['like', 'info_unique_id', $this->info_unique_id])
            ->andFilterWhere(['like', 'info_numero_serie', $this->info_numero_serie])
            ->andFilterWhere(['like', 'info_emplacement', $this->info_emplacement])
            ->andFilterWhere(['like', 'param_programmation', $this->param_programmation]);

        return $dataProvider;
    }
}
