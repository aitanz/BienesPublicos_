<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.tipo_localidad_bien".
 *
 * @property integer $id_tipo_localidad
 * @property string $descripcion
 *
 * @property BienesLocalidad[] $bienesLocalidads
 */
class BienesTipoLocalidadBien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.tipo_localidad_bien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_localidad' => Yii::t('app', 'Id Tipo Localidad'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesLocalidads()
    {
        return $this->hasMany(BienesLocalidad::className(), ['id_tipo_localidad' => 'id_tipo_localidad']);
    }
}
