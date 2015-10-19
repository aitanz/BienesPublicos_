<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "ordencompra".
 *
 * @property integer $idordencompra
 * @property integer $status
 * @property string $fecha
 * @property string $observaciones
 * @property integer $tipo
 * @property string $concepto
 * @property boolean $escredito
 * @property integer $numcontrol
 * @property integer $idefiscal
 * @property string $monto
 * @property string $montoiva
 * @property integer $idproveedor
 * @property integer $reversado
 * @property string $motivo
 * @property integer $idcordinacion
 * @property integer $idusuario_crea
 * @property string $fecha_crea
 * @property string $fecha_reverso
 * @property integer $idusuario_reversa
 * @property string $hora_crea
 * @property string $horareverso
 * @property integer $idordenservicio
 * @property integer $reqrequisicion
 * @property integer $reqinvitacion
 * @property integer $reqinforme
 * @property integer $reqpresupuesto
 * @property integer $cantpresupuesto
 * @property integer $cantcarta
 * @property integer $reqcarta
 * @property integer $proyecto
 * @property string $descripcionproyecto
 * @property string $tentrega
 * @property string $observacion
 * @property integer $id_odc
 *
 * @property Efiscal $idefiscal0
 * @property Proveedor $idproveedor0
 * @property Coordinacion $idcordinacion0
 */
class OrdenCompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordencompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'fecha', 'tipo', 'concepto', 'numcontrol', 'idefiscal'], 'required'],
            [['status', 'tipo', 'numcontrol', 'idefiscal', 'idproveedor', 'reversado', 'idcordinacion', 'idusuario_crea', 'idusuario_reversa', 'reqrequisicion', 'reqinvitacion', 'reqinforme', 'reqpresupuesto', 'cantpresupuesto', 'cantcarta', 'reqcarta', 'proyecto'], 'integer'],
            [['fecha', 'fecha_crea', 'fecha_reverso'], 'safe'],
            [['escredito'], 'boolean'],
            [['monto', 'montoiva'], 'number'],
            [['observaciones'], 'string', 'max' => 255],
            [['concepto', 'observacion'], 'string', 'max' => 800],
            [['motivo'], 'string', 'max' => 5000],
            [['hora_crea', 'horareverso'], 'string', 'max' => 15],
            [['descripcionproyecto'], 'string', 'max' => 80000],
            [['tentrega'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idordencompra' => Yii::t('app', 'SOLICITUD ORDEN DE COMPRA NÚMERO'),
            'status' => Yii::t('app', 'Status'),
            'fecha' => Yii::t('app', 'FECHA DE SOLICITUD'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'tipo' => Yii::t('app', 'Tipo'),
            'concepto' => Yii::t('app', 'Concepto'),
            'escredito' => Yii::t('app', 'Escredito'),
            'numcontrol' => Yii::t('app', 'Numcontrol'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'monto' => Yii::t('app', 'Monto'),
            'montoiva' => Yii::t('app', 'Montoiva'),
            'idproveedor' => Yii::t('app', 'Idproveedor'),
            'reversado' => Yii::t('app', 'Reversado'),
            'motivo' => Yii::t('app', 'Motivo'),
            'idcordinacion' => Yii::t('app', 'Idcordinacion'),
            'idusuario_crea' => Yii::t('app', 'Idusuario Crea'),
            'fecha_crea' => Yii::t('app', 'Fecha Crea'),
            'fecha_reverso' => Yii::t('app', 'Fecha Reverso'),
            'idusuario_reversa' => Yii::t('app', 'Idusuario Reversa'),
            'hora_crea' => Yii::t('app', 'Hora Crea'),
            'horareverso' => Yii::t('app', 'Horareverso'),
            'idordenservicio' => Yii::t('app', 'Idordenservicio'),
            'reqrequisicion' => Yii::t('app', 'Reqrequisicion'),
            'reqinvitacion' => Yii::t('app', 'Reqinvitacion'),
            'reqinforme' => Yii::t('app', 'Reqinforme'),
            'reqpresupuesto' => Yii::t('app', 'Reqpresupuesto'),
            'cantpresupuesto' => Yii::t('app', 'Cantpresupuesto'),
            'cantcarta' => Yii::t('app', 'Cantcarta'),
            'reqcarta' => Yii::t('app', 'Reqcarta'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'descripcionproyecto' => Yii::t('app', 'Descripcionproyecto'),
            'tentrega' => Yii::t('app', 'Tentrega'),
            'observacion' => Yii::t('app', 'Observacion'),
            'id_odc' => Yii::t('app', 'Id Odc'),
        ];
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
    public function getIdcordinacion0()
    {
        return $this->hasOne(Coordinacion::className(), ['idcoordinacion' => 'idcordinacion']);
    }
}
