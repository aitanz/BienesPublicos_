<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "categoriaprogramatica".
 *
 * @property integer $idcategoriaprogramatica
 * @property string $descripcion
 * @property string $categoriaprogramatica
 * @property integer $idcoordinacion
 * @property integer $idefiscal
 *
 * @property Efiscal $idefiscal0
 * @property Cuentafuentefinanciamiento[] $cuentafuentefinanciamientos
 * @property Cuentapresupuestaria[] $cuentapresupuestarias
 */
class Categoriaprogramatica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriaprogramatica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'categoriaprogramatica', 'idefiscal'], 'required'],
            [['idcoordinacion', 'idefiscal'], 'integer'],
            [['descripcion'], 'string', 'max' => 150],
            [['categoriaprogramatica'], 'string', 'max' => 20],
            [['categoriaprogramatica', 'idefiscal'], 'unique', 'targetAttribute' => ['categoriaprogramatica', 'idefiscal'], 'message' => 'The combination of Categoriaprogramatica and Idefiscal has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoriaprogramatica' => Yii::t('app', 'Idcategoriaprogramatica'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'categoriaprogramatica' => Yii::t('app', 'Categoriaprogramatica'),
            'idcoordinacion' => Yii::t('app', 'Idcoordinacion'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentafuentefinanciamientos()
    {
        return $this->hasMany(Cuentafuentefinanciamiento::className(), ['idcategoriaprogramatica' => 'idcategoriaprogramatica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentapresupuestarias()
    {
        return $this->hasMany(Cuentapresupuestaria::className(), ['idcategoriaprogramatica' => 'idcategoriaprogramatica']);
    }
}
