<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.marcas".
 *
 * @property integer $id_marca
 * @property string $marca
 * @property string $fabricante
 *
 * @property BienesModelos[] $bienesModelos
 */
class BienesMarcas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.marcas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca', 'marca'], 'required'],
             [['id_marca'], 'unique','message'=>'Ya Existe un Registro con este Id'],
            [['id_marca'], 'integer'],
            [['marca'], 'string', 'max' => 200],
            [['fabricante'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_marca' => Yii::t('app', 'Id Marca'),
            'marca' => Yii::t('app', 'Marca'),
            'fabricante' => Yii::t('app', 'Fabricante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBienesModelos()
    {
        return $this->hasMany(BienesModelos::className(), ['id_marca' => 'id_marca']);
    }
}
