<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\requisiciones\models\RequisicionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requisicion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idrequisicion') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'observaciones') ?>

    <?= $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'concepto') ?>

    <?php // echo $form->field($model, 'numcontrol') ?>

    <?php // echo $form->field($model, 'idefiscal') ?>

    <?php // echo $form->field($model, 'idtipoproducto') ?>

    <?php // echo $form->field($model, 'idcoordinacion') ?>

    <?php // echo $form->field($model, 'idtipopago') ?>

    <?php // echo $form->field($model, 'statusinformatica') ?>

    <?php // echo $form->field($model, 'statusadmin') ?>

    <?php // echo $form->field($model, 'fechainformatica') ?>

    <?php // echo $form->field($model, 'fechaadmin') ?>

    <?php // echo $form->field($model, 'motivorechazo') ?>

    <?php // echo $form->field($model, 'bitacora') ?>

    <?php // echo $form->field($model, 'idusuario') ?>

    <?php // echo $form->field($model, 'dirip') ?>

    <?php // echo $form->field($model, 'idproveedor') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'idcuenta') ?>

    <?php // echo $form->field($model, 'idpuc') ?>

    <?php // echo $form->field($model, 'puc') ?>

    <?php // echo $form->field($model, 'idcategoriaprogramatica') ?>

    <?php // echo $form->field($model, 'categoriaprogramatica') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <?php // echo $form->field($model, 'auxiliar') ?>

    <?php // echo $form->field($model, 'iddireccion') ?>

    <?php // echo $form->field($model, 'secuencia') ?>

    <?php // echo $form->field($model, 'imputacion')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
