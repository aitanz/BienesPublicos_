<?php
/*
 * $ordenCompra
 * $proveedor
 * $bienes
 * $unidadSolicitante
 */

use yii\helpers\Html;
use app\modules\siap\models\Ajustes;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;

$ajuste = new Ajustes();

$form = ActiveForm::begin([
            'enableClientValidation' => true,
            'enableAjaxValidation' => true,
            'validateOnSubmit' => true,
            'validateOnChange' => true,
            'validateOnType' => true,
        ]);
?>
<div class="panel panel-primary">
    <div class = "panel-heading">
        <h3>ORDEN DE COMPRA</h3>
    </div>
    <div class="content formulario">
        <div class="block-flat">
            <div class = "header">
                <h3>DATOS DE LA SOLICITUD</h3>
            </div>
            <div class = "form-group content">
                <?= Html::input('hidden', 'tipoModificacion', $tipoModificacion, [ 'readonly' => 'readonly', 'disabled' => 'disabled']) ?>
                <?= $form->field($ordenCompra, 'fecha', [])->textInput([ 'readonly' => 'readonly', 'class' => 'date datetime', 'data-min-view' => '2', 'data-date-format' => 'yyyy-mm-dd', 'title' => 'click para cambiar']) ?>
                <?= $form->field($ordenCompra, 'idordencompra', [])->textInput([ 'value' => $ordenCompra->idordencompra, 'readonly' => 'readonly']) ?>
                <?= $form->field($ordenCompra, 'idcoordinacion', [])->textInput([ 'value' => $unidadSolicitante->nombre, 'readonly' => 'readonly'])->label("UNIDAD SOLICITANTE") ?>
                <?= $form->field($ordenCompra, 'concepto', [])->textArea(['readonly' => 'readonly'])->label('CONCEPTO') ?>

            </div>
        </div>

        <div class="block-flat">
            <div class="header">
                <h3>INFORMACION DEL PROVEEDOR</h3>
            </div>
            <div class="content form-group">
                <?= $form->field($proveedor, 'idproveedor', [])->textInput(['readonly' => 'readonly'])->label('CODIGO PROVEEDOR') ?>

                <?= $form->field($proveedor, 'razonsocial', [])->textInput(['readonly' => 'readonly'])->label('RAZON SOCIAL') ?>

                <?= $form->field($proveedor, 'rif', [])->textInput(['readonly' => 'readonly'])->label('RIF') ?>

                <?= $form->field($proveedor, 'direccion', [])->textInput(['readonly' => 'readonly'])->label('DIRECCION') ?>

                <?= $form->field($proveedor, 'telefono', [])->textInput(['readonly' => 'readonly'])->label('TELEFONO') ?>
            </div>
        </div>

        <div class="block-flat">
            <div class="header">
                <h3>DETALLE DE LOS BIENES O ELEMENTOS A ADQUIRIR</h3>
            </div>
            <div class="content form-group">
                <?php
                if ($tipoModificacion == 2) {
                  echo '<button type="button" class="btn btn-success btn-lg md-trigger" onclick="" data-modal="agregar-producto">
<i class="fa fa-plus-circle"></i> Agregar Producto </button>';
                }
                echo \yii\grid\GridView::widget([
                    'dataProvider' => $provider,
                    'id' => 'tablaProductos',
                    'rowOptions' => function ($model, $key, $index, $grid) {
                      return ['id' => 'producto' . $index, 'class' => 'productoFila'];
                    },
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'label' => 'ID',
                                    'format' => 'raw',
                                    'visible' => false,
                                    'value' => function($data) {
                                      return trim($data->idordencompradetalle);
                                    }
                                ],
                                [
                                    'label' => 'CODIGO',
                                    'format' => 'raw',
                                    'value' => function($data) {
                                      return Html::label('0' . trim($data->idproducto));
                                    }
                                ],
                                [
                                    'label' => 'PRODUCTO',
                                    'format' => 'raw',
                                    'value' => function($data) {
                                      $producto = \app\modules\siap\models\Producto::findOne($data->idproducto);
                                      if ($producto)
                                        return Html::label(trim($producto->descripcion));
                                      else {
                                        return Html::label('');
                                      }
                                    }
                                ],
                                [
                                    'label' => 'CANTIDAD',
                                    'format' => 'raw',
                                    'value' => function($data) {
                                      return Html::input('number', 'cantidad', $data->cantidad, [ 'class' => 'form-control', 'min' => '1', 'oninvalid' => 'La cantidad debe ser un numero, igual o mayor a 1.', 'style' => 'width: 60px', 'readonly' => 'readonly']);
                                    }],
                                        [
                                            'label' => 'PRECIO',
                                            'format' => 'raw',
                                            'value' => function($data) {
                                              return '<div class="input-group">' .
                                                      Html::input('number', 'precio', $data->punitario, [ 'class' => 'form-control sin-spinner', 'readonly' => 'readonly']) .
                                                      '<span class="input-group-addon">Bs</span>.</div>';
                                            }
                                                ],
                                                [
                                                    'label' => 'IVA',
                                                    'format' => 'raw',
                                                    'value' => function($data) {
                                                      return '<div class="input-group">' .
                                                              Html::input('number', 'iva', $data->iva, [ 'class' => 'form-control sin-spinner', 'readonly' => 'readonly']) .
                                                              '<span class="input-group-addon">%</span>.</div>';
                                                    }
                                                        ],
                                                        [
                                                            'label' => 'MONTO IVA',
                                                            'format' => 'raw',
                                                            'value' => function($data) {
                                                              return '<div class="input-group">' .
                                                                      Html::input('number', 'montoIva', ($data->punitario * $data->iva) / 100, [ 'class' => 'form-control sin-spinner', 'readonly' => 'readonly']) .
                                                                      '<span class="input-group-addon">Bs</span>.</div>';
                                                            }
                                                                ],
                                                                [
                                                                    'label' => 'DESCUENTO',
                                                                    'format' => 'raw',
                                                                    'value' => function($data) {
                                                                      return '<div class="input-group">' .
                                                                              Html::input('number', 'descuento', $data->descuento, [ 'class' => 'form-control', 'min' => '0', 'oninvalid' => 'Descuento debe ser un numero, mayor que 0..', 'readonly' => 'readonly']) .
                                                                              '<span class="input-group-addon">Bs</span>.</div>';
                                                                    }
                                                                        ],
                                                                        [
                                                                            'label' => 'TOTAL',
                                                                            'format' => 'raw',
                                                                            'value' => function($data) {
                                                                              return '<div class="input-group">' .
                                                                                      Html::input('number', 'total' . $data->idproducto, $data->cantidad, [ 'class' => 'form-control sin-spinner', 'readonly' => 'readonly', 'style' => 'width: 70px', 'readonly' => 'readonly']) .
                                                                                      '<span class="input-group-addon">Bs</span>.</div>';
                                                                            }
                                                                                ],
                                                                                [
                                                                                    'label' => 'ACCIONES',
                                                                                    'format' => 'raw',
                                                                                    'value' => function($data, $key, $index) {
                                                                                      $tipoModificacion = (int) \Yii::$app->request->post('tipoModificacion');
                                                                                      if ($tipoModificacion == 2)
                                                                                        return '<div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' . $index . '\').hide(\'slow\').remove(); actualizarNumero();" style="cursor: pointer"><i class="fa fa-minus-square"></i> Eliminar</div>';
                                                                                      return '';
                                                                                    }
                                                                                ],
                                                                            ],
                                                                        ]);
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="panel panel-primary">

                                                            <div class="panel-heading">
                                                                <h5>AJUSTE</h5>  
                                                            </div>
                                                            <div class="panel-body">

                                                                <div class="contentform-group">
                                                                    <?= $form->field($ajuste, 'fecha_ajuste')->textInput([ 'type' => 'date', 'value' => date('Y-m-d'), 'class' => 'form-control date datetime '])->label('FECHA DEL AJUSTE') ?>
                                                                </div>
                                                                <div class="contentform-group">
                                                                    <?= $form->field($ajuste, 'observacion')->textArea(['maxlength' => 256])->label('OBSERVACION') ?>
                                                                </div>



                                                                <div class="form-group">
                                                                    <?= Html::submitButton($ajuste->isNewRecord ? Yii::t('app', 'Crear Ajuste') : Yii::t('app', 'Actualizar'), ['class' => $ajuste->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php ActiveForm::end(); ?>

                                                        </div>

                                                        <div class="md-modal md-effect-18 colored-header danger" id="agregar-producto" style="max-height: 90%;">
                                                            <div class="md-content">
                                                                <div class="modal-header">
                                                                    <h3>Agregar Producto</h3>
                                                                    <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="nano nscroller has-scrollbar">
                                                                        <div style="right: -15px;" tabindex="0" class="content">


                                                                            <?php
                                                                            $ordenCompraDetalle = new app\modules\siap\models\OrdenCompraDetalle();
                                                                            $productos = \app\modules\siap\models\Producto::find()->all();
                                                                            $data = [];
                                                                            foreach ($productos as $producto) {
                                                                              $data[trim($producto->idproducto)] = trim($producto->descripcion);
                                                                            }


                                                                            $form2 = ActiveForm::begin();

                                                                            echo $form2->field($ordenCompraDetalle, 'idproducto')->widget(kartik\select2\Select2::classname(), [
                                                                                'data' => array_merge(['' => ''], $data),
                                                                                'options' => ['placeholder' => 'Seleccone un producto ...', 'onchange' => 'informacionProducto()'],
                                                                                'pluginOptions' => [
                                                                                    'allowClear' => true
                                                                                ],
                                                                            ])->label("Producto");
                                                                            ?>

                                                                            <?= $form2->field($ordenCompraDetalle, 'cantidad', [])->input('number', [ 'onformchange' => 'actualizarTotalProductoAgregar()', 'class' => 'form-control', 'min' => '0', 'value' => '0', 'onkeyup' => 'actualizarTotalProductoAgregar()']) ?>

                                                                            <?= $form2->field($ordenCompraDetalle, 'punitario', [])->input('number', [ 'onformchange' => 'actualizarTotalProductoAgregar()', 'onkeyup' => 'actualizarTotalProductoAgregar()', 'class' => 'form-control sin-spinner', 'min' => '0', 'value' => '0']) ?>

                                                                            <?= $form2->field($ordenCompraDetalle, 'iva', [])->input('number', [ 'onformchange' => 'actualizarTotalProductoAgregar()', 'onkeyup' => 'actualizarTotalProductoAgregar()', 'class' => 'form-control sin-spinner', 'min' => '0', 'value' => '12']) ?>

                                                                            <!-- ($data->punitario * $data->iva) / 100 -->
                                                                            <?= $form2->field($ordenCompraDetalle, 'montoiva', [])->input('number', [ 'class' => 'form-control sin-spinner', 'min' => '0', 'readonly' => 'readonly', 'value' => '0']) ?>

                                                                            <?= $form2->field($ordenCompraDetalle, 'descuento', [])->input('number', [ 'onformchange' => 'actualizarTotalProductoAgregar()', 'onkeyup' => 'actualizarTotalProductoAgregar()', 'class' => 'form-control sin-spinner', 'min' => '0', 'value' => '0']) ?>

                                                                            <?= $form2->field($ordenCompraDetalle, 'total', [])->input('number', [ 'class' => 'form-control sin-spinner', 'min' => '0', 'readonly' => 'readonly', 'value' => '0']) ?>

                                                                            <?php ActiveForm::end() ?>
                </div>
                <div style="display: block;" class="pane">
                    <div style="height: 51px; top: 0px;" class="slider"></div>
                </div>
                <div style="display: block;" class="pane">
                    <div style="height: 51px; top: 0px;" class="slider"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat md-close" data-dismiss="modal">Cancelar</button>
            <button id=" agregarProducto" type="button" class="btn btn-primary btn-flat md-close" data-dismiss="modal">Agregar</button>
        </div>
    </div>
</div>
<div class="md-overlay"></div>


<script type="text/javascript">

  $(document).ready(function ()
  {
      $('#agregarProducto').onclick = function () {
          id = $("tr.productoFila").last().attr("id");
          id = parseInt(id.substr(8, id.length)) + 1;
          dataKey = $("tr.productoFila").last().attr("data-key");
          actualizarNumero();
          productoNumero = parseInt($("tr.productoFila").last().find("td").first().text()) + 1;
          alert(id);
          fila = '<tr id="producto' + id + '" class="productoFila" data-key="' + dataKey + '"><td>' + productoNumero + '</td><td><label></label></td><td><label>...</label></td><td><input class="form-control" name="cantidad" value="' + $("#ordencompradetalle-cantidad").val() + '" min="1" oninvalid="La cantidad debe ser un numero, igual o mayor a 1." style="width: 60px" type="number"></td><td><div class="input-group"><input class="form-control sin-spinner" name="precio" value="' + $("#ordencompradetalle-punitario").val() + '" readonly="readonly" type="number"><span class="input-group-addon">Bs</span>.</div></td><td><div class="input-group"><input class="form-control sin-spinner" name="iva" value="' + $("#ordencompradetalle-iva").val() + '" readonly="readonly" type="number"><span class="input-group-addon">%</span>.</div></td><td><div class="input-group"><input class="form-control sin-spinner" name="montoIva" value="' + $("#ordencompradetalle-montoiva").val() + '" readonly="readonly" type="number"><span class="input-group-addon">Bs</span>.</div></td><td><div class="input-group"><input class="form-control" name="descuento" value=' + $("#ordencompradetalle-descuento").val() + '" min="0" oninvalid="Descuento debe ser un numero, mayor que 0.." type="number"><span class="input-group-addon">Bs</span>.</div></td><td><div class="input-group"><input class="form-control sin-spinner" name="total497" value="' + $("#ordencompradetalle-total").val() + '" readonly="readonly" style="width: 70px" type="number"><span class="input-group-addon">Bs</span>.</div></td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' + id + '\').hide(\'slow\').remove(); actualizarNumero();" style="cursor: pointer"><i class="fa fa-minus-square"></i> Eliminar</div></td></tr>';
          $("#tablaProductos table tbody").append(fila);
      };
  });

  function actualizarNumero()
  {
      i = 1;
      $("tr.productoFila").each(function ()
      {
          $(this).find("td").first().text("" + i);
          i++;
      });
  }

</script>
