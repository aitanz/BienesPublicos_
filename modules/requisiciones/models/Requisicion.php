<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "requisicion".
 *
 * @property integer $idrequisicion
 * @property integer $status
 * @property string $fecha
 * @property string $observaciones
 * @property integer $tipo
 * @property string $concepto
 * @property integer $numcontrol
 * @property integer $idefiscal
 * @property integer $idtipoproducto
 * @property integer $idcoordinacion
 * @property integer $idtipopago
 * @property integer $statusinformatica
 * @property integer $statusadmin
 * @property string $fechainformatica
 * @property string $fechaadmin
 * @property string $motivorechazo
 * @property string $bitacora
 * @property integer $idusuario
 * @property string $dirip
 * @property integer $idproveedor
 * @property string $monto
 * @property integer $idcuenta
 * @property integer $idpuc
 * @property string $puc
 * @property integer $idcategoriaprogramatica
 * @property string $categoriaprogramatica
 * @property string $disponible
 * @property string $auxiliar
 * @property integer $iddireccion
 * @property string $secuencia
 * @property boolean $imputacion
 *
 * @property Efiscal $idefiscal0
 */
class Requisicion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisicion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'tipo', 'numcontrol', 'idefiscal', 'idtipoproducto', 'idcoordinacion', 'idtipopago', 'statusinformatica', 'statusadmin', 'idusuario', 'idproveedor', 'idcuenta', 'idpuc', 'idcategoriaprogramatica', 'iddireccion'], 'integer'],
            [['fecha', 'tipo', 'concepto', 'numcontrol'], 'required'],
            [['fecha', 'fechainformatica', 'fechaadmin', 'bitacora'], 'safe'],
            [['motivorechazo'], 'string'],
            [['monto', 'disponible'], 'number'],
            [['imputacion'], 'boolean'],
            [['observaciones'], 'string', 'max' => 255],
            [['concepto'], 'string', 'max' => 400],
            [['dirip', 'secuencia'], 'string', 'max' => 15],
            [['puc', 'categoriaprogramatica'], 'string', 'max' => 20],
            [['auxiliar'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrequisicion' => Yii::t('app', 'Idrequisicion'),
            'status' => Yii::t('app', 'Status'),
            'fecha' => Yii::t('app', 'Fecha'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'tipo' => Yii::t('app', 'Tipo'),
            'concepto' => Yii::t('app', 'Concepto'),
            'numcontrol' => Yii::t('app', 'Numcontrol'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'idtipoproducto' => Yii::t('app', 'Idtipoproducto'),
            'idcoordinacion' => Yii::t('app', 'Idcoordinacion'),
            'idtipopago' => Yii::t('app', 'Idtipopago'),
            'statusinformatica' => Yii::t('app', 'Statusinformatica'),
            'statusadmin' => Yii::t('app', 'Statusadmin'),
            'fechainformatica' => Yii::t('app', 'Fechainformatica'),
            'fechaadmin' => Yii::t('app', 'Fechaadmin'),
            'motivorechazo' => Yii::t('app', 'Motivorechazo'),
            'bitacora' => Yii::t('app', 'Bitacora'),
            'idusuario' => Yii::t('app', 'Idusuario'),
            'dirip' => Yii::t('app', 'Dirip'),
            'idproveedor' => Yii::t('app', 'Idproveedor'),
            'monto' => Yii::t('app', 'Monto'),
            'idcuenta' => Yii::t('app', 'Idcuenta'),
            'idpuc' => Yii::t('app', 'Idpuc'),
            'puc' => Yii::t('app', 'Puc'),
            'idcategoriaprogramatica' => Yii::t('app', 'Idcategoriaprogramatica'),
            'categoriaprogramatica' => Yii::t('app', 'Categoriaprogramatica'),
            'disponible' => Yii::t('app', 'Disponible'),
            'auxiliar' => Yii::t('app', 'Auxiliar'),
            'iddireccion' => Yii::t('app', 'Iddireccion'),
            'secuencia' => Yii::t('app', 'Secuencia'),
            'imputacion' => Yii::t('app', 'Imputacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }
}
