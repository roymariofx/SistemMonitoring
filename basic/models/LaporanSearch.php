<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

/**
 * LaporanSearch represents the model behind the search form about `app\models\Laporan`.
 */
class LaporanSearch extends Laporan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLaporan', 'BiayaTol', 'BiayaTilang', 'BiayaParkir', 'BiayaBensin', 'KMisiBensin', 'KMSebelumPergi', 'KMSesudahPergi'], 'integer'],
            [['LokasiPOMBensin', 'Kdr_PlatNomor', 'NamaPengguna', 'Timestamp', 'TanggalPeminjaman'], 'safe'],
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
        $query = Laporan::find();

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
            'idLaporan' => $this->idLaporan,
            'BiayaTol' => $this->BiayaTol,
            'biayaTilang' => $this->BiayaTilang,
            'BiayaParkir' => $this->BiayaParkir,
            'BiayaBensin' => $this->BiayaBensin,
            'KMisiBensin' => $this->KMisiBensin,
            'KMSebeleumPergi' => $this->KMSebelumPergi,
            'KMSesudahPergi' => $this->KMSesudahPergi,
            'NamaPengguna' => Yii::$app->user->identity->username,
            'TanggalPeminjaman' => $this->TanggalPeminjaman,
        ]);
        }
        $query->andFilterWhere(['like', 'LokasiPOMBensin', $this->LokasiPOMBensin])
            ->andFilterWhere(['like', 'Kdr_PlatNomor', $this->Kdr_PlatNomor]);

        return $dataProvider;
    }
}
