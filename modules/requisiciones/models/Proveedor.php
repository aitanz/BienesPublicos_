<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $idproveedor
 * @property string $razonsocial
 * @property integer $denominacioncomercial
 * @property string $direccion
 * @property string $ciudad
 * @property string $rif
 * @property string $nit
 * @property string $telefono
 * @property integer $responsable
 * @property string $actprincipal
 * @property string $fechaincripcion
 * @property string $retencionislr
 * @property string $cappagado
 * @property string $capsubsc
 * @property integer $tipocontribnac
 * @property string $status
 * @property boolean $rbalance
 * @property boolean $rccirl
 * @property boolean $rcnit
 * @property boolean $rcrif
 * @property boolean $rdislr
 * @property boolean $restresult
 * @property boolean $rregcomercio
 * @property boolean $rregivss
 * @property boolean $rregince
 * @property boolean $rsolvince
 * @property boolean $rsolvlaboral
 * @property boolean $rsolvindcomercio
 * @property boolean $exentoiva
 * @property boolean $fondotercero
 * @property string $oficinaregistro
 * @property string $fecharegistro
 * @property string $protocolo
 * @property string $tomo
 * @property string $folio
 * @property string $numero
 * @property string $tipo
 * @property string $codigo
 * @property string $fecrequi1
 * @property string $fecrequi2
 * @property string $fecrequi3
 * @property string $fecrequi4
 * @property string $fecrequi5
 * @property string $fecrequi6
 * @property string $fecrequi7
 * @property string $fecrequi8
 * @property string $fecrequi9
 * @property string $fecrequi10
 * @property string $fecrequi11
 * @property string $codanterior
 * @property string $numrnc
 * @property string $numgob
 *
 * @property Compromiso[] $compromisos
 * @property Compromisohist[] $compromisohists
 * @property Obraasignada[] $obraasignadas
 * @property Ordencompra[] $ordencompras
 * @property Ordenpago[] $ordenpagos
 * @property Productoxproveedor[] $productoxproveedors
 * @property Producto[] $idproductos
 * @property Ciudad $ciudad0
 * @property Denominacioncomercial $denominacioncomercial0
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razonsocial', 'direccion', 'rif', 'telefono', 'actprincipal', 'fechaincripcion', 'tipocontribnac', 'status'], 'required'],
            [['denominacioncomercial', 'responsable', 'tipocontribnac'], 'integer'],
            [['fechaincripcion', 'fecharegistro', 'fecrequi1', 'fecrequi2', 'fecrequi3', 'fecrequi4', 'fecrequi5', 'fecrequi6', 'fecrequi7', 'fecrequi8', 'fecrequi9', 'fecrequi10', 'fecrequi11'], 'safe'],
            [['retencionislr', 'cappagado', 'capsubsc'], 'number'],
            [['rbalance', 'rccirl', 'rcnit', 'rcrif', 'rdislr', 'restresult', 'rregcomercio', 'rregivss', 'rregince', 'rsolvince', 'rsolvlaboral', 'rsolvindcomercio', 'exentoiva', 'fondotercero'], 'boolean'],
            [['razonsocial'], 'string', 'max' => 600],
            [['direccion'], 'string', 'max' => 255],
            [['ciudad'], 'string', 'max' => 4],
            [['rif'], 'string', 'max' => 13],
            [['nit', 'numero'], 'string', 'max' => 10],
            [['telefono'], 'string', 'max' => 200],
            [['actprincipal'], 'string', 'max' => 120],
            [['status', 'protocolo', 'tomo', 'codigo'], 'string', 'max' => 20],
            [['oficinaregistro'], 'string', 'max' => 100],
            [['folio', 'codanterior'], 'string', 'max' => 30],
            [['tipo'], 'string', 'max' => 1],
            [['numrnc', 'numgob'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproveedor' => Yii::t('app', 'Idproveedor'),
            'razonsocial' => Yii::t('app', 'Razonsocial'),
            'denominacioncomercial' => Yii::t('app', 'Denominacioncomercial'),
            'direccion' => Yii::t('app', 'Direccion'),
            'ciudad' => Yii::t('app', 'Ciudad'),
            'rif' => Yii::t('app', 'Rif'),
            'nit' => Yii::t('app', 'Nit'),
            'telefono' => Yii::t('app', 'Telefono'),
            'responsable' => Yii::t('app', 'Responsable'),
            'actprincipal' => Yii::t('app', 'Actprincipal'),
            'fechaincripcion' => Yii::t('app', 'Fechaincripcion'),
            'retencionislr' => Yii::t('app', 'Retencionislr'),
            'cappagado' => Yii::t('app', 'Cappagado'),
            'capsubsc' => Yii::t('app', 'Capsubsc'),
            'tipocontribnac' => Yii::t('app', 'Tipocontribnac'),
            'status' => Yii::t('app', 'Status'),
            'rbalance' => Yii::t('app', 'Rbalance'),
            'rccirl' => Yii::t('app', 'Rccirl'),
            'rcnit' => Yii::t('app', 'Rcnit'),
            'rcrif' => Yii::t('app', 'Rcrif'),
            'rdislr' => Yii::t('app', 'Rdislr'),
            'restresult' => Yii::t('app', 'Restresult'),
            'rregcomercio' => Yii::t('app', 'Rregcomercio'),
            'rregivss' => Yii::t('app', 'Rregivss'),
            'rregince' => Yii::t('app', 'Rregince'),
            'rsolvince' => Yii::t('app', 'Rsolvince'),
            'rsolvlaboral' => Yii::t('app', 'Rsolvlaboral'),
            'rsolvindcomercio' => Yii::t('app', 'Rsolvindcomercio'),
            'exentoiva' => Yii::t('app', 'Exentoiva'),
            'fondotercero' => Yii::t('app', 'Fondotercero'),
            'oficinaregistro' => Yii::t('app', 'Oficinaregistro'),
            'fecharegistro' => Yii::t('app', 'Fecharegistro'),
            'protocolo' => Yii::t('app', 'Protocolo'),
            'tomo' => Yii::t('app', 'Tomo'),
            'folio' => Yii::t('app', 'Folio'),
            'numero' => Yii::t('app', 'Numero'),
            'tipo' => Yii::t('app', 'Tipo'),
            'codigo' => Yii::t('app', 'Codigo'),
            'fecrequi1' => Yii::t('app', 'Fecrequi1'),
            'fecrequi2' => Yii::t('app', 'Fecrequi2'),
            'fecrequi3' => Yii::t('app', 'Fecrequi3'),
            'fecrequi4' => Yii::t('app', 'Fecrequi4'),
            'fecrequi5' => Yii::t('app', 'Fecrequi5'),
            'fecrequi6' => Yii::t('app', 'Fecrequi6'),
            'fecrequi7' => Yii::t('app', 'Fecrequi7'),
            'fecrequi8' => Yii::t('app', 'Fecrequi8'),
            'fecrequi9' => Yii::t('app', 'Fecrequi9'),
            'fecrequi10' => Yii::t('app', 'Fecrequi10'),
            'fecrequi11' => Yii::t('app', 'Fecrequi11'),
            'codanterior' => Yii::t('app', 'Codanterior'),
            'numrnc' => Yii::t('app', 'Numrnc'),
            'numgob' => Yii::t('app', 'Numgob'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompromisos()
    {
        return $this->hasMany(Compromiso::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompromisohists()
    {
        return $this->hasMany(Compromisohist::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObraasignadas()
    {
        return $this->hasMany(Obraasignada::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenpagos()
    {
        return $this->hasMany(Ordenpago::className(), ['idproveedororden' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoxproveedors()
    {
        return $this->hasMany(Productoxproveedor::className(), ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproductos()
    {
        return $this->hasMany(Producto::className(), ['idproducto' => 'idproducto'])->viaTable('productoxproveedor', ['idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad0()
    {
        return $this->hasOne(Ciudad::className(), ['idciudad' => 'ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDenominacioncomercial0()
    {
        return $this->hasOne(Denominacioncomercial::className(), ['iddenominacioncomercial' => 'denominacioncomercial']);
    }
}
