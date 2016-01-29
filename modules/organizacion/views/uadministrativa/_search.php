<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionUadministrativaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizacion-uadministrativa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_unidad') ?>

    <?= $form->field($model, 'denominacion') ?>

    <?= $form->field($model, 'depedencia') ?>

    <?= $form->field($model, 'id_organizacion') ?>

    <?= $form->field($model, 'id_categoria') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
