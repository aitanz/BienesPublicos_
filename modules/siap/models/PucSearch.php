<?php

namespace app\modules\siap\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\siap\models\Puc;

/**
 * PucSearch represents the model behind the search form about `app\modules\siap\models\Puc`.
 */
class PucSearch extends Puc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpuc', 'idefiscal', 'idcuentadebe', 'idcuentahaber', 'idcuentahaberorden'], 'integer'],
            [['descripcion', 'puc'], 'safe'],
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
        $query = Puc::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idpuc' => $this->idpuc,
            'idefiscal' => $this->idefiscal,
            'idcuentadebe' => $this->idcuentadebe,
            'idcuentahaber' => $this->idcuentahaber,
            'idcuentahaberorden' => $this->idcuentahaberorden,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'puc', $this->puc]);

        return $dataProvider;
    }
}
