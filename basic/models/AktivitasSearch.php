<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\aktivitas;


class AktivitasSearch extends aktivitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['NamaPengguna'], 'integer'],
            [['username', 'deskripsi', 'timestamp'], 'safe'],
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
        $query = aktivitas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                        'defaultOrder' => [
                            'timestamp' => SORT_DESC,
                        ]
                    ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like','username', $this->username])
            ->andFilterWhere(['like','timestamp', $this->timestamp]);

        return $dataProvider;
    }
}

