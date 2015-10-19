<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\Movimientoporajuste;

/**
 * MovimientoporajusteSearch represents the model behind the search form about `app\modules\siap\models\Movimientoporajuste`.
 */
class MovimientoporajusteSearch extends Movimientoporajuste
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_documento', 'tipomovimiento', 'id_ajuste', 'idefiscal'], 'integer'],
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
        $query = Movimientoporajuste::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_documento' => $this->id_documento,
            'tipomovimiento' => $this->tipomovimiento,
            'id_ajuste' => $this->id_ajuste,
            'idefiscal' => $this->idefiscal,
        ]);

        return $dataProvider;
    }
}
