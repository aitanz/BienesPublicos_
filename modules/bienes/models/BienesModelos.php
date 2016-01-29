<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.modelos".
 *
 * @property integer $id_modelo
 * @property string $descripcion
 * @property integer $id_marca
 *
 * @property BienesMarcas $idMarca
 */
class BienesModelos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.modelos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_modelo'], 'required'],
            [['id_modelo', 'id_marca'], 'integer'],
            [['descripcion'], 'string'],
             [['id_modelo'], 'unique','message'=>'Ya Existe un Registro con este Id'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_modelo' => Yii::t('app', 'Id Modelo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_marca' => Yii::t('app', 'Id Marca'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca()
    {
        return $this->hasOne(BienesMarcas::className(), ['id_marca' => 'id_marca']);
    }
}
