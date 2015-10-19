<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.atributo".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $tipo
 *
 * @property BienesBienAtributo[] $bienesBienAtributos
 * @property BienesValoresAtributos $bienesValoresAtributos
 */
class BienesAtributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.atributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'descripcion', 'tipo'], 'required'],
            [['id'], 'integer'],
            [['descripcion', 'tipo'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesBienAtributos()
    {
        return $this->hasMany(BienesBienAtributo::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesValoresAtributos()
    {
        return $this->hasOne(BienesValoresAtributos::className(), ['id' => 'id']);
    }
}
