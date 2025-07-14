<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projectimages;

/**
 * ProjectImagesSearch represents the model behind the search form of `app\models\ProjectImages`.
 */
class ProjectimagesSearch extends ProjectImages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pimg_id', 'pimg_projid', 'pimg_propid', 'pimg_addedby', 'pimg_isactive'], 'integer'],
            [['pimg_type', 'pimg_url', 'pimg_entrydt'], 'safe'],
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
        $query = ProjectImages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['pimg_id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pimg_id' => $this->pimg_id,
            'pimg_projid' => $this->pimg_projid,
            'pimg_propid' => $this->pimg_propid,
            'pimg_addedby' => $this->pimg_addedby,
            'pimg_entrydt' => $this->pimg_entrydt,
            'pimg_isactive' => $this->pimg_isactive,
        ]);

        $query->andFilterWhere(['like', 'pimg_type', $this->pimg_type])
            ->andFilterWhere(['like', 'pimg_url', $this->pimg_url]);

        return $dataProvider;
    }
}
