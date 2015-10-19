<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-ncodigo-bien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_codigo') ?>

    <?= $form->field($model, 'id_localidad') ?>

    <?= $form->field($model, 'identificacion') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'valor_unidad') ?>

    <?php // echo $form->field($model, 'justiprecio') ?>

    <?php // echo $form->field($model, 'ano_adquisicion') ?>

    <?php // echo $form->field($model, 'ubicacion') ?>

    <?php // echo $form->field($model, 'tipo_adquisicion') ?>

    <?php // echo $form->field($model, 'n_documento') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
