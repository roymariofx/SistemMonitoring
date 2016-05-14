<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kendaraan;

/**
 * KendaraanSearch represents the model behind the search form about `app\models\Kendaraan`.
 */
class KendaraanSearch extends Kendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PlatNomor', 'Tipe', 'Merek', 'Status', 'foto'], 'safe'],
            [['NomorSTNK'], 'integer'],
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
        $query = Kendaraan::find();

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
            'NomorSTNK' => $this->NomorSTNK,
        ]);

        $query->andFilterWhere(['like', 'PlatNomor', $this->PlatNomor])
            ->andFilterWhere(['like', 'Tipe', $this->Tipe])
            ->andFilterWhere(['like', 'Merek', $this->Merek])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
