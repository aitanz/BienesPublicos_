<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "cuentapresupuestaria".
 *
 * @property integer $idcuenta
 * @property string $auxiliar
 * @property string $causado
 * @property string $comprometido
 * @property string $descripcionaux
 * @property string $disponibilidad
 * @property boolean $espadre
 * @property string $pagado
 * @property string $aumentado
 * @property string $disminuido
 * @property string $precomprometido
 * @property string $sectorgeog
 * @property integer $statusaprobacion
 * @property integer $tipopartida
 * @property string $montoinicial
 * @property integer $idcategoriaprogramatica
 * @property integer $idpuc
 * @property string $puc
 * @property string $categoria
 * @property integer $tipocuenta
 * @property integer $adicional
 * @property string $montooriginal
 * @property string $observacion
 * @property integer $proyecto
 * @property integer $idrecurso
 * @property string $fechagaceta
 * @property string $extraordinario
 * @property string $gaceta
 * @property integer $idusuario
 * @property integer $idefiscal
 * @property string $corriente
 * @property string $capital
 * @property string $financiera
 * @property integer $inversion
 * @property string $clase
 *
 * @property Categoriaprogramatica $idcategoriaprogramatica0
 * @property Puc $idpuc0
 * @property Movimiento[] $movimientos
 * @property Solicitudpagonominadetalle[] $solicitudpagonominadetalles
 * @property Obra[] $obras
 */
class Cuentapresupuestaria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentapresupuestaria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['causado', 'comprometido', 'disponibilidad', 'pagado', 'precomprometido', 'statusaprobacion', 'tipopartida', 'montoinicial'], 'required'],
            [['causado', 'comprometido', 'disponibilidad', 'pagado', 'aumentado', 'disminuido', 'precomprometido', 'montoinicial', 'montooriginal', 'corriente', 'capital', 'financiera'], 'number'],
            [['espadre'], 'boolean'],
            [['statusaprobacion', 'tipopartida', 'idcategoriaprogramatica', 'idpuc', 'tipocuenta', 'adicional', 'proyecto', 'idrecurso', 'idusuario', 'idefiscal', 'inversion'], 'integer'],
            [['fechagaceta'], 'safe'],
            [['auxiliar'], 'string', 'max' => 6],
            [['descripcionaux', 'observacion', 'extraordinario', 'gaceta'], 'string', 'max' => 500],
            [['sectorgeog'], 'string', 'max' => 255],
            [['puc', 'categoria'], 'string', 'max' => 20],
            [['clase'], 'string', 'max' => 2],
            [['idpuc', 'idcategoriaprogramatica', 'auxiliar'], 'unique', 'targetAttribute' => ['idpuc', 'idcategoriaprogramatica', 'auxiliar'], 'message' => 'The combination of Auxiliar, Idcategoriaprogramatica and Idpuc has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcuenta' => Yii::t('app', 'Idcuenta'),
            'auxiliar' => Yii::t('app', 'Auxiliar'),
            'causado' => Yii::t('app', 'Causado'),
            'comprometido' => Yii::t('app', 'Comprometido'),
            'descripcionaux' => Yii::t('app', 'Descripcionaux'),
            'disponibilidad' => Yii::t('app', 'Disponibilidad'),
            'espadre' => Yii::t('app', 'Espadre'),
            'pagado' => Yii::t('app', 'Pagado'),
            'aumentado' => Yii::t('app', 'Aumentado'),
            'disminuido' => Yii::t('app', 'Disminuido'),
            'precomprometido' => Yii::t('app', 'Precomprometido'),
            'sectorgeog' => Yii::t('app', 'Sectorgeog'),
            'statusaprobacion' => Yii::t('app', 'Statusaprobacion'),
            'tipopartida' => Yii::t('app', 'Tipopartida'),
            'montoinicial' => Yii::t('app', 'Montoinicial'),
            'idcategoriaprogramatica' => Yii::t('app', 'Idcategoriaprogramatica'),
            'idpuc' => Yii::t('app', 'Idpuc'),
            'puc' => Yii::t('app', 'Puc'),
            'categoria' => Yii::t('app', 'Categoria'),
            'tipocuenta' => Yii::t('app', 'Tipocuenta'),
            'adicional' => Yii::t('app', 'Adicional'),
            'montooriginal' => Yii::t('app', 'Montooriginal'),
            'observacion' => Yii::t('app', 'Observacion'),
            'proyecto' => Yii::t('app', 'Proyecto'),
            'idrecurso' => Yii::t('app', 'Idrecurso'),
            'fechagaceta' => Yii::t('app', 'Fechagaceta'),
            'extraordinario' => Yii::t('app', 'Extraordinario'),
            'gaceta' => Yii::t('app', 'Gaceta'),
            'idusuario' => Yii::t('app', 'Idusuario'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'corriente' => Yii::t('app', 'Corriente'),
            'capital' => Yii::t('app', 'Capital'),
            'financiera' => Yii::t('app', 'Financiera'),
            'inversion' => Yii::t('app', 'Inversion'),
            'clase' => Yii::t('app', 'Clase'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategoriaprogramatica0()
    {
        return $this->hasOne(Categoriaprogramatica::className(), ['idcategoriaprogramatica' => 'idcategoriaprogramatica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpuc0()
    {
        return $this->hasOne(Puc::className(), ['idpuc' => 'idpuc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['idcuenta' => 'idcuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudpagonominadetalles()
    {
        return $this->hasMany(Solicitudpagonominadetalle::className(), ['idcuenta' => 'idcuenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObras()
    {
        return $this->hasMany(Obra::className(), ['idcuenta' => 'idcuenta']);
    }
}
