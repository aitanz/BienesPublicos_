<?php

namespace app\modules\bienes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bienes\models\BienesLocalidad;

/**
 * BienesLocalidadSearch represents the model behind the search form about `app\modules\bienes\models\BienesLocalidad`.
 */
class BienesLocalidadSearch extends BienesLocalidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_localidad', 'codigo_localidad', 'padre', 'codigo_completo', 'id_tipo_localidad'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = BienesLocalidad::find();

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
            'id_localidad' => $this->id_localidad,
            'codigo_localidad' => $this->codigo_localidad,
            'padre' => $this->padre,
            'codigo_completo' => $this->codigo_completo,
            'id_tipo_localidad' => $this->id_tipo_localidad,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
