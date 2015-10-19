<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "tipoajuste".
 *
 * @property integer $id_tipo_ajuste
 * @property integer $tipo_ajuste
 *
 * @property Ajuste[] $ajustes
 */
class Tipoajuste extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoajuste';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_ajuste'], 'required'],
            [['tipo_ajuste'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_ajuste' => Yii::t('app', 'Id Tipo Ajuste'),
            'tipo_ajuste' => Yii::t('app', 'Tipo Ajuste'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAjustes()
    {
        return $this->hasMany(Ajuste::className(), ['id_tipo_modificacion' => 'id_tipo_ajuste']);
    }
}
