<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\OrdenCompraDetalle;

/**
 * OrdenCompraDetalleSearch represents the model behind the search form about `app\modules\siap\models\OrdenCompraDetalle`.
 */
class OrdenCompraDetalleSearch extends OrdenCompraDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idordencompradetalle', 'idproducto', 'idordencompra', 'idefiscal', 'idordenservicio'], 'integer'],
            [['cantidad', 'descuento', 'iva', 'punitario'], 'number'],
            [['garantia'], 'safe'],
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
        $query = OrdenCompraDetalle::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idordencompradetalle' => $this->idordencompradetalle,
            'cantidad' => $this->cantidad,
            'descuento' => $this->descuento,
            'iva' => $this->iva,
            'punitario' => $this->punitario,
            'idproducto' => $this->idproducto,
            'idordencompra' => $this->idordencompra,
            'idefiscal' => $this->idefiscal,
            'idordenservicio' => $this->idordenservicio,
        ]);

        $query->andFilterWhere(['like', 'garantia', $this->garantia]);

        return $dataProvider;
    }
}
