<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "seguridad.modulo".
 *
 * @property integer $id_modulo
 * @property integer $descripcion
 *
 * @property SeguridadControlador[] $seguridadControladors
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguridad.modulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 25],
            [['descripcion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_modulo' => Yii::t('app', 'Id Modulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguridadControladors()
    {
        return $this->hasMany(Controlador::className(), ['id_modulo' => 'id_modulo']);
    }
    
    /**
     * @return Array
     */
    public function getAcciones(&$items)
    {
        foreach ( $this->seguridadControladors as $controlador )
        {
            foreach ($controlador->seguridadAcciones as $accion)
            {
                $items[ "Modulo: ".strtoupper($this->descripcion)." - Controlador: ".str_ireplace("controller", "", $controlador->descripcion)][$accion->id_accion] = Yii::t('app',  $accion->descripcion);
            }
        }
    }
    
    public static function getModulosControladores()
    {
        $items = [];
        foreach( Modulo::find()->all() as $modulo )
        {
            $modulo->getAcciones($items);
        }
        return $items;
    }
}
