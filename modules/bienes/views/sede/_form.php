<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesSede */
/* @var $form yii\widgets\ActiveForm */
$BienesLocalidad =  new app\modules\bienes\models\BienesLocalidad;


?>

<div class="bienes-sede-form">

    <?php $form = ActiveForm::begin([
    'id' => 'bienes-sede-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>


    <?= $form->field($model, 'id_sede')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'id_localidad')->widget(Select2::classname(), [

      'model' => $BienesLocalidad,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesLocalidad::find()->all(), 'id_localidad', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una sede ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Seleccione una localidad');?>

     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#bienes-sede-form").on("beforeSubmit", function(e) {
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
        ');
    ?>
</div>
