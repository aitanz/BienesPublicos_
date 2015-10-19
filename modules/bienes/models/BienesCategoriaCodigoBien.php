<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.categoria_codigo_bien".
 *
 * @property integer $id_categoria
 * @property integer $id_codigo
 *
 * @property BienesCategoria $idCategoria
 * @property BienesCodigo $idCodigo
 */
class BienesCategoriaCodigoBien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.categoria_codigo_bien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria', 'id_codigo'], 'required'],
            [['id_categoria', 'id_codigo'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'id_codigo' => Yii::t('app', 'Id Codigo'),
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
    public function getIdCodigo()
    {
        return $this->hasOne(BienesCodigo::className(), ['id_codigo' => 'id_codigo']);
    }
}
