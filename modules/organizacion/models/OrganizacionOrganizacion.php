<?php

namespace app\modules\organizacion\models;

use Yii;

/**
 * This is the model class for table "organizacion.organizacion".
 *
 * @property integer $id_organizacion
 * @property string $nombre
 */
class OrganizacionOrganizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizacion.organizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_organizacion' => Yii::t('app', 'Id Organizacion'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }
}
