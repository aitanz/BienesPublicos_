<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "ajuste".
 *
 * @property integer $id_ajuste
 * @property integer $id_tipo_ajuste
 * @property string $fecha_ajuste
 * @property string $concepto
 * @property integer $id_usuario_crea
 * @property integer $idefiscal
 * @property string $fecha_reverso_ajuste
 * @property integer $id_usuario_reversa
 * @property boolean $reversado
 * @property string $observacion
 *
 * @property Movimientoporajuste[] $movimientoporajustes
 * @property Tipoajuste $idTipoAjuste
 * @property Usuario $idUsuarioCrea
 * @property Usuario $idUsuarioReversa
 * @property Efiscal $idefiscal0
 */
class Ajustes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ajuste';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_ajuste', 'fecha_ajuste', 'id_usuario_crea', 'idefiscal'], 'required'],
            [['id_tipo_ajuste', 'id_usuario_crea', 'idefiscal', 'id_usuario_reversa'], 'integer'],
            [['fecha_ajuste', 'fecha_reverso_ajuste'], 'safe'],
            [['reversado'], 'boolean'],
            [['concepto', 'observacion'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ajuste' => Yii::t('app', 'Id Ajuste'),
            'id_tipo_ajuste' => Yii::t('app', 'Id Tipo Ajuste'),
            'fecha_ajuste' => Yii::t('app', 'Fecha Ajuste'),
            'concepto' => Yii::t('app', 'Concepto'),
            'id_usuario_crea' => Yii::t('app', 'Id Usuario Crea'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'fecha_reverso_ajuste' => Yii::t('app', 'Fecha Reverso Ajuste'),
            'id_usuario_reversa' => Yii::t('app', 'Id Usuario Reversa'),
            'reversado' => Yii::t('app', 'Reversado'),
            'observacion' => Yii::t('app', 'Observacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientoporajustes()
    {
        return $this->hasMany(Movimientoporajuste::className(), ['id_ajuste' => 'id_ajuste']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoAjuste()
    {
        return $this->hasOne(Tipoajuste::className(), ['id_tipo_ajuste' => 'id_tipo_ajuste']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarioCrea()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario_crea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarioReversa()
    {
        return $this->hasOne(Usuario::className(), ['idusuario' => 'id_usuario_reversa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }
}
