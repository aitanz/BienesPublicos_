<?php

namespace app\modules\organizacion\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\organizacion\models\OrganizacionOrganizacion;

/**
 * OrganizacionOrganizacionSearch represents the model behind the search form about `app\modules\organizacion\models\OrganizacionOrganizacion`.
 */
class OrganizacionOrganizacionSearch extends OrganizacionOrganizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_organizacion'], 'integer'],
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
        $query = OrganizacionOrganizacion::find();

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
            'id_organizacion' => $this->id_organizacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
