<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesLocalidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bienes-localidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_localidad') ?>

    <?= $form->field($model, 'codigo_localidad') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'padre') ?>

    <?= $form->field($model, 'codigo_completo') ?>

    <?php // echo $form->field($model, 'id_tipo_localidad') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
