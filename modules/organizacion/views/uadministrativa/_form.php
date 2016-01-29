<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
$Orgnizacion = new app\modules\organizacion\models\OrganizacionOrganizacion;
$Categoria = new app\modules\bienes\models\BienesCategoriau;

/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionUadministrativa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizacion-uadministrativa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denominacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'depedencia')->textInput() ?>

    <?= $form->field($model, 'id_organizacion')->widget(Select2::classname(), [
      'model' => $Orgnizacion,
      'attribute' => 'nombre',
      'data'=>Arrayhelper::map($Orgnizacion::find()->all(), 'id_organizacion', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una Organización ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('id_organizacion');?>

    <?= $form->field($model, 'id_categoria')->widget(Select2::classname(), [
      'model' => $Categoria,
      'attribute' => 'denominacion',
      'data'=>Arrayhelper::map($Categoria::find()->all(), 'id_categoria_adm', 'denominacion'),
        'options' => ['placeholder' => 'Seleccione una Categoria ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('id_categoria');?>



    <!-- <?= $form->field($model, 'id_categoria')->textInput()?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
