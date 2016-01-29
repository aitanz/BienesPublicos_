<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.uso".
 *
 * @property integer $id_uso
 * @property string $descripcion
 */
class BienesUso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.uso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_uso', 'descripcion'], 'required'],
            [['id_uso'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_uso' => Yii::t('app', 'Id Uso'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
