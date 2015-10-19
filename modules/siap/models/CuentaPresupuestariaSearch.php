<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\CuentaPresupuestaria;

/**
 * CuentaPresupuestariaSearch represents the model behind the search form about `app\modules\siap\models\CuentaPresupuestaria`.
 */
class CuentaPresupuestariaSearch extends CuentaPresupuestaria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcuenta', 'statusaprobacion', 'tipopartida', 'idcategoriaprogramatica', 'idpuc', 'tipocuenta', 'adicional', 'proyecto', 'idrecurso', 'idusuario', 'idefiscal', 'inversion'], 'integer'],
            [['auxiliar', 'descripcionaux', 'sectorgeog', 'puc', 'categoria', 'observacion', 'fechagaceta', 'extraordinario', 'gaceta', 'clase'], 'safe'],
            [['causado', 'comprometido', 'disponibilidad', 'pagado', 'aumentado', 'disminuido', 'precomprometido', 'montoinicial', 'montooriginal', 'corriente', 'capital', 'financiera'], 'number'],
            [['espadre'], 'boolean'],
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
        $query = CuentaPresupuestaria::find();

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
            'idcuenta' => $this->idcuenta,
            'causado' => $this->causado,
            'comprometido' => $this->comprometido,
            'disponibilidad' => $this->disponibilidad,
            'espadre' => $this->espadre,
            'pagado' => $this->pagado,
            'aumentado' => $this->aumentado,
            'disminuido' => $this->disminuido,
            'precomprometido' => $this->precomprometido,
            'statusaprobacion' => $this->statusaprobacion,
            'tipopartida' => $this->tipopartida,
            'montoinicial' => $this->montoinicial,
            'idcategoriaprogramatica' => $this->idcategoriaprogramatica,
            'idpuc' => $this->idpuc,
            'tipocuenta' => $this->tipocuenta,
            'adicional' => $this->adicional,
            'montooriginal' => $this->montooriginal,
            'proyecto' => $this->proyecto,
            'idrecurso' => $this->idrecurso,
            'fechagaceta' => $this->fechagaceta,
            'idusuario' => $this->idusuario,
            'idefiscal' => $this->idefiscal,
            'corriente' => $this->corriente,
            'capital' => $this->capital,
            'financiera' => $this->financiera,
            'inversion' => $this->inversion,
        ]);

        $query->andFilterWhere(['like', 'auxiliar', $this->auxiliar])
            ->andFilterWhere(['like', 'descripcionaux', $this->descripcionaux])
            ->andFilterWhere(['like', 'sectorgeog', $this->sectorgeog])
            ->andFilterWhere(['like', 'puc', $this->puc])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'extraordinario', $this->extraordinario])
            ->andFilterWhere(['like', 'gaceta', $this->gaceta])
            ->andFilterWhere(['like', 'clase', $this->clase]);

        return $dataProvider;
    }
}
