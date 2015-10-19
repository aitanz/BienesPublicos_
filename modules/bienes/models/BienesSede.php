<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.sede".
 *
 * @property integer $id_sede
 * @property string $descripcion
 * @property integer $id_localidad
 *
 * @property BienesNCodigoBien[] $bienesNCodigoBiens
 * @property Localidad $idLocalidad
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
            [['id_localidad'], 'integer'],
            [['descripcion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sede' => Yii::t('app', 'Id Sede'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_localidad' => Yii::t('app', 'Id Localidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesNCodigoBiens()
    {
        return $this->hasMany(BienesNCodigoBien::className(), ['id_sede' => 'id_sede']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalidad()
    {
        return $this->hasOne(Localidad::className(), ['id_localidad' => 'id_localidad']);
    }
}
