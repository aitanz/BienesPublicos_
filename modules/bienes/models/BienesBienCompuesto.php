<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.bien_compuesto".
 *
 * @property integer $id_codigo
 * @property integer $id_localidad
 *
 * @property BienesNCodigoBien $idCodigo
 */
class BienesBienCompuesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.bien_compuesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'id_localidad'], 'required'],
            [['id_codigo', 'id_localidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => Yii::t('app', 'Id Codigo'),
            'id_localidad' => Yii::t('app', 'Id Localidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigo()
    {
        return $this->hasOne(BienesNCodigoBien::className(), ['id_codigo' => 'id_codigo', 'id_localidad' => 'id_localidad']);
    }
}
