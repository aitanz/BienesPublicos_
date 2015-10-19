<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\CuentaPresupuestariaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuenta-presupuestaria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcuenta') ?>

    <?= $form->field($model, 'auxiliar') ?>

    <?= $form->field($model, 'causado') ?>

    <?= $form->field($model, 'comprometido') ?>

    <?= $form->field($model, 'descripcionaux') ?>

    <?php // echo $form->field($model, 'disponibilidad') ?>

    <?php // echo $form->field($model, 'espadre')->checkbox() ?>

    <?php // echo $form->field($model, 'pagado') ?>

    <?php // echo $form->field($model, 'aumentado') ?>

    <?php // echo $form->field($model, 'disminuido') ?>

    <?php // echo $form->field($model, 'precomprometido') ?>

    <?php // echo $form->field($model, 'sectorgeog') ?>

    <?php // echo $form->field($model, 'statusaprobacion') ?>

    <?php // echo $form->field($model, 'tipopartida') ?>

    <?php // echo $form->field($model, 'montoinicial') ?>

    <?php // echo $form->field($model, 'idcategoriaprogramatica') ?>

    <?php // echo $form->field($model, 'idpuc') ?>

    <?php // echo $form->field($model, 'puc') ?>

    <?php // echo $form->field($model, 'categoria') ?>

    <?php // echo $form->field($model, 'tipocuenta') ?>

    <?php // echo $form->field($model, 'adicional') ?>

    <?php // echo $form->field($model, 'montooriginal') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'proyecto') ?>

    <?php // echo $form->field($model, 'idrecurso') ?>

    <?php // echo $form->field($model, 'fechagaceta') ?>

    <?php // echo $form->field($model, 'extraordinario') ?>

    <?php // echo $form->field($model, 'gaceta') ?>

    <?php // echo $form->field($model, 'idusuario') ?>

    <?php // echo $form->field($model, 'idefiscal') ?>

    <?php // echo $form->field($model, 'corriente') ?>

    <?php // echo $form->field($model, 'capital') ?>

    <?php // echo $form->field($model, 'financiera') ?>

    <?php // echo $form->field($model, 'inversion') ?>

    <?php // echo $form->field($model, 'clase') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
