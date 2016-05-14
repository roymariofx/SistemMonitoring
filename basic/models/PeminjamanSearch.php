<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peminjaman;
$user=Yii::$app->user->identity->username;
/**
 * PeminjamanSearch represents the model behind the search form about `app\models\Peminjaman`.
 */
class PeminjamanSearch extends Peminjaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPeminjaman', 'StatusLaporan'], 'integer'],
            [['Status', 'Tanggal', 'Tujuan', 'Kdr_PlatNomor', 'Keperluan', 'Timestamp', 'NamaPengguna'], 'safe'],
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
        $query = Peminjaman::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $role= Yii::$app->user->identity->Role;
        if($role=='1'){
        $query->andFilterWhere([
            'idPeminjaman' => $this->idPeminjaman,
            'Tanggal' => $this->Tanggal,
            'Timestamp' => $this->Timestamp,
           'NamaPengguna' => Yii::$app->user->identity->username,
            'Kdr_PlatNomor' => $this->Kdr_PlatNomor,
            'Status' => $this->Status,
            'StatusLaporan' => $this->StatusLaporan,
        ]);
        }

        $query->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Tujuan', $this->Tujuan])
            ->andFilterWhere(['like', 'Keperluan', $this->Keperluan]);

        return $dataProvider;
    }
}
