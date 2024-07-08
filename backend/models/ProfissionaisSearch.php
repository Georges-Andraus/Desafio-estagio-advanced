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
    public $clinicaNome;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['conselho', 'nome', 'numero_conselho', 'nascimento', 'email', 'ativo', 'clinicaNome'], 'safe'],
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

        $query->joinWith(['clinicas']);
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

        $dataProvider->sort->attributes['Clinicas'] = [
			'asc' => ['clinicas.nome' => SORT_ASC],
			'desc' => ['clinicas.nome' => SORT_DESC],
        ];
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nascimento' => $this->nascimento,
        ]);

        $query->andFilterWhere(['like', 'conselho', $this->conselho])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'numero_conselho', $this->numero_conselho])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'ativo', $this->ativo])
            ->andFilterWhere(['like', 'clinicas.nome', $this->clinicaNome]);
            

        return $dataProvider;
    }
}
