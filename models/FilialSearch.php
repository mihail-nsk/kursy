<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;;

/**
 * FilialSearch represents the model behind the search form about `app\models\Filial`.
 */
class FilialSearch extends Filial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FilialID'], 'integer'],
            [['Address', 'Phone', 'Email'], 'safe'],
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
        $query = Filial::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'FilialID' => $this->FilialID,
        ]);

        $query->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Phone', $this->Phone])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
