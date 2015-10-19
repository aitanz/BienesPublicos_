<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "tipomovimiento".
 *
 * @property integer $idtipomovimiento
 * @property string $descripcion
 */
class Tipomovimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipomovimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtipomovimiento', 'descripcion'], 'required'],
            [['idtipomovimiento'], 'integer'],
            [['descripcion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipomovimiento' => Yii::t('app', 'Tipo de Movimiento'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }
}
