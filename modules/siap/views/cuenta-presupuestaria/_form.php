<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\CuentaPresupuestaria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuenta-presupuestaria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'auxiliar')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'causado')->textInput() ?>

    <?= $form->field($model, 'comprometido')->textInput() ?>

    <?= $form->field($model, 'descripcionaux')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'disponibilidad')->textInput() ?>

    <?= $form->field($model, 'espadre')->checkbox() ?>

    <?= $form->field($model, 'pagado')->textInput() ?>

    <?= $form->field($model, 'aumentado')->textInput() ?>

    <?= $form->field($model, 'disminuido')->textInput() ?>

    <?= $form->field($model, 'precomprometido')->textInput() ?>

    <?= $form->field($model, 'sectorgeog')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'statusaprobacion')->textInput() ?>

    <?= $form->field($model, 'tipopartida')->textInput() ?>

    <?= $form->field($model, 'montoinicial')->textInput() ?>

    <?= $form->field($model, 'idcategoriaprogramatica')->textInput() ?>

    <?= $form->field($model, 'idpuc')->textInput() ?>

    <?= $form->field($model, 'puc')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'tipocuenta')->textInput() ?>

    <?= $form->field($model, 'adicional')->textInput() ?>

    <?= $form->field($model, 'montooriginal')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'proyecto')->textInput() ?>

    <?= $form->field($model, 'idrecurso')->textInput() ?>

    <div class="input-group date datetime col-md-5" data-min-view="2" data-date-format="dd-mm-yyyy">
        <?= $form->field($model, 'fechagaceta')->textInput() ?>
        <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
    </div>
            <?= $form->field($model, 'extraordinario')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'gaceta')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'idusuario')->textInput() ?>

    <?= $form->field($model, 'idefiscal')->textInput() ?>

    <?= $form->field($model, 'corriente')->textInput() ?>

    <?= $form->field($model, 'capital')->textInput() ?>

    <?= $form->field($model, 'financiera')->textInput() ?>

    <?= $form->field($model, 'inversion')->textInput() ?>

    <?= $form->field($model, 'clase')->textInput(['maxlength' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
