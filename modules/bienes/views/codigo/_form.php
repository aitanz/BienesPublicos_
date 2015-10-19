<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\bienes\models\BienesCodigo;
use kartik\widgets\Alert;
?>

  
<div class="bienes-codigo-form">

    <?php $form = ActiveForm::begin([
"method"=>"post",
"id"=>"",
'enableClientValidation'=>true,
"enableAjaxValidation"=>false,
"action"=>['codigo/create'],
    ]); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?=//= $form->field($model, 'padre')->textInput()
         $form->field($model, 'padre')->dropDownList(arrayhelper::map(BienesCodigo::find()->all(),'id_codigo', function($data)
                {
                    return Html::encode($data->codigo.'---'. $data->descripcion);
                }),
	['prompt'=>'Descripción']);

    ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>"boton"]); 
             
        ?>
     
    </div>

    <?php ActiveForm::end(); ?>

</div>
