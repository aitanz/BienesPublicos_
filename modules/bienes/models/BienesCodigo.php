<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.codigo".
 *
 * @property integer $id_codigo
 * @property integer $codigo
 * @property string $descripcion
 * @property integer $padre
 * @property string $codigo_completo
 *
 * @property BienesCategoriaCodigoBien[] $bienesCategoriaCodigoBiens
 * @property BienesCategoria[] $idCategorias
 * @property BienesNCodigoBien[] $bienesNCodigoBiens
 * @property BienesLocalidad[] $idLocalidads
 */
class BienesCodigo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.codigo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'descripcion'], 'required'],
            [['codigo', 'padre'], 'integer'],
            [['descripcion', 'codigo_completo'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => Yii::t('app', 'Id Codigo'),
            'codigo' => Yii::t('app', 'Codigo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'padre' => Yii::t('app', 'Padre'),
            'codigo_completo' => Yii::t('app', 'Codigo Completo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesCategoriaCodigoBiens()
    {
        return $this->hasMany(BienesCategoriaCodigoBien::className(), ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategorias()
    {
        return $this->hasMany(BienesCategoria::className(), ['id_categoria' => 'id_categoria'])->viaTable('categoria_codigo_bien', ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesNCodigoBiens()
    {
        return $this->hasMany(BienesNCodigoBien::className(), ['id_codigo' => 'id_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocalidads()
    {
        return $this->hasMany(BienesLocalidad::className(), ['id_localidad' => 'id_localidad'])->viaTable('n_codigo_bien', ['id_codigo' => 'id_codigo']);
    }
   /* public function AjaxMensaje()
    {
        $this->codigo_completo='codigo_completo';
        $this->descripcion='descripcion';
            $mensaje="Se ha Registrado Exitosamente ".$this->codigo_completo. " ".$this->descripcion;
            $this->mensaje='mensaje';
    }*/
}
