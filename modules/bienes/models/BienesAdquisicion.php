<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.adquisicion".
 *
 * @property integer $id_adquisicion
 * @property string $descripcion
 */
class BienesAdquisicion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.adquisicion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_adquisicion'], 'required'],
            [['id_adquisicion'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_adquisicion' => Yii::t('app', 'Id Adquisicion'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
