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

    <?php $form = ActiveForm::begin(); ?>

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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
