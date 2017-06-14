<?php

namespace app\modules\jobcenter\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\jobcenter\models\JobVacansy;

/**
 * SearchVacancy represents the model behind the search form about `app\modules\jobcenter\models\JobVacansy`.
 */
class SearchVacancy extends JobVacansy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id', 'city_id', 'status'], 'integer'],
            [['category_title', 'city_title', 'vacansy_title', 'company_title', 'company_site', 'company_description', 'company_phone', 'company_email', 'created_at', 'updated_at'], 'safe'],
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
        $query = JobVacansy::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'city_id' => $this->city_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'category_title', $this->category_title])
            ->andFilterWhere(['like', 'city_title', $this->city_title])
            ->andFilterWhere(['like', 'vacansy_title', $this->vacansy_title])
            ->andFilterWhere(['like', 'company_title', $this->company_title])
            ->andFilterWhere(['like', 'company_site', $this->company_site])
            ->andFilterWhere(['like', 'company_description', $this->company_description])
            ->andFilterWhere(['like', 'company_phone', $this->company_phone])
            ->andFilterWhere(['like', 'company_email', $this->company_email]);

        return $dataProvider;
    }
}