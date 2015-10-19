<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "seguridad.acciones".
 *
 * @property integer $id_accion
 * @property integer $id_controlador
 * @property string $descripcion
 *
 * @property SeguridadAccionGrupo[] $seguridadAccionGrupos
 * @property SeguridadControlador $idControlador
 */
class Acciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguridad.acciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_controlador', 'descripcion'], 'required'],
            [['id_controlador'], 'integer'],
            [['descripcion'], 'string', 'max' => 25],
            [['id_controlador', 'descripcion'], 'unique', 'targetAttribute' => ['id_controlador', 'descripcion'], 'message' => 'The combination of Id Controlador and Descripcion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_accion' => Yii::t('app', 'Id Accion'),
            'id_controlador' => Yii::t('app', 'Id Controlador'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguridadAccionGrupos()
    {
        return $this->hasMany(AccionGrupo::className(), ['id_accion' => 'id_accion', 'id_controlador' => 'id_controlador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdControlador()
    {
        return $this->hasOne(Controlador::className(), ['id_controlador' => 'id_controlador']);
    }
}