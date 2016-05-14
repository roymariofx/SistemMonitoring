<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengguna;

/**
 * PenggunaSearch represents the model behind the search form about `app\models\Pengguna`.
 */
class PenggunaSearch extends Pengguna
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Role'], 'integer'],
            [['username', 'password', 'Alamat', 'Email', 'TanggalLahir', 'NoTelp'], 'safe'],
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
        $query = Pengguna::find();

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
            'username' => $this->username,
        ]);

        $query->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'TanggalLahir', $this->TanggalLahir])
             ->andFilterWhere(['like', 'Role', $this->Role])
            ->andFilterWhere(['like', 'NoTelp', $this->NoTelp]);

        return $dataProvider;
    }
}
