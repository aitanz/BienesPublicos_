<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.seguros".
 *
 * @property integer $id_seguro
 * @property string $denominacion
 */
class BienesSeguros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.seguros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_seguro'], 'required'],
            [['id_seguro'], 'integer'],
            [['denominacion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_seguro' => Yii::t('app', 'Id Seguro'),
            'denominacion' => Yii::t('app', 'Denominacion'),
        ];
    }
}
