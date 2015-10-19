<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "coordinacion".
 *
 * @property integer $idcoordinacion
 * @property string $nombre
 * @property string $funciones
 * @property integer $iddireccion
 * @property integer $encargado
 * @property boolean $esdireccion
 * @property string $sufijo
 * @property integer $institucion
 * @property integer $firma
 *
 * @property Compromiso[] $compromisos
 * @property Direccion $iddireccion0
 * @property Ordencompra[] $ordencompras
 * @property Usuariosupervisor[] $usuariosupervisors
 * @property Usuario[] $idusuarios
 */
class Coordinacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coordinacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'funciones'], 'required'],
            [['iddireccion', 'encargado', 'institucion', 'firma'], 'integer'],
            [['esdireccion'], 'boolean'],
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
            'idcoordinacion' => Yii::t('app', 'Idcoordinacion'),
            'nombre' => Yii::t('app', 'Nombre'),
            'funciones' => Yii::t('app', 'Funciones'),
            'iddireccion' => Yii::t('app', 'Iddireccion'),
            'encargado' => Yii::t('app', 'Encargado'),
            'esdireccion' => Yii::t('app', 'Esdireccion'),
            'sufijo' => Yii::t('app', 'Sufijo'),
            'institucion' => Yii::t('app', 'Institucion'),
            'firma' => Yii::t('app', 'Firma'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompromisos()
    {
        return $this->hasMany(Compromiso::className(), ['idcoordinacion' => 'idcoordinacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddireccion0()
    {
        return $this->hasOne(Direccion::className(), ['iddireccion' => 'iddireccion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['idcordinacion' => 'idcoordinacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosupervisors()
    {
        return $this->hasMany(Usuariosupervisor::className(), ['idcoordinacion' => 'idcoordinacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusuarios()
    {
        return $this->hasMany(Usuario::className(), ['idusuario' => 'idusuario'])->viaTable('usuariosupervisor', ['idcoordinacion' => 'idcoordinacion']);
    }
}
