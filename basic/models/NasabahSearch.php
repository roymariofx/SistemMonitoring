<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nasabah;

/**
 * NasabahSearch represents the model behind the search form about `app\models\Nasabah`.
 */
class NasabahSearch extends Nasabah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'Unit_ID', 'Nilai_Kekayaan'], 'integer'],
            [['NAMA_NASABAH'], 'safe'],
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
        $query = Nasabah::find();

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
            'Unit_ID' => $this->Unit_ID,
            'Nilai_Kekayaan' => $this->Nilai_Kekayaan,
        ]);

        $query->andFilterWhere(['like', 'NAMA_NASABAH', $this->NAMA_NASABAH]);

        return $dataProvider;
    }
}
