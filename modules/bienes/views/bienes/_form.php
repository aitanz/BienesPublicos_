<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\bienes\models\BienesCodigo;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */
/* @var $form yii\widgets\ActiveForm */
use kartik\widgets\Select2;
$BienesLocalidad =  new app\modules\bienes\models\BienesLocalidad;
$BienesCodigo = new app\modules\bienes\models\BienesCodigo;

?>

<div class="bienes-ncodigo-bien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_localidad')->widget(Select2::classname(), [

      'model' => $BienesLocalidad,
      'attribute' => 'nombre',
      'data'=>Arrayhelper::map($BienesLocalidad::find()->where(['id_tipo_localidad' => 3])->all(), 'id_localidad', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una sede ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Sede');
    ?>

  <?= $form->field($model, 'id_codigo')->dropDownList(arrayhelper::map(BienesCodigo::find()->where("id_codigo  < 10")->all(),'id_codigo', function($data)
            {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),['prompt'=>'Seleccion un Codigo'])->label('Categoria');
  ?>

      <?= $form->field($model, 'id_codigo')->dropDownList(arrayhelper::map(BienesCodigo::find()->where("padre  < 10  " )->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),['prompt'=>'Seleccion un Codigo'])->label('Sub-Categoria');
      ?>

      <?= $form->field($model, 'id_codigo')->dropDownList(arrayhelper::map(BienesCodigo::find()->where("padre > 77")->all(),'id_codigo', function($data)
                {return Html::encode($data->codigo_completo.'---'. $data->descripcion);    }),['prompt'=>'Seleccion un Codigo'])->label('Tipo');
      ?>





      <?/*= $form->field($model, 'id_codigo')->widget(Select2::classname(), [

        'model' => $BienesCodigo,
        'attribute' => 'descripcion'.'codigo_completo',
        'data'=>Arrayhelper::map($BienesCodigo::find()->where(['padre' => 77])->all(), 'id_codigo', 'descripcion','codigo_completo'),
          'options' => ['placeholder' => 'Seleccione un Codigo ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],]);*/
    ?>



    <? //= $form->field($model, 'nombre')->textarea()
    ?>

    <?= $form->field($model, 'descripcion')->textarea()?>

    <?= $form->field($model, 'identificacion')->textInput()?>

    <?= $form->field($model, 'ubicacion')->textInput() ?>

    <?= $form->field($model, 'valor_unidad')->textInput() ?>

    <?= $form->field($model, 'justiprecio')->textInput() ?>

    <?= $form->field($model, 'ano_adquisicion')->textInput() ?>

    <?= $form->field($model, 'tipo_adquisicion')->textInput() ?>

    <?= $form->field($model, 'n_documento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
