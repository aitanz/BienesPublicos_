<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.n_codigo_bien".
 *
 * @property integer $id_codigo
 * @property integer $id_localidad
 * @property integer $identificacion
 * @property string $nombre
 * @property string $descripcion
 * @property string $valor_unidad
 * @property string $justiprecio
 * @property string $ano_adquisicion
 * @property string $ubicacion
 * @property string $tipo_adquisicion
 * @property string $n_documento
 *
 * @property BienesBienAtributo[] $bienesBienAtributos
 * @property BienesBienCompuesto $bienesBienCompuesto
 * @property BienesCodigo $idCodigo
 * @property BienesLocalidad $idLocalidad
 */
class BienesNCodigoBien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.n_codigo_bien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'id_localidad', 'identificacion', 'nombre', 'descripcion', 'valor_unidad', 'justiprecio', 'ano_adquisicion', 'ubicacion', 'tipo_adquisicion', 'n_documento'], 'required'],
            [['id_codigo', 'id_localidad', 'identificacion'], 'integer'],
            [['nombre', 'descripcion', 'ubicacion', 'tipo_adquisicion', 'n_documento'], 'string'],
            [['valor_unidad', 'justiprecio'], 'number'],
            [['ano_adquisicion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => Yii::t('app', 'Categoría'),
            'id_localidad' => Yii::t('app', 'Localidad'),
            'identificacion' => Yii::t('app', 'Identificador'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'valor_unidad' => Yii::t('app', 'Valor Unidad'),
            'justiprecio' => Yii::t('app', 'Justiprecio'),
            'ano_adquisicion' => Yii::t('app', 'Año Adquisicion'),
            'ubicacion' => Yii::t('app', 'Ubicacion'),
            'tipo_adquisicion' => Yii::t('app', 'Tipo Adquisicion'),
            'n_documento' => Yii::t('app', 'N Documento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesBienAtributos()
    {
        return $this->hasMany(BienesBienAtributo::className(), ['id_codigo' => 'id_codigo', 'id_localidad' => 'id_localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesBienCompuesto()
    {
        return $this->hasOne(BienesBienCompuesto::className(), ['id_codigo' => 'id_codigo', 'id_localidad' => 'id_localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigo()
    {
        return $this->hasOne(BienesCodigo::className(), ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalidad()
    {
        return $this->hasOne(BienesLocalidad::className(), ['id_localidad' => 'id_localidad']);
    }
}
