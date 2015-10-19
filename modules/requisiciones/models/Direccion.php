<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property integer $iddireccion
 * @property string $nombre
 * @property string $funciones
 * @property integer $encargado
 * @property integer $idefiscal
 * @property string $sufijo
 *
 * @property Coordinacion[] $coordinacions
 * @property Efiscal $idefiscal0
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'funciones', 'encargado', 'idefiscal'], 'required'],
            [['encargado', 'idefiscal'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['funciones'], 'string', 'max' => 255],
            [['sufijo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddireccion' => Yii::t('app', 'Iddireccion'),
            'nombre' => Yii::t('app', 'Nombre'),
            'funciones' => Yii::t('app', 'Funciones'),
            'encargado' => Yii::t('app', 'Encargado'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'sufijo' => Yii::t('app', 'Sufijo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordinacions()
    {
        return $this->hasMany(Coordinacion::className(), ['iddireccion' => 'iddireccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }
}
