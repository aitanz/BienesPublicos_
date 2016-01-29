<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.categoriau".
 *
 * @property integer $id_categoria_adm
 * @property string $denominacion
 *
 * @property OrganizacionUadministrativa[] $organizacionUadministrativas
 */
class BienesCategoriau extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.categoriau';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['denominacion'], 'required'],
            [['denominacion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria_adm' => Yii::t('app', 'Id Categoria Adm'),
            'denominacion' => Yii::t('app', 'Denominacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacionUadministrativas()
    {
        return $this->hasMany(OrganizacionUadministrativa::className(), ['id_categoria' => 'id_categoria_adm']);
    }
}
