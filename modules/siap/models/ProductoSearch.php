<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `app\modules\siap\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproducto', 'idunidadmedida', 'idtipoproducto'], 'integer'],
            [['descripcion'], 'safe'],
            [['exento', 'almacen', 'servicio'], 'boolean'],
            [['stockminimo'], 'number'],
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
        $query = Producto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idproducto' => $this->idproducto,
            'idunidadmedida' => $this->idunidadmedida,
            'idtipoproducto' => $this->idtipoproducto,
            'exento' => $this->exento,
            'almacen' => $this->almacen,
            'stockminimo' => $this->stockminimo,
            'servicio' => $this->servicio,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
