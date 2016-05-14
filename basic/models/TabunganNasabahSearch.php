<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TabunganNasabah;

/**
 * TabunganNasabahSearch represents the model behind the search form about `app\models\TabunganNasabah`.
 */
class TabunganNasabahSearch extends TabunganNasabah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Nasabah', 'ID_Tabungan', 'ID_Unit_Region', 'NOMINAL_TABUNGAN'], 'integer'],
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
        $query = TabunganNasabah::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'ID_Nasabah' => $this->ID_Nasabah,
            'ID_Tabungan' => $this->ID_Tabungan,
            'ID_Unit_Region' => $this->ID_Unit_Region,
            'NOMINAL_TABUNGAN' => $this->NOMINAL_TABUNGAN,
        ]);

        return $dataProvider;
    }
}
