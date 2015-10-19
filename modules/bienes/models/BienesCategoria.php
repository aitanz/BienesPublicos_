<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.categoria".
 *
 * @property integer $id_categoria
 * @property string $descripcion
 *
 * @property BienesCategoriaCodigoBien[] $bienesCategoriaCodigoBiens
 * @property BienesCodigo[] $idCodigos
 */
class BienesCategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria', 'descripcion'], 'required'],
            [['id_categoria'], 'integer'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesCategoriaCodigoBiens()
    {
        return $this->hasMany(BienesCategoriaCodigoBien::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigos()
    {
        return $this->hasMany(BienesCodigo::className(), ['id_codigo' => 'id_codigo'])->viaTable('categoria_codigo_bien', ['id_categoria' => 'id_categoria']);
    }
}
