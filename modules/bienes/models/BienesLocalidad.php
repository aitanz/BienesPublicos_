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
 * @property BienesNCodigoBien[] $bienesNCodigoBiens
 * @property BienesCodigo[] $idCodigos
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesNCodigoBiens()
    {
        return $this->hasMany(BienesNCodigoBien::className(), ['id_localidad' => 'id_localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigos()
    {
        return $this->hasMany(BienesCodigo::className(), ['id_codigo' => 'id_codigo'])->viaTable('n_codigo_bien', ['id_localidad' => 'id_localidad']);
    }
}
