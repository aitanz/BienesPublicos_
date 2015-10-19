<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "cuenta".
 *
 * @property string $tipo
 * @property string $puc
 * @property string $categoria
 * @property string $descripcion
 * @property string $monto
 * @property string $auxiliar
 * @property integer $idcategoriaprogramatica
 * @property integer $idpuc
 * @property string $pucn
 */
class Cuenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monto'], 'number'],
            [['idcategoriaprogramatica', 'idpuc'], 'integer'],
            [['tipo'], 'string', 'max' => 2],
            [['puc', 'categoria'], 'string', 'max' => 14],
            [['descripcion'], 'string', 'max' => 1014],
            [['auxiliar'], 'string', 'max' => 6],
            [['pucn'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo' => Yii::t('app', 'Tipo'),
            'puc' => Yii::t('app', 'Puc'),
            'categoria' => Yii::t('app', 'Categoria'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'monto' => Yii::t('app', 'Monto'),
            'auxiliar' => Yii::t('app', 'Auxiliar'),
            'idcategoriaprogramatica' => Yii::t('app', 'Idcategoriaprogramatica'),
            'idpuc' => Yii::t('app', 'Idpuc'),
            'pucn' => Yii::t('app', 'Pucn'),
        ];
    }
}
