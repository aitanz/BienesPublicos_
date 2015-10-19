<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "requisiciondeta".
 *
 * @property integer $idrequisiciondeta
 * @property string $cantidad
 * @property string $descripcion
 * @property integer $idrequisicion
 * @property integer $idunidadmedida
 * @property integer $tipo
 * @property string $monto
 * @property integer $idproducto
 */
class Requisiciondeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisiciondeta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad'], 'required'],
            [['cantidad', 'monto'], 'number'],
            [['idrequisicion', 'idunidadmedida', 'tipo', 'idproducto'], 'integer'],
            [['descripcion'], 'string', 'max' => 500],
            [['idrequisicion', 'descripcion'], 'unique', 'targetAttribute' => ['idrequisicion', 'descripcion'], 'message' => 'The combination of Descripcion and Idrequisicion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrequisiciondeta' => Yii::t('app', 'Idrequisiciondeta'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'idrequisicion' => Yii::t('app', 'Idrequisicion'),
            'idunidadmedida' => Yii::t('app', 'Idunidadmedida'),
            'tipo' => Yii::t('app', 'Tipo'),
            'monto' => Yii::t('app', 'Monto'),
            'idproducto' => Yii::t('app', 'Idproducto'),
        ];
    }
}
