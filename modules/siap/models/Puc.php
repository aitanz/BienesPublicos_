<?php

namespace app\modules\siap\models;

use Yii;

/**
 * This is the model class for table "puc".
 *
 * @property integer $idpuc
 * @property string $descripcion
 * @property string $puc
 * @property integer $idefiscal
 * @property integer $idcuentadebe
 * @property integer $idcuentahaber
 * @property integer $idcuentahaberorden
 *
 * @property Efiscal $idefiscal0
 * @property Cuentapresupuestaria[] $cuentapresupuestarias
 */
class Puc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'puc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'puc'], 'required'],
            [['idefiscal', 'idcuentadebe', 'idcuentahaber', 'idcuentahaberorden'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['puc'], 'string', 'max' => 20],
            [['puc', 'idefiscal'], 'unique', 'targetAttribute' => ['puc', 'idefiscal'], 'message' => 'The combination of Puc and Idefiscal has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpuc' => Yii::t('app', 'Idpuc'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'puc' => Yii::t('app', 'Puc'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'idcuentadebe' => Yii::t('app', 'Idcuentadebe'),
            'idcuentahaber' => Yii::t('app', 'Idcuentahaber'),
            'idcuentahaberorden' => Yii::t('app', 'Idcuentahaberorden'),
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
    public function getCuentapresupuestarias()
    {
        return $this->hasMany(Cuentapresupuestaria::className(), ['idpuc' => 'idpuc']);
    }
}
