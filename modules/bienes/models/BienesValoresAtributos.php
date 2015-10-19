<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.valores_atributos".
 *
 * @property integer $id
 * @property string $valor
 *
 * @property BienesAtributo $id0
 */
class BienesValoresAtributos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.valores_atributos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'valor'], 'required'],
            [['id'], 'integer'],
            [['valor'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'valor' => Yii::t('app', 'Valor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(BienesAtributo::className(), ['id' => 'id']);
    }
}
