<?php

namespace app\modules\organizacion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizacion\models\OrganizacionUadministrativa;

/**
 * OrganizacionUadministrativaSearch represents the model behind the search form about `app\modules\organizacion\models\OrganizacionUadministrativa`.
 */
class OrganizacionUadministrativaSearch extends OrganizacionUadministrativa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unidad', 'depedencia', 'id_organizacion', 'id_categoria'], 'integer'],
            [['denominacion'], 'safe'],
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
        $query = OrganizacionUadministrativa::find();

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
            'id_unidad' => $this->id_unidad,
            'depedencia' => $this->depedencia,
            'id_organizacion' => $this->id_organizacion,
            'id_categoria' => $this->id_categoria,
        ]);

        $query->andFilterWhere(['like', 'denominacion', $this->denominacion]);

        return $dataProvider;
    }
}
