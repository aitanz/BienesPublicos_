<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\AjustesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ajustes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'observacion') ?>

    <?= $form->field($model, 'id_documento') ?>

    <?= $form->field($model, 'id_tipo') ?>

    <?= $form->field($model, 'monto_ajuste') ?>

    <?= $form->field($model, 'id_usuario_crea') ?>

    <?php // echo $form->field($model, 'id_usuario_reversa') ?>

    <?php // echo $form->field($model, 'fecha_ajuste') ?>

    <?php // echo $form->field($model, 'fecha_reverso_ajuste') ?>

    <?php // echo $form->field($model, 'id_ajuste') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
