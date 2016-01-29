<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.estado_bien".
 *
 * @property integer $id_estado_bien
 * @property string $descripcion
 */
class BienesEstadoBien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.estado_bien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado_bien'], 'required'],
            [['id_estado_bien'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado_bien' => Yii::t('app', 'Id Estado Bien'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
