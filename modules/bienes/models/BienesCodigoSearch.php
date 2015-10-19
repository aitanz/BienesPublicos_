<?php

namespace app\modules\bienes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bienes\models\BienesCodigo;

/**
 * BienesCodigoSearch represents the model behind the search form about `app\modules\bienes\models\BienesCodigo`.
 */
class BienesCodigoSearch extends BienesCodigo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'codigo', 'padre'], 'integer'],
            [['descripcion', 'codigo_completo'], 'safe'],
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
        $query = BienesCodigo::find();

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
            'id_codigo' => $this->id_codigo,
            'codigo' => $this->codigo,
            'padre' => $this->padre,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'codigo_completo', $this->codigo_completo]);

        return $dataProvider;
    }
}
