<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "compromiso".
 *
 * @property integer $idcompromiso
 * @property integer $tipo
 * @property integer $referencia
 * @property string $fecha
 * @property integer $idproveedor
 * @property integer $idcoordinacion
 * @property integer $idefiscal
 * @property string $concepto
 * @property string $observacion
 * @property integer $reversado
 * @property string $montocompromiso
 * @property integer $ubicacion
 * @property integer $status
 * @property string $montoiva
 * @property string $fechafactura
 * @property string $nrofactura
 * @property string $nrocontrol
 * @property integer $idusuario_crea
 * @property string $fecha_crea
 * @property string $fecha_reverso
 * @property integer $idusuario_reversa
 * @property string $hora_crea
 * @property string $horareverso
 * @property integer $idtipopago
 *
 * @property Coordinacion $idcoordinacion0
 * @property Efiscal $idefiscal0
 * @property Proveedor $idproveedor0
 * @property Status $ubicacion0
 */
class Compromiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compromiso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'idproveedor', 'idcoordinacion', 'idefiscal'], 'required'],
            [['tipo', 'referencia', 'idproveedor', 'idcoordinacion', 'idefiscal', 'reversado', 'ubicacion', 'status', 'idusuario_crea', 'idusuario_reversa', 'idtipopago'], 'integer'],
            [['fecha', 'fechafactura', 'fecha_crea', 'fecha_reverso'], 'safe'],
            [['montocompromiso', 'montoiva'], 'number'],
            [['concepto', 'observacion'], 'string', 'max' => 1000],
            [['nrofactura', 'nrocontrol'], 'string', 'max' => 25],
            [['hora_crea', 'horareverso'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcompromiso' => Yii::t('app', 'Idcompromiso'),
            'tipo' => Yii::t('app', 'Tipo'),
            'referencia' => Yii::t('app', 'Referencia'),
            'fecha' => Yii::t('app', 'Fecha'),
            'idproveedor' => Yii::t('app', 'Idproveedor'),
            'idcoordinacion' => Yii::t('app', 'Idcoordinacion'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'concepto' => Yii::t('app', 'Concepto'),
            'observacion' => Yii::t('app', 'Observacion'),
            'reversado' => Yii::t('app', 'Reversado'),
            'montocompromiso' => Yii::t('app', 'Montocompromiso'),
            'ubicacion' => Yii::t('app', 'Ubicacion'),
            'status' => Yii::t('app', 'Status'),
            'montoiva' => Yii::t('app', 'Montoiva'),
            'fechafactura' => Yii::t('app', 'Fechafactura'),
            'nrofactura' => Yii::t('app', 'Nrofactura'),
            'nrocontrol' => Yii::t('app', 'Nrocontrol'),
            'idusuario_crea' => Yii::t('app', 'Idusuario Crea'),
            'fecha_crea' => Yii::t('app', 'Fecha Crea'),
            'fecha_reverso' => Yii::t('app', 'Fecha Reverso'),
            'idusuario_reversa' => Yii::t('app', 'Idusuario Reversa'),
            'hora_crea' => Yii::t('app', 'Hora Crea'),
            'horareverso' => Yii::t('app', 'Horareverso'),
            'idtipopago' => Yii::t('app', 'Idtipopago'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcoordinacion0()
    {
        return $this->hasOne(Coordinacion::className(), ['idcoordinacion' => 'idcoordinacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproveedor0()
    {
        return $this->hasOne(Proveedor::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUbicacion0()
    {
        return $this->hasOne(Status::className(), ['idstatus' => 'ubicacion']);
    }
}
