<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.bien_atributo".
 *
 * @property integer $id
 * @property integer $id_codigo
 * @property integer $id_localidad
 *
 * @property BienesAtributo $id0
 * @property BienesNCodigoBien $idCodigo
 */
class BienesBienAtributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.bien_atributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_codigo', 'id_localidad'], 'required'],
            [['id', 'id_codigo', 'id_localidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_codigo' => Yii::t('app', 'Id Codigo'),
            'id_localidad' => Yii::t('app', 'Id Localidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(BienesAtributo::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigo()
    {
        return $this->hasOne(BienesNCodigoBien::className(), ['id_codigo' => 'id_codigo', 'id_direccion' => 'id_localidad']);
    }
}
