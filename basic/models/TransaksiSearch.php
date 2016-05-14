<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaksi;

/**
 * TransaksiSearch represents the model behind the search form about `app\models\Transaksi`.
 */
class TransaksiSearch extends Transaksi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Nasabah'], 'integer'],
            [['Tanggal_Transaksi', 'Tipe_Transaksi', 'Rekening_Tujuan'], 'safe'],
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
        $query = Transaksi::find();

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
            'Tanggal_Transaksi' => $this->Tanggal_Transaksi,
            'ID_Nasabah' => $this->ID_Nasabah,
        ]);

        $query->andFilterWhere(['like', 'Tipe_Transaksi', $this->Tipe_Transaksi])
            ->andFilterWhere(['like', 'Rekening_Tujuan', $this->Rekening_Tujuan]);

        return $dataProvider;
    }
}
