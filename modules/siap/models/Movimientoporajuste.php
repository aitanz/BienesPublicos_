<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "movimientoporajuste".
 *
 * @property integer $id_documento
 * @property integer $tipomovimiento
 * @property integer $id_ajuste
 * @property integer $idefiscal
 *
 * @property Efiscal $idefiscal0
 * @property Tipomovimiento $tipomovimiento0
 * @property Ajuste $idAjuste
 */
class Movimientoporajuste extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimientoporajuste';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_documento', 'tipomovimiento', 'id_ajuste', 'idefiscal'], 'required'],
            [['id_documento', 'tipomovimiento', 'id_ajuste', 'idefiscal'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_documento' => Yii::t('app', 'Id Documento'),
            'tipomovimiento' => Yii::t('app', 'Tipomovimiento'),
            'id_ajuste' => Yii::t('app', 'Id Ajuste'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipomovimiento0()
    {
        return $this->hasOne(Tipomovimiento::className(), ['idtipomovimiento' => 'tipomovimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAjuste()
    {
        return $this->hasOne(Ajuste::className(), ['id_ajuste' => 'id_ajuste']);
    }
}
