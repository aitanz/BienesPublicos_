<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "unidadmedida".
 *
 * @property integer $idunidadmedida
 * @property string $descripcion
 */
class Unidadmedida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidadmedida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idunidadmedida' => Yii::t('app', 'Idunidadmedida'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
