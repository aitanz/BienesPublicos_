<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "tipoproducto".
 *
 * @property integer $idtipoproducto
 * @property string $descripcion
 * @property integer $idpuc
 * @property integer $idefiscal
 * @property string $puc
 * @property boolean $informatica
 */
class Tipoproducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipoproducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['idpuc', 'idefiscal'], 'integer'],
            [['informatica'], 'boolean'],
            [['descripcion'], 'string', 'max' => 800],
            [['puc'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtipoproducto' => Yii::t('app', 'Idtipoproducto'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'idpuc' => Yii::t('app', 'Idpuc'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'puc' => Yii::t('app', 'Puc'),
            'informatica' => Yii::t('app', 'Informatica'),
        ];
    }
}
