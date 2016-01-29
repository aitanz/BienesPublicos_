<?php

namespace app\modules\organizacion\models;

use Yii;

/**
 * This is the model class for table "organizacion.uadministrativa".
 *
 * @property integer $id_unidad
 * @property string $denominacion
 * @property integer $depedencia
 * @property integer $id_organizacion
 * @property integer $id_categoria
 *
 * @property BienesCategoria $idCategoria
 * @property BienesCategoriaUnidad $idCategoria0
 */
class OrganizacionUadministrativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizacion.uadministrativa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denominacion', 'depedencia', 'id_organizacion'], 'required'],
            [['depedencia', 'id_organizacion', 'id_categoria'], 'integer'],
            [['denominacion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_unidad' => Yii::t('app', 'Id Unidad'),
            'denominacion' => Yii::t('app', 'Denominacion'),
            'depedencia' => Yii::t('app', 'Depedencia'),
            'id_organizacion' => Yii::t('app', 'Id Organizacion'),
            'id_categoria' => Yii::t('app', 'Id Categoria'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(BienesCategoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria0()
    {
        return $this->hasOne(BienesCategoriaUnidad::className(), ['id_categoria_adm' => 'id_categoria']);
    }
}
