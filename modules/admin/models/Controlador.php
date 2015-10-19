<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "seguridad.controlador".
 *
 * @property integer $id_controlador
 * @property integer $id_modulo
 * @property string $descripcion
 *
 * @property SeguridadAcciones[] $seguridadAcciones
 * @property SeguridadModulo $idModulo
 */
class Controlador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguridad.controlador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_modulo', 'descripcion'], 'required'],
            [['id_modulo'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['id_modulo', 'descripcion'], 'unique', 'targetAttribute' => ['id_modulo', 'descripcion'], 'message' => 'The combination of Id Modulo and Descripcion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_controlador' => Yii::t('app', 'Id Controlador'),
            'id_modulo' => Yii::t('app', 'Id Modulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguridadAcciones()
    {
        return $this->hasMany(Acciones::className(), ['id_controlador' => 'id_controlador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdModulo()
    {
        return $this->hasOne(Modulo::className(), ['id_modulo' => 'id_modulo']);
    }
}
