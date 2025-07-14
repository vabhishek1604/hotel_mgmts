<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagecontent;

/**
 * PagecontentSearch represents the model behind the search form of `app\models\Pagecontent`.
 */
class PagecontentSearch extends Pagecontent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cont_id', 'cont_menuid', 'cont_order', 'cont_status'], 'integer'],
            [['cont_title', 'cont_desc', 'cont_image', 'cont_entrydt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pagecontent::find();

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
            'cont_id' => $this->cont_id,
            'cont_menuid' => $this->cont_menuid,
            'cont_order' => $this->cont_order,
            'cont_entrydt' => $this->cont_entrydt,
            'cont_status' => $this->cont_status,
        ]);

        $query->andFilterWhere(['like', 'cont_title', $this->cont_title])
            ->andFilterWhere(['like', 'cont_desc', $this->cont_desc])
            ->andFilterWhere(['like', 'cont_image', $this->cont_image]);

        return $dataProvider;
    }
}
