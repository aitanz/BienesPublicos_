<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.sede".
 *
 * @property integer $id_sede
 * @property string $nombre
 * @property integer $id_localidad
 */
class BienesSede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sede'], 'required'],
            [['id_sede', 'id_localidad'], 'integer'],
            [['nombre'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sede' => Yii::t('app', 'Id Sede'),
            'nombre' => Yii::t('app', 'Nombre'),
            'id_localidad' => Yii::t('app', 'Id Localidad'),
        ];
    }
}
