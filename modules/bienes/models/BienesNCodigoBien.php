<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.n_codigo_bien".
 *
 * @property integer $id_codigo
 * @property integer $id_direccion
 * @property integer $identificacion
 * @property string $descripcion
 * @property string $valor_unidad
 * @property string $justiprecio
 * @property string $ano_adquisicion
 * @property string $ubicacion
 * @property string $tipo_adquisicion
 * @property string $n_documento
 * @property integer $id_sede
 * @property integer $id_usuario
 *
 * @property BienesBienAtributo[] $bienesBienAtributos
 * @property BienesBienCompuesto $bienesBienCompuesto
 * @property BienesCodigo $idCodigo
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
    
    public $categoria;
    public $sub_categoria;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'id_direccion', 'identificacion', 'descripcion', 'ano_adquisicion', 'ubicacion'], 'required'],
            [['id_codigo', 'id_direccion', 'identificacion', 'id_sede', 'id_usuario'], 'integer'],
            [['descripcion', 'ubicacion', 'tipo_adquisicion', 'n_documento'], 'string'],
            [['valor_unidad', 'justiprecio'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['ano_adquisicion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => Yii::t('app', 'Id Codigo'),
            'id_direccion' => Yii::t('app', 'Id Direccion'),
            'identificacion' => Yii::t('app', 'Identificacion'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'valor_unidad' => Yii::t('app', 'Valor Unidad'),
            'justiprecio' => Yii::t('app', 'Justiprecio'),
            'ano_adquisicion' => Yii::t('app', 'Ano Adquisicion'),
            'ubicacion' => Yii::t('app', 'Ubicacion'),
            'tipo_adquisicion' => Yii::t('app', 'Tipo Adquisicion'),
            'n_documento' => Yii::t('app', 'N Documento'),
            'id_sede' => Yii::t('app', 'Id Sede'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesBienAtributos()
    {
        return $this->hasMany(BienesBienAtributo::className(), ['id_codigo' => 'id_codigo', 'id_localidad' => 'id_direccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesBienCompuesto()
    {
        return $this->hasOne(BienesBienCompuesto::className(), ['id_codigo' => 'id_codigo', 'id_localidad' => 'id_direccion']);
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
    public function getIdDireccion()
    {
        return $this->hasOne(\app\modules\admin\models\SeguridadUsuarios::className(), ['id_direccion' => 'id_direccion']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->valor_unidad = str_replace(",", ".", $this->valor_unidad);
            $this->justiprecio = str_replace(",", ".", $this->justiprecio);
            return true;
        } else {
            return false;
        }
    }
}

