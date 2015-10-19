<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\bienes\models\BienesLocalidad;
use app\modules\bienes\models\BienesTipoLocalidadBien;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesLocalidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-localidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_localidad')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?php //echo $form->field($model, 'padre')->textInput() ?>
    
    <?= $form->field($model, 'padre')->dropDownList(
                Arrayhelper::map(BienesLocalidad::find()->all(),'id_localidad', function($data){
                    return Html::encode($data->codigo_completo.'    '. $data->nombre);
                }),
              //  array('class'=>''),
	['prompt'=>'Seleccione']); 
    ?>

    <?php // $form->field($model, 'codigo_completo')->textInput() ?>

    <?php //echo $form->field($model, 'id_tipo_localidad')->textInput() ?>
    
    <?php   $tipoLocalidad=BienesTipoLocalidadBien::find()->all();  ?>
    
    <?= $form->field($model, 'id_tipo_localidad')->dropDownList(
            Arrayhelper::map($tipoLocalidad,'id_tipo_localidad', 'descripcion'),
        ['prompt'=>'Seleccione']); 
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
