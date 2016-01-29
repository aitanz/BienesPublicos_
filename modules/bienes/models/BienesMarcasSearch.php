<?php

namespace app\modules\bienes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bienes\models\BienesMarcas;

/**
 * BienesMarcasSearch represents the model behind the search form about `app\modules\bienes\models\BienesMarcas`.
 */
class BienesMarcasSearch extends BienesMarcas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca'], 'integer'],
            [['marca', 'fabricante'], 'safe'],
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
        $query = BienesMarcas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_marca' => $this->id_marca,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'fabricante', $this->fabricante]);

        return $dataProvider;
    }
}
