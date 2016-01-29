<?php

namespace app\modules\bienes\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bienes\models\BienesCategoriau;

/**
 * BienesCategoriauSearch represents the model behind the search form about `app\modules\bienes\models\BienesCategoriau`.
 */
class BienesCategoriauSearch extends BienesCategoriau
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria_adm'], 'integer'],
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
        $query = BienesCategoriau::find();

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
            'id_categoria_adm' => $this->id_categoria_adm,
        ]);

        $query->andFilterWhere(['like', 'denominacion', $this->denominacion]);

        return $dataProvider;
    }
}
