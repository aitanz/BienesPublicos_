<?php

namespace app\modules\bienes\models;

use Yii;

/**
 * This is the model class for table "bienes.n_codigo_bien".
 *
 * @property integer $id_codigo
 * @property integer $id_direccion
 * @property integer $identificacion
 * @property string $descripcion
 * @property string $valor_unidad
 * @property string $justiprecio
 * @property string $ano_adquisicion
 * @property string $ubicacion
 * @property string $tipo_adquisicion
 * @property string $n_documento
 * @property integer $id_sede
 * @property integer $id_usuario
 * @property integer $id_uadministrativa
 * @property string $codigo_origen
 * @property string $codigo_resp
 * @property integer $uso
 * @property string $otro_es
 * @property integer $moneda
 * @property string $otra_mon
 * @property string $ingreso
 * @property integer $estado
 * @property string $otro_estado
 * @property string $descripcion_es
 * @property string $serial
 * @property string $codigo_marca
 * @property string $codigo_modelo
 * @property integer $codigo_color
 * @property integer $ano_fabricacion
 * @property string $otro_color
 * @property string $otros_color
 * @property string $otras_descripciones
 * @property integer $garantia
 * @property integer $medida_garantia
 * @property string $asegurado
 * @property string $componentes
 * @property string $codigo_seguro
 * @property string $inicio_garantia
 * @property string $fin_garantia
 *
 * @property BienesCodigo $idCodigo
 */
class BienesNCodigoBien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bienes.n_codigo_bien';
    }
public $categoria;
public $sub_categoria;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_codigo', 'id_direccion', 'identificacion', 'descripcion', 'ano_adquisicion', 'ubicacion','tipo_adquisicion'], 'required'],
            [['id_codigo', 'id_direccion', 'identificacion', 'id_sede', 'id_usuario', 'id_uadministrativa', 'uso', 'moneda', 'estado', 'codigo_color', 'ano_fabricacion', 'garantia', 'medida_garantia'], 'integer'],
            [['descripcion', 'ubicacion', 'n_documento'], 'string'],
            [['valor_unidad', 'justiprecio'], 'number'],
            [['ano_adquisicion', 'ingreso', 'inicio_garantia', 'fin_garantia'], 'safe'],
            [['codigo_origen'], 'string', 'max' => 12],
            [['codigo_resp', 'codigo_marca', 'codigo_seguro'], 'string', 'max' => 10],
            [['otro_es'], 'string', 'max' => 100],
            [['otra_mon', 'otro_estado'], 'string', 'max' => 30],
            [['descripcion_es'], 'string', 'max' => 200],
            [['serial', 'otro_color'], 'string', 'max' => 50],
            [['otros_color', 'otras_descripciones', 'codigo_modelo'], 'string', 'max' => 255],
            [['asegurado', 'componentes'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_codigo' => 'Id Codigo',
            'id_direccion' => 'Id Direccion',
            'identificacion' => 'Identificacion',
            'descripcion' => 'Descripcion',
            'valor_unidad' => 'Valor Unidad',
            'justiprecio' => 'Justiprecio',
            'ano_adquisicion' => 'Ano Adquisicion',
            'ubicacion' => 'Ubicacion',
            'tipo_adquisicion' => 'Tipo Adquisicion',
            'n_documento' => 'N Documento',
            'id_sede' => 'Id Sede',
            'id_usuario' => 'Id Usuario',
            'id_uadministrativa' => 'Id Uadministrativa',
            'codigo_origen' => 'Codigo Origen',
            'codigo_resp' => 'Responsable',
            'uso' => 'Estatus del uso del Bien',
            'otro_es' => 'Especifique el otro uso(Opcional)',
            'moneda' => 'Moneda',
            'otra_mon' => 'Otra Moneda',
            'ingreso' => 'Fecha de Ingreso',
            'estado' => 'Estado del Bien',
            'otro_estado' => 'Especifique el Otro Estado(Opcional)',
            'descripcion_es' => 'Descripción del Estado',
            'serial' => 'Serial del Bien',
            'codigo_marca' => 'Marca',
            'codigo_modelo' => 'Modelo',
            'codigo_color' => 'Color',
            'ano_fabricacion' => 'Año de Fabricación',
            'otro_color' => 'Especificación del otro color(Opcional)',
            'otros_color' => 'Especificaciones del color(Opcional)',
            'otras_descripciones' => 'Otras Especificaciones(Opcional)',
            'garantia' => 'Garantía(Opcional)',
            'medida_garantia' => 'Medida Garantia',
            'asegurado' => 'Se Encuentra Asegurado',
            'componentes' => 'Posee componentes',
            'codigo_seguro' => 'Código del Registro de Seguro',
            'inicio_garantia' => 'Inicio Garantia',
            'fin_garantia' => 'Fin Garantia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCodigo()
    {
        return $this->hasOne(BienesCodigo::className(), ['id_codigo' => 'id_codigo']);
    }
}
