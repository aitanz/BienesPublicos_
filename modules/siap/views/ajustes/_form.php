<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\siap\models\Tipomovimiento;

$tipoMovimiento = new Tipomovimiento();
/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\Ajustes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ajustes-form">

    <?php
    $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'validateOnType' => true,
    ]);
    ?>

    <a class="btn btn-success" href="#" id="aBuscarDocumento" onclick="$('#aBuscarDocumento').show(function ()
          {
              $(this).hide('slow');
              $('#divDocumento').show('slow');
          });">Buscar Documento</a>

    <div class="block-flat loader" id="divDocumento">
        <div class="header">
            <h1 onclick="$('#divDocumento').hide(function ()
                  {
                      $(this).hide('slow');
                      $('#aBucarDocumento').show('slow');
                  });">Datos Del Movimiento</h1>
        </div>

        <div class="form-group content formulario">
            <div class="">
                <?= $form->field($tipoMovimiento, 'idtipomovimiento')->dropDownList(yii\helpers\ArrayHelper::map($tipoMovimiento->find()->where('idtipomovimiento in (5,6,11,12,13,20)')->all(), 'idtipomovimiento', 'descripcion'), ['prompt' => 'Seleccione el Tipo de Documento']) ?>
            </div>

            <div class="form-group tipoModificacion required">
                <?= Html::label('Tipo De Ajuste', 'tipoAjuste', [ 'class' => 'control-label']) ?>
                <?=
                Html::dropDownList('tipoAjuste', NULL, [
                    '1' => 'Cambio de Fecha',
                    '2' => 'Otro',
                        ], [
                    'id' => 'tipoAjuste',
                    'class' => 'form-control',
                    'prompt' => 'Seleccione el tipo de ajuste'
                ])
                ?>
            </div>


            <?php $model = new app\modules\siap\models\Ajustes(); ?>

            <?= $form->field($model, 'id_ajuste')->textInput()->label('Id Documento') ?>


            <?=
            Html::a('Cargar Documento', null, [
                'title' => Yii::t('yii', 'Cargar Documento'),
                'onclick' => "cargarDocumento();",
                'class' => 'btn btn-primary'
            ]);
            ?>
        </div>
    </div>

    <div class="block-flat" id="datosMovimiento">

    </div>

    <div class="form-group" id="ajusteDiv">

    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">

  $(document).ready(function ()
  {
      App.init();
      //$('.md-trigger').modalEffects();
      $("#datosMovimiento").hide();
      $("#aBuscarDocumento").hide();
  });

  function actualizarTotalProductoAgregar()
  {
      try
      {
          cantidad = $("#ordencompradetalle-cantidad").val();
          iva = $("#ordencompradetalle-iva").val();
          descuento = $("#ordencompradetalle-descuento").val();
          precioUnitario = $("#ordencompradetalle-punitario").val();
          $("#ordencompradetalle-montoiva").val((precioUnitario * iva) / 100);
          $("#ordencompradetalle-total").val(cantidad * precioUnitario);
      }
      catch (Ex)
      {
          $.gritter.add({
              title: 'Error',
              text: "Debe ingresar solo numeros.",
              class_name: 'danger',
              icon: 'times-circle'
          });
      }
  }

  function agregarProducto()
  {

  }

//        
//        function informacionProducto()
//        {
//            $.ajax({
//                sync: false,
//                type: 'POST',
//                cache: false,
//                url: '<?= yii\helpers\Url::to(['/producto/informacion-producto']) ?>',
//                data: { producto: $("#ordencompradetalle-idproducto").val() },
//                error: function(error) {
//                    error(error);
//                },
//                success: function(response) {
//                    res = JSON.parse(response);
//                    if (res.success)
//                    {
//                        $("#ordencompradetalle-punitario").val( res.producto. );
//                        $("#ordencompradetalle-iva").val( res.producto. );
//                        $("#ordencompradetalle-montoiva").val( res.producto. );
//                        $("#ordencompradetalle-descuento").val( res.producto. );
//                    }
//                    else
//                    {
//                        $.gritter.add({
//                            title: 'Error',
//                            text: res.mensaje,
//                            class_name: 'danger',
//                            icon: 'times-circle'
//                        });
//                    }
//                    $('#contenido').unblock();
//                }
//            });
//        }

  function cargarDocumento()
  {
      try
      {
          if ($("#ajustes-id_documento").val() !== "" && $("#tipomovimiento-idtipomovimiento").val() !== "" && $("#tipoModificacion").val() !== "")
          {
              $.ajax({
                  sync: false,
                  type: 'POST',
                  cache: false,
                  url: '<?= yii\helpers\Url::to(['ajustes/cargar-documento']) ?>',
                  beforeSend: function (xhr)
                  {
                      $("#datosMovimiento").hide();
                      $('#contenido').block({css: {
                              border: 'none',
                              padding: '15px',
                              backgroundColor: '#000',
                              '-webkit-border-radius': '10px',
                              '-moz-border-radius': '10px',
                              opacity: .5,
                              color: '#fff'
                          }});

                  },
                  data: {documento: $("#ajustes-id_ajuste").val(), tipoMovimiento: $("#tipomovimiento-idtipomovimiento").val(), tipoAjuste: $("#tipoAjuste").val()},
                  error: function (error) {
                      error(error);
                      $('#contenido').unblock();
                  },
                  success: function (response) {
                      res = JSON.parse(response);
                      if (res.success)
                      {
                          $("#datosMovimiento").empty().html(res.html);
                          $("#divDocumento").hide("slow");
                          $("#datosMovimiento").show("slow");
                          $('#aBuscarDocumento').show('slow');
//                            App.init();
                          $('.md-trigger').modalEffects();
                          $.gritter.add({
                              title: 'Exito',
                              text: res.mensaje,
                              class_name: 'success',
                              icon: 'check'
                          });
                      }
                      else
                      {
                          $.gritter.add({
                              title: 'Error',
                              text: res.mensaje,
                              class_name: 'danger',
                              icon: 'times-circle'
                          });
                      }
                      $('#contenido').unblock();
                  }
              });
              return false;
          }
          else
          {
              //alert("Debe seleccionar el tipo de documento e indicar el numero");
              $.gritter.add({
                  title: 'Error',
                  text: 'Debe seleccionar el tipo de movimiento, tipo de modificación e indicar el número.',
                  class_name: 'danger',
                  icon: 'times-circle'
              });
          }
      }
      catch (ex)
      {
          alert(ex.message);
          $('#contenido').unblock();
      }
  }
</script>
