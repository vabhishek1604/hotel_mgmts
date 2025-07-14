<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menues;

/**
 * MenuesSearch represents the model behind the search form of `app\models\Menues`.
 */
class MenuesSearch extends Menues
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'menu_level', 'menu_parent', 'menu_order', 'menu_status'], 'integer'],
            [['menu_pos', 'menu_title', 'menu_linktype', 'menu_pageurl'], 'safe'],
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
        $query = Menues::find();

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
            'menu_id' => $this->menu_id,
            'menu_level' => $this->menu_level,
            'menu_parent' => $this->menu_parent,
            'menu_order' => $this->menu_order,
            'menu_status' => $this->menu_status,
        ]);

        $query->andFilterWhere(['like', 'menu_pos', $this->menu_pos])
            ->andFilterWhere(['like', 'menu_title', $this->menu_title])
            ->andFilterWhere(['like', 'menu_linktype', $this->menu_linktype])
            ->andFilterWhere(['like', 'menu_pageurl', $this->menu_pageurl]);

        return $dataProvider;
    }
}
