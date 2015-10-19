<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\OrdenCompra;

/**
 * OrdenCompraSearch represents the model behind the search form about `app\modules\siap\models\OrdenCompra`.
 */
class OrdenCompraSearch extends OrdenCompra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idordencompra', 'status', 'tipo', 'numcontrol', 'idefiscal', 'idproveedor', 'reversado', 'idcordinacion', 'idusuario_crea', 'idusuario_reversa', 'idordenservicio', 'reqrequisicion', 'reqinvitacion', 'reqinforme', 'reqpresupuesto', 'cantpresupuesto', 'cantcarta', 'reqcarta', 'proyecto', 'id_odc'], 'integer'],
            [['fecha', 'observaciones', 'concepto', 'motivo', 'fecha_crea', 'fecha_reverso', 'hora_crea', 'horareverso', 'descripcionproyecto', 'tentrega', 'observacion'], 'safe'],
            [['escredito'], 'boolean'],
            [['monto', 'montoiva'], 'number'],
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
        $query = OrdenCompra::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idordencompra' => $this->idordencompra,
            'status' => $this->status,
            'fecha' => $this->fecha,
            'tipo' => $this->tipo,
            'escredito' => $this->escredito,
            'numcontrol' => $this->numcontrol,
            'idefiscal' => $this->idefiscal,
            'monto' => $this->monto,
            'montoiva' => $this->montoiva,
            'idproveedor' => $this->idproveedor,
            'reversado' => $this->reversado,
            'idcordinacion' => $this->idcordinacion,
            'idusuario_crea' => $this->idusuario_crea,
            'fecha_crea' => $this->fecha_crea,
            'fecha_reverso' => $this->fecha_reverso,
            'idusuario_reversa' => $this->idusuario_reversa,
            'idordenservicio' => $this->idordenservicio,
            'reqrequisicion' => $this->reqrequisicion,
            'reqinvitacion' => $this->reqinvitacion,
            'reqinforme' => $this->reqinforme,
            'reqpresupuesto' => $this->reqpresupuesto,
            'cantpresupuesto' => $this->cantpresupuesto,
            'cantcarta' => $this->cantcarta,
            'reqcarta' => $this->reqcarta,
            'proyecto' => $this->proyecto,
            'id_odc' => $this->id_odc,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'motivo', $this->motivo])
            ->andFilterWhere(['like', 'hora_crea', $this->hora_crea])
            ->andFilterWhere(['like', 'horareverso', $this->horareverso])
            ->andFilterWhere(['like', 'descripcionproyecto', $this->descripcionproyecto])
            ->andFilterWhere(['like', 'tentrega', $this->tentrega])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
