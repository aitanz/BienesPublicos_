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
]); 
          $tipo=[
				1=>'Sede Principal',
				2=>'Puerto',
				3=>'Aeropuerto',
				4=>'Campamento',
				5=>'Taller',
				6=>'Almacén',
				7=>'Galpón',
				8=>'Otra Tipo de Sede o Lugar'];
    ?>
<?php 


   $sed = Yii::$app->db->createCommand('SELECT sede FROM bienes.sede '
 . ' WHERE 1=1 ORDER BY id_sede DESC LIMIT 1')->queryAll();
     $a=$sed[0]['sede'];
  $rest = (int)$a[1]; 
   $suma= $rest + 1; 
?>
    

    <?= $form->field($model, 'id_sede')->hiddenInput(['value'=>$suma])->label(false); ?>
    <?= $form->field($model, 'nombre')->textInput() ?>
    <?= $form->field($model,'tipo_sede')->dropDownList($tipo,['prompt'=>'Seleccione Tipo de sede','id'=>'tipo']);?>
    <?= $form->field($model, 'tipo_sede_esp')->textInput()->label('Especifique tipo de sede o lugar(Opcional)'); ?>
    <?= $form->field($model, 'descripcion')->textInput()->label('Descripción de la Sede'); ?>
    <?= $form->field($model, 'urbanizacion')->textInput() ?>
    <?= $form->field($model, 'calle')->textInput()->label('Calle / Avenida'); ?>
    <?= $form->field($model, 'casa_edif')->textInput()->label('Casa / Edificio'); ?>
    <?= $form->field($model, 'piso')->textInput()->label('Piso (Opcional)'); ?>
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
