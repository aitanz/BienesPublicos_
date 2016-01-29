<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.color".
 *
 * @property integer $id_color
 * @property string $descripcion
 */
class BienesColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_color'], 'required'],
            [['id_color'], 'integer'],
            [['descripcion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_color' => Yii::t('app', 'Id Color'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
