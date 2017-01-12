<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.sede".
 *
 * @property integer $id_sede
 * @property string $nombre
 * @property integer $id_localidad
 * @property integer $tipo_sede
 * @property string $tipo_sede_esp
 * @property string $descripcion
 * @property integer $codigo_pais
 * @property string $otro_pais
 * @property string $urbanizacion
 * @property string $calle
 * @property string $casa_edif
 * @property string $piso
 */
class BienesSede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre','id_sede','tipo_sede','urbanizacion','calle','casa_edif','id_localidad'], 'required'],
            [['id_sede', 'id_localidad', 'tipo_sede', 'codigo_pais'], 'integer'],
            [['nombre', 'otro_pais', 'calle'], 'string'],
            [['tipo_sede_esp', 'descripcion', 'urbanizacion'], 'string', 'max' => 100],
            [['casa_edif', 'piso'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sede' => Yii::t('app', 'Id Sede'),
            'nombre' => Yii::t('app', 'Nombre'),
            'id_localidad' => Yii::t('app', 'Id Localidad'),
            'tipo_sede' => Yii::t('app', 'Tipo Sede'),
            'tipo_sede_esp' => Yii::t('app', 'Tipo Sede Esp'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'codigo_pais' => Yii::t('app', 'Codigo Pais'),
            'otro_pais' => Yii::t('app', 'Otro Pais'),
            'urbanizacion' => Yii::t('app', 'Urbanizacion'),
            'calle' => Yii::t('app', 'Calle'),
            'casa_edif' => Yii::t('app', 'Casa Edif'),
            'piso' => Yii::t('app', 'Piso'),
        ];
    }
}
