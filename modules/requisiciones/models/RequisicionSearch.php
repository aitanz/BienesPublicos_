<?php

namespace app\modules\requisiciones\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\requisiciones\models\Requisicion;

/**
 * RequisicionSearch represents the model behind the search form about `app\modules\requisiciones\models\Requisicion`.
 */
class RequisicionSearch extends Requisicion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrequisicion', 'status', 'tipo', 'numcontrol', 'idefiscal', 'idtipoproducto', 'idcoordinacion', 'idtipopago', 'statusinformatica', 'statusadmin', 'idusuario', 'idproveedor', 'idcuenta', 'idpuc', 'idcategoriaprogramatica', 'iddireccion'], 'integer'],
            [['fecha', 'observaciones', 'concepto', 'fechainformatica', 'fechaadmin', 'motivorechazo', 'bitacora', 'dirip', 'puc', 'categoriaprogramatica', 'auxiliar', 'secuencia'], 'safe'],
            [['monto', 'disponible'], 'number'],
            [['imputacion'], 'boolean'],
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
        $query = Requisicion::find();

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
            'idrequisicion' => $this->idrequisicion,
            'status' => $this->status,
            'fecha' => $this->fecha,
            'tipo' => $this->tipo,
            'numcontrol' => $this->numcontrol,
            'idefiscal' => $this->idefiscal,
            'idtipoproducto' => $this->idtipoproducto,
            'idcoordinacion' => $this->idcoordinacion,
            'idtipopago' => $this->idtipopago,
            'statusinformatica' => $this->statusinformatica,
            'statusadmin' => $this->statusadmin,
            'fechainformatica' => $this->fechainformatica,
            'fechaadmin' => $this->fechaadmin,
            'bitacora' => $this->bitacora,
            'idusuario' => $this->idusuario,
            'idproveedor' => $this->idproveedor,
            'monto' => $this->monto,
            'idcuenta' => $this->idcuenta,
            'idpuc' => $this->idpuc,
            'idcategoriaprogramatica' => $this->idcategoriaprogramatica,
            'disponible' => $this->disponible,
            'iddireccion' => $this->iddireccion,
            'imputacion' => $this->imputacion,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones])
            ->andFilterWhere(['like', 'concepto', $this->concepto])
            ->andFilterWhere(['like', 'motivorechazo', $this->motivorechazo])
            ->andFilterWhere(['like', 'dirip', $this->dirip])
            ->andFilterWhere(['like', 'puc', $this->puc])
            ->andFilterWhere(['like', 'categoriaprogramatica', $this->categoriaprogramatica])
            ->andFilterWhere(['like', 'auxiliar', $this->auxiliar])
            ->andFilterWhere(['like', 'secuencia', $this->secuencia]);

        return $dataProvider;
    }
}
