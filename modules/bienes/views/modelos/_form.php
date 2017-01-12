<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\bienes\models\BienesMarcas;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesModelos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-modelos-form">

    <?php $form = ActiveForm::begin([
    'id' => 'bienes-modelos-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]);
    $marcas=  BienesMarcas::find()->all();
    ?>

  <?php 


   $sed = Yii::$app->db->createCommand('SELECT id_modelo FROM bienes.modelos '
 . ' WHERE 1=1 ORDER BY id_modelo DESC LIMIT 1')->queryAll();
       if($sed)
   {
      $a=$sed[0]['id_modelo'];
   }
   else
    {
        $a=0;
    }
   $suma= $a+1;
?>
    <?= $form->field($model, 'id_modelo')->hiddenInput(['value'=>$suma])->label(false); ?>
    <?= $form->field($model, 'descripcion')->textInput() ?>


    <?= $form->field($model, 'id_marca')->dropDownList(
            Arrayhelper::map($marcas,'id_marca', 'marca'),
        ['prompt'=>'Seleccione'])->label('Marca'); 
    ?>


      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#bienes-modelos-form").on("beforeSubmit", function(e) {
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
