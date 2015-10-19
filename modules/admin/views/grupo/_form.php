<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Grupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'administrador')->checkbox() ?>

    <?php
/*
    use kartik\select2\Select2;
    use app\modules\admin\models\Modulo;

$items = [];
    foreach (Modulo::find()->all() as $modulo) {
        $modulo->getAcciones($items);
    }

    echo $form->field($model, 'idAcciones')->widget(Select2::classname(), [
        'data' => $items,
        'options' => [
            'placeholder' => 'Seleccione las acciones ...',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label("Permisos");
 * 
 */
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
