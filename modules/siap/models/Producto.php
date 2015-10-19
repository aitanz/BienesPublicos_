<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $idproducto
 * @property string $descripcion
 * @property integer $idunidadmedida
 * @property integer $idtipoproducto
 * @property boolean $exento
 * @property boolean $almacen
 * @property string $stockminimo
 * @property boolean $servicio
 *
 * @property Productoxproveedor[] $productoxproveedors
 * @property Proveedor[] $idproveedors
 * @property Ordencompradetalle[] $ordencompradetalles
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'idtipoproducto'], 'required'],
            [['idunidadmedida', 'idtipoproducto'], 'integer'],
            [['exento', 'almacen', 'servicio'], 'boolean'],
            [['stockminimo'], 'number'],
            [['descripcion'], 'string', 'max' => 800]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproducto' => Yii::t('app', 'Idproducto'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'idunidadmedida' => Yii::t('app', 'Idunidadmedida'),
            'idtipoproducto' => Yii::t('app', 'Idtipoproducto'),
            'exento' => Yii::t('app', 'Exento'),
            'almacen' => Yii::t('app', 'Almacen'),
            'stockminimo' => Yii::t('app', 'Stockminimo'),
            'servicio' => Yii::t('app', 'Servicio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoxproveedors()
    {
        return $this->hasMany(Productoxproveedor::className(), ['idproducto' => 'idproducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproveedors()
    {
        return $this->hasMany(Proveedor::className(), ['idproveedor' => 'idproveedor'])->viaTable('productoxproveedor', ['idproducto' => 'idproducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompradetalles()
    {
        return $this->hasMany(Ordencompradetalle::className(), ['idproducto' => 'idproducto']);
    }
}
