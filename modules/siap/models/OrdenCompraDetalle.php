<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "ordencompradetalle".
 *
 * @property integer $idordencompradetalle
 * @property string $cantidad
 * @property string $descuento
 * @property string $iva
 * @property string $punitario
 * @property integer $idproducto
 * @property integer $idordencompra
 * @property integer $idefiscal
 * @property integer $idordenservicio
 * @property string $garantia
 *
 * @property Producto $idproducto0
 */
class OrdenCompraDetalle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordencompradetalle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'descuento', 'iva', 'punitario'], 'required'],
            [['cantidad', 'descuento', 'iva', 'punitario'], 'number'],
            [['idproducto', 'idordencompra', 'idefiscal', 'idordenservicio'], 'integer'],
            [['garantia'], 'string', 'max' => 200],
            [['idordencompra', 'idproducto', 'idefiscal'], 'unique', 'targetAttribute' => ['idordencompra', 'idproducto', 'idefiscal'], 'message' => 'The combination of Idproducto, Idordencompra and Idefiscal has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idordencompradetalle' => Yii::t('app', 'Idordencompradetalle'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'descuento' => Yii::t('app', 'Descuento'),
            'iva' => Yii::t('app', 'Iva'),
            'punitario' => Yii::t('app', 'Punitario'),
            'idproducto' => Yii::t('app', 'Idproducto'),
            'idordencompra' => Yii::t('app', 'Idordencompra'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'idordenservicio' => Yii::t('app', 'Idordenservicio'),
            'garantia' => Yii::t('app', 'Garantia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproducto0()
    {
        return $this->hasOne(Producto::className(), ['idproducto' => 'idproducto']);
    }
}
