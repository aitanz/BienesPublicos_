<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\Cuenta;

/**
 * CuentaSearch represents the model behind the search form about `app\modules\siap\models\Cuenta`.
 */
class CuentaSearch extends Cuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'puc', 'categoria', 'descripcion', 'auxiliar', 'pucn'], 'safe'],
            [['monto'], 'number'],
            [['idcategoriaprogramatica', 'idpuc'], 'integer'],
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
        $query = Cuenta::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'monto' => $this->monto,
            'idcategoriaprogramatica' => $this->idcategoriaprogramatica,
            'idpuc' => $this->idpuc,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'puc', $this->puc])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'auxiliar', $this->auxiliar])
            ->andFilterWhere(['like', 'pucn', $this->pucn]);

        return $dataProvider;
    }
}
