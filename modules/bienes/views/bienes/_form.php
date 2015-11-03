<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
//use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */
/* @var $form yii\widgets\ActiveForm */
$Sede = new app\modules\bienes\models\BienesSede;
$BienesCodigo = new app\modules\bienes\models\BienesCodigo;
$direccion = \yii::$app->user->Identity->id_direccion;
$idusuario = \yii::$app->user->Identity->id_usuario;





?>

<div class="bienes-ncodigo-bien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_direccion')->hiddenInput(['value'=>$direccion])->label(false);?>

    <?= $form->field($model, 'id_usuario')->hiddenInput(['value'=>$idusuario])->label(false);?>

    <?= $form->field($model, 'id_sede')->widget(Select2::classname(), [
      'model' => $Sede,
      'attribute' => 'nombre',
      'data'=>Arrayhelper::map($Sede::find()->all(), 'id_sede', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una sede ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Sede');?>

    <!-- ///////////////////////////////////////////// -->
    
    <?php
$provincia = ArrayHelper::map(\app\modules\bienes\models\BienesCodigo::find()->where("padre isnull")->all(), 'id_codigo', 'descripcion');
echo $form->field($model, 'categoria')->dropDownList(
    $provincia,
    [
        'prompt'=>'Por favor elija una',
        'onchange'=>'
                        $.get( "'.Url::toRoute('dependent-dropdown/departamento').'", { id_codigo: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'sub_categoria').'" ).html( data );
                            }
                        );
                    '
    ]
);
?>

<?php echo $form->field($model, 'sub_categoria')->dropDownList(array(),
    [
        'prompt'=>'Por favor elija uno',
        'onchange'=>'
                        $.get( "'.Url::toRoute('dependent-dropdown/localidad').'", { id_codigo: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'id_codigo').'" ).html( data );
                            }
                        );
                    '
    ]
); ?>

    <!-- ///////////////////////////////////////////// -->


    <?= $form->field($model, 'id_codigo')->widget(Select2::classname(), [

      'model' => $BienesCodigo,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesCodigo::find()->where("padre > 77")->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),
        'options' => ['placeholder' => 'Seleccione una Categoría ...'],
        'pluginOptions' => [
          'allowClear' => true
        ],])->label('Tipo');?>


    <?= $form->field($model, 'descripcion')->textarea(array('rows'=>2,'cols'=>5));?>

    <?= $form->field($model, 'identificacion')->textInput(array('onkeydown'=>"return soloNumeros(event)"));?>

    <?= $form->field($model, 'ubicacion')->textInput() ?>

    <?= $form->field($model, 'valor_unidad')->textInput(array('onkeydown'=>"return soloNumeros(event)"));?>

    <?= $form->field($model, 'justiprecio')->textInput(array('onkeydown'=>"return soloNumeros(event)")) ?>

    <?= $form->field($model, 'ano_adquisicion')->widget(\kartik\date\DatePicker::classname(), [
       'name' => 'fechas',
    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
     'options' => ['placeholder' => 'Introduce una Fecha ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ]
]) ?>

    <?= $form->field($model, 'tipo_adquisicion')->textInput() ?>

    <?= $form->field($model, 'n_documento')->textInput(array('onkeydown'=>"return soloNumeros(event)")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">

//Funcion para bloquear letras
        function soloLetras(event) {
            var keyCode = ('which' in event) ? event.which : event.keyCode;

            isNumeric = (keyCode >= 48 /* KeyboardEvent.DOM_VK_0 */ && keyCode <= 57 /* KeyboardEvent.DOM_VK_9 */) ||
                        (keyCode >= 96 /* KeyboardEvent.DOM_VK_NUMPAD0 */ && keyCode <= 105 /* KeyboardEvent.DOM_VK_NUMPAD9 */);
            modifiers = (event.altKey || event.ctrlKey || event.shiftKey);
            return !isNumeric || modifiers;
        }

    //Funcion para bloquear letras

    function soloNumeros(event){
    // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57
    var key = event.keyCode ? event.keyCode : event.which ;

    return (key <= 40 || (key >= 48 && key <= 57));
    }
    </script>
