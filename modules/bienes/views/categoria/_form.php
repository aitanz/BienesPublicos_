<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-categoria-form">

<?php $form = ActiveForm::begin([
    'id' => 'bienes-categoria-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
]); ?>

    <?php 


   $sed = Yii::$app->db->createCommand('SELECT id_categoria FROM bienes.categoria '
 . ' WHERE 1=1 ORDER BY id_categoria DESC LIMIT 1')->queryAll();
     $a=$sed[0]['id_categoria'];
   $suma= $a+1;
?>

    <?= $form->field($model, 'id_categoria')->hiddenInput(['value'=>$suma])->label(false); ?>


    <?= $form->field($model, 'descripcion')->textInput() ?>

      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#bienes-categoria-form").on("beforeSubmit", function(e) {
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
