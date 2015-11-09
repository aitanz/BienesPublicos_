<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.localidad".
 *
 * @property integer $id_localidad
 * @property integer $codigo_localidad
 * @property string $nombre
 * @property integer $padre
 * @property integer $codigo_completo
 * @property integer $id_tipo_localidad
 *
 * @property BienesTipoLocalidadBien $idTipoLocalidad
 */
class BienesLocalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.localidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_localidad', 'nombre', 'id_tipo_localidad'], 'required'],
            [['codigo_localidad', 'padre', 'codigo_completo', 'id_tipo_localidad'], 'integer'],
            [['codigo_localidad'], 'unique', 'message'=>'Ya Existe un Registro con este Id'],
            [['nombre'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_localidad' => Yii::t('app', 'Id Localidad'),
            'codigo_localidad' => Yii::t('app', 'Codigo Localidad'),
            'nombre' => Yii::t('app', 'Nombre'),
            'padre' => Yii::t('app', 'Padre'),
            'codigo_completo' => Yii::t('app', 'Codigo Completo'),
            'id_tipo_localidad' => Yii::t('app', 'Id Tipo Localidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoLocalidad()
    {
        return $this->hasOne(BienesTipoLocalidadBien::className(), ['id_tipo_localidad' => 'id_tipo_localidad']);
    }
}
