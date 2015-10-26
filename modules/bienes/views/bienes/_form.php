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
//$BienesLocalidad =  new app\modules\bienes\models\BienesLocalidad;
$BienesCodigo = new app\modules\bienes\models\BienesCodigo;

?>

<div class="bienes-ncodigo-bien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sede')->widget(Select2::classname(), [

      'model' => $Sede,
      'attribute' => 'nombre',
      'data'=>Arrayhelper::map($Sede::find()->all(), 'id_sede', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una sede ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Sede');?>


    <?= $form->field($model, 'id_codigo')->widget(Select2::classname(), [

      'model' => $BienesCodigo,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesCodigo::find()->where("padre > 77")->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),
        'options' => ['placeholder' => 'Seleccione una Categoría ...'],
        'pluginOptions' => [
          'allowClear' => true
        ],])->label('Categoría');?>


        <?/*= $form->field($model, 'id_codigo')->dropDownList(
                          arrayhelper::map($BienesCodigo::find()->all(),'id_codigo', function($data)
                                              {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),
                        [
                          'prompt'=>'Seleccion un Codigo',
                          ])->label('Categoria');
        */?>

<? /*
        $dataCategoria=ArrayHelper::map($BienesCodigo::find()->where('padre is null')->all(),'id_codigo', function($data)
                            {return Html::encode($data->codigo_completo.'---'. $data->descripcion);});


        // Parent
        echo $form->field($model, 'id_codigo')->dropDownList($dataCategoria, ['id_codigo' => 'categoria'])->label('Categoria Selec2');


        // Child # 1
        echo $form->field($model, 'id_codigo')->widget(DepDrop::classname(), [
            'options'=>['id_codigo'=>'subcategoria'],
            'pluginOptions'=>[
                'depends'=>['categoria'],
                //'depends'=>[Html::getInputId($model, 'categoria')],
                'placeholder'=>'Select esta subcategoria...',
                'url'=>Url::to(['bienes/get-subcat'])
            ]
        ])->label('Sub-Categoria Selec2');

        // Child # 2
        echo $form->field($model, 'id_codigo')->widget(DepDrop::classname(), [
            'pluginOptions'=>[
                'depends'=>['categoria', 'subcategoria'],
                'placeholder'=>'Select...',
                'url'=>Url::to(['/bienes/prod'])
            ]
        ])->label('Producto Selec2');


?>

      <?= $form->field($model, 'id_codigo')->dropDownList(arrayhelper::map($BienesCodigo::find()->where("padre  < 10  " )->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),['prompt'=>'Seleccion un Codigo'])->label('Sub-Categoria2');
      ?>

      <?= $form->field($model, 'id_codigo')->dropDownList(arrayhelper::map($BienesCodigo::find()->where("padre > 77")->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),['prompt'=>'Seleccion un Codigo'])->label('Tipo');
                */    ?>


    <?= $form->field($model, 'descripcion')->textarea(array('rows'=>2,'cols'=>5));?>

    <?= $form->field($model, 'identificacion')->textInput();?>

    <?= $form->field($model, 'ubicacion')->textInput() ?>

    <?= $form->field($model, 'valor_unidad')->textInput();?>

    <?= $form->field($model, 'justiprecio')->textInput() ?>

    <?= $form->field($model, 'ano_adquisicion')->textInput() ?>

    <?= $form->field($model, 'tipo_adquisicion')->textInput() ?>

    <?= $form->field($model, 'n_documento')->textInput() ?>

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
