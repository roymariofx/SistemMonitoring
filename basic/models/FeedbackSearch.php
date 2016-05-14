<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Feedback;

/**
 * FeedbackSearch represents the model behind the search form about `app\models\Feedback`.
 */
class FeedbackSearch extends Feedback
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFeedback'], 'integer'],
            [['KritikSaran', 'NamaPengguna', 'Timestamp'], 'safe'],
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
        $query = Feedback::find();

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
            'idFeedback' => $this->idFeedback,
            'NamaPengguna' => Yii::$app->user->identity->username,
        ]);
           }
        $query->andFilterWhere(['like', 'KritikSaran', $this->KritikSaran])
            ->andFilterWhere(['like', 'NamaPengguna', $this->NamaPengguna]);

        return $dataProvider;
    }
}

