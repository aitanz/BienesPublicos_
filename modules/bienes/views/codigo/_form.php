<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\bienes\models\BienesCodigo;

?>


<div class="bienes-codigo-form">

  <?php $form = ActiveForm::begin([
    'id' => 'bienes-codigo-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <?= $form->field($model, 'codigo')->textInput(array('onkeydown'=>"return soloNumeros(event)")) ?> 

    <?= $form->field($model, 'descripcion')->textInput() ?>  <!--bloquea numeros con onkeydown-->

    <?=//= $form->field($model, 'padre')->textInput()
         $form->field($model, 'padre')->dropDownList(arrayhelper::map(BienesCodigo::find()->all(),'id_codigo', function($data)
                {
                    return Html::encode($data->codigo.'---'. $data->descripcion);
                }),
	['prompt'=>'Descripción']);

    ?>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
 <?php ActiveForm::end(); ?>
    
    
    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#bienes-codigo-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                    form.parent().html(result.message);
                    $.pjax.reload({container:"#gridview"});
                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        '); ?>

</div>

<script type="text/javascript">
//Funcion para bloquear numeros
        function soloLetras(event) {
            var keyCode = ('which' in event) ? event.which : event.keyCode;

            isNumeric = (keyCode >= 48 /* KeyboardEvent.DOM_VK_0 */ && keyCode <= 57 /* KeyboardEvent.DOM_VK_9 */) ||
                        (keyCode >= 96 /* KeyboardEvent.DOM_VK_NUMPAD0 */ && keyCode <= 105 /* KeyboardEvent.DOM_VK_NUMPAD9 */);
            modifiers = (event.altKey || event.ctrlKey || event.shiftKey);
            return !isNumeric || modifiers;
        }

    //Funcion para bloquear letras

function soloNumeros(event){
var key = event.keyCode ? event.keyCode : event.which ;

return (key <= 40 || (key >= 48 && key <= 57));
}
    </script>