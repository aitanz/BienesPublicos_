<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "tipopagos".
 *
 * @property integer $idtipopago
 * @property string $descripcion
 * @property boolean $compromiso
 * @property boolean $administrativa
 * @property boolean $servicio
 * @property integer $idpuc
 * @property string $puc
 * @property boolean $imputacion
 */
class Tipopagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipopagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['compromiso', 'administrativa', 'servicio', 'imputacion'], 'boolean'],
            [['idpuc'], 'integer'],
            [['descripcion'], 'string', 'max' => 120],
            [['puc'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipopago' => Yii::t('app', 'Idtipopago'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'compromiso' => Yii::t('app', 'Compromiso'),
            'administrativa' => Yii::t('app', 'Administrativa'),
            'servicio' => Yii::t('app', 'Servicio'),
            'idpuc' => Yii::t('app', 'Idpuc'),
            'puc' => Yii::t('app', 'Puc'),
            'imputacion' => Yii::t('app', 'Imputacion'),
        ];
    }
}
