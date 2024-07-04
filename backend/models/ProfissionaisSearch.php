<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Profissionais;

/**
 * ProfissionaisSearch represents the model behind the search form of `backend\models\Profissionais`.
 */
class ProfissionaisSearch extends Profissionais
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['conselho', 'nome', 'numero_conselho', 'nascimento', 'email', 'status'], 'safe'],
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
        $query = Profissionais::find();

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
            'nascimento' => $this->nascimento,
        ]);

        $query->andFilterWhere(['like', 'conselho', $this->conselho])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'numero_conselho', $this->numero_conselho])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
