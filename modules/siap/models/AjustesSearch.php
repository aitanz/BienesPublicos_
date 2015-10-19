<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\Ajustes;

/**
 * AjustesSearch represents the model behind the search form about `app\modules\siap\models\Ajustes`.
 */
class AjustesSearch extends Ajustes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ajuste', 'id_tipo_ajuste', 'id_usuario_crea', 'idefiscal', 'id_usuario_reversa'], 'integer'],
            [['fecha_ajuste', 'concepto', 'reversado', 'fecha_reverso_ajuste'], 'safe'],
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
        $query = Ajustes::find();

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
            'id_ajuste' => $this->id_ajuste,
            'id_tipo_ajuste' => $this->id_tipo_ajuste,
            'fecha_ajuste' => $this->fecha_ajuste,
            'id_usuario_crea' => $this->id_usuario_crea,
            'idefiscal' => $this->idefiscal,
            'fecha_reverso_ajuste' => $this->fecha_reverso_ajuste,
            'id_usuario_reversa' => $this->id_usuario_reversa,
        ]);

        $query->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'reversado', $this->reversado]);

        return $dataProvider;
    }
}
