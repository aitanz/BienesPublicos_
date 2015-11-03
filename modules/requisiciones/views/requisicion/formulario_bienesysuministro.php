  <?php
      //formulario de tipo requisicion : bienes y suministros
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\bootstrap\Modal;
use yii\bootstrap\Button;//use yii\grid\GridView;
use app\modules\requisiciones\models\RequisiciondetaSearch;
use app\modules\requisiciones\models\Requisicion;
use app\modules\requisiciones\models\Requisiciondeta;
use app\modules\requisiciones\models\Puc;
use app\modules\requisiciones\models\Cuentapresupuestaria;
use app\modules\requisiciones\models\Unidadmedida;
use app\modules\requisiciones\models\Tipoproducto;
use app\modules\requisiciones\models\Tipopagos;
use app\modules\requisiciones\models\Producto;
use app\modules\requisiciones\models\Categoriaprogramatica;
use app\modules\requisiciones\models\Coordinacion;
//instanciar los modelos

$producto = new Producto();
$coordinacion = new Coordinacion();
$puc = new Puc();
$model = new Requisicion();
$tipoproducto = new Tipoproducto();
$reqDeta = new Requisiciondeta();
$unidadmedida = new Unidadmedida();
$cp = new Cuentapresupuestaria();
$tioproducto = new Tipoproducto;
$capro = new categoriaprogramatica();
//variables de usuarios logueado
$direction = \yii::$app->user->Identity->iddireccion;
$coordination = \yii::$app->user->Identity->idcoordinacion;






/*echo $direction.' iddireccion del usuario <br>';
echo $coordination.' idcoordinacion del usuario del usuario <br>';*/
?>
 <div class="requisicion-form">
    <div class='panel panel-primary'>
        <div class='panel-heading'>
            <h4 align="center">REQUISICIÓN  BIENES Y SUMINISTROS</h4>
        </div>
        <div class='panel-body'>
            <!--aqui va el cuerpo del formulario-->
        
           
            
        <?php
            $form = ActiveForm::begin([ 'id' => 'form_bienesysuministros',
                                        'enableClientValidation' => true,
                                        'enableAjaxValidation' => false,
                                        'validateOnSubmit' => true,
                                        'validateOnChange' => true,
                                        'validateOnType' => true]);?> 
         
        <?= $form->field($tipoproducto, 'descripcion')->dropDownlist(ArrayHelper::map(Tipoproducto::find()->where(['not', ['puc' => null]])->orderBy('descripcion')->all(), 'idtipoproducto', 'descripcion'), ['prompt' => '--seleccion un producto--',
          'onchange' => "$.ajax({
			  sync: false,
			  type: 'POST',
			  cache: false,
			  url: '" . yii\helpers\Url::to(['requisicion/get-productopuc']) . "',
			  beforeSend: function(xhr){
			  /*$('#pcont').block({css:{
					border: 'none',
					padding: '15px',
					backgroundColor: '#000',
					'-webkit-border-radius': '10px',
					'-moz-border-radius': '10px',
					opacity: .5,
					color: '#fff'
				}});*/
			 },
			data: {idtipoproducto: $('#tipoproducto-descripcion').val()},
			error: function(error){
			  error(error);
			  //$('#pcont').unblock();
			},
			success: function(response){
			   response = JSON.parse(response);
				  if( response.success){
			               $('#pucproducto').val(response.llamada);
                                       $('#pucd').val(response.categoria);
                                       $('#oculto1').val(response.idpuc);
                                       $('#oculto2').val(response.llamada);
                                       $('#pucoculto').val(response.llamada);
                                       
				   }
					 else{
					      alert(response.mensaje);
					      //$('#pcont').unblock();
					 }
			}
	   });"])->label('Tipo Producto');?>
            
<label>PUC-PRODUCTO</label>
<input type="text" name="pucproducto" id="pucproducto" class="form-control" readonly="true"> <br>

<!--tabla productos-->
<div class="form-group">
    <label>PRODUCTOS</label>
    <table id="tablaproductosbs" class="table table-hover table-condensed table-striped ">
        <thead>
            <tr bgcolor="#CED8F6">
                <th>#</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Unidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr id="producto" class="productosbs" data-key="0">
                <td style="visibility:hidden;">0</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> AGREGAR PRODUCTOS</button>
</div><br><br>




  <label>IMPUTACIÓN PRESUPUESTARIA</label>
  <table id="tablaip" class="table table-hover table-condensed table-striped ">
      <thead>
          <tr bgcolor="#CED8F6">
              <th>#</th>
              <th>Unidad Ejecutora</th>
              <th>Cuenta</th>
              <th> Descripcion de Cuenta</th>
              <th>Disponible</th>
              <th>Monto</th>
              <th>Opciones</th>
          </tr>
      </thead>
      <tbody>
          <tr id="imputacion" class="ip" data-key="0">
              <td style="visibility:hidden;">0</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

          </tr>
      </tbody>
  </table>
  <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>UNIDAD EJECUTORA</button>

  <br><br>
  
  <?= $form->field($model, 'concepto')->textarea()->label('CONCEPTO'); ?>
  <input type="hidden" name="ocultoidpuc" id="oculto1" > <br>
  <input type="hidden" name="ocultopuc" id="oculto2" >
   <input type="hidden" name="ocultocategoria" id="oculto3" >
  
  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-alert']) ?>
  </div>

          
       </div> <!--panel body-->
    </div> <!--panel primary-->
</div> <!--requisicion-form-->

<? ActiveForm::end(); ?>

<?php /* * *********************************** MODALS ******************************** */ ?>


<?php
$this->beginPage();
$this->beginBody();
?>


                                         <!--modal imputacion-->
<?php
Modal::begin(['header' => '<h3><center>IMPUTACIÓN PRESUPUESTARIA</center></h3>', 'id' => 'modalImputacion',
 "class" => "modal fade bs-example-modal-lg"] );
$form = ActiveForm::begin(['id' => 'form_agregar_imputacion',]);
?>

<div class="container">
    <div class="main row">
        <div class="col-md-5 column">
            <?=
            $form->field($coordinacion, 'nombre')->dropDownlist(Arrayhelper::map(Coordinacion::find()
                                    ->where(['iddireccion' => $direction, 'esdireccion' => 'false'])
                                    ->all(), 'idcoordinacion', 'nombre'), ['prompt' => '--Seleccione--', 'id' => 'ueip',
                                    'onchange' => "$.ajax({
                                                    type: 'POST',
                                                    cache: false,
				                    url: '" . yii\helpers\Url::to(['requisicion/get-unidad']) . "',
				                    data:{idcoordinacion: $('#ueip').val(), 
                                                          idpuc:$('#puc').val(),
                                                          idpuccoordinacion:$('#oculto1').val(),
                                                          puccoordinacion:$('#oculto2').val(),
                                                          },
				                    success: function(response){
				                            response = JSON.parse(response);
					                    if(response.success){
                                                                var puc= $('#pucproducto').val();
                                                                $('#cuentaip').val(response.categoria+puc);
                                                                $('#disponibilidad').val(response.idpuccoordinacion);
                                                                $('#cuentaip').val();
                                                                $('#disponibilidad').val(response.disponible);
                                                                $('#oculto3').val(response.categoria);
                                                                $('#categoriaoculto').val(response.categoria);
                                                                
                                                                var categoriaoculto = $('#oculto3').val();
                                                                console.log(response);
						                //$('#disponibilidad').val(response.disponibilidad);
						             }
						                else{
                                                                   console.log(response);
							           //alert(response.mensaje);
							            //$('#pcont').unblock();
						                 }
					                    }
	});"])->label('Unidad Ejecutora');
            ?>
            
            <label class="label-control">CUENTA</label>
            <input type="text" class="form-control" name="cuenta" id="cuentaip" readonly="true">
            <label class="label-control">DISPONIBLE</label>
            <input type="text" class="form-control" name="disponibilidad" id="disponibilidad" readonly="true">.<br>
            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            <button id="salvarip" type="button" class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
            <button type="reset" class="btn btn-danger" value="reset"> Reset</button>
       </div>

        <div class ="col-md-4 column">
            
        <label>Descripcion de la Cuenta</label>
        <input type="text" id="pucd" class="form-control" readonly="true">
	<?= $form->field($model, 'monto')->textinput(['id' => 'montoip', 'onkeypress' => 'return acceptNum(event)', 'onblur' => 'formateadora();'])->label('monto'); ?>
        <?= $form->field($cp, 'auxiliar')->dropDownlist(Arrayhelper::map(Cuentapresupuestaria::find()->all(), 'auxiliar', 'auxiliar'), ['prompt' => 'ord']);?>
      

        </div>
    </div>
</div>
<?php
ActiveForm::end();
Modal::end(); ?>

                                           <!modal productos-->
<?php
Modal::begin([ 'id' => 'modalAgregarProducto', 'header' => '<h3 align="center">AGREGAR PRODUCTOS</h3>']);

$form = ActiveForm::begin(['id' => 'form_agregar_producto',]);
echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)', 'title' => 'introdusca cantidad']);
echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500, 'title' => 'introduzca descripcion del producto']);
echo $form->field($unidadmedida, 'descripcion')->dropdownList(Arrayhelper::map(Unidadmedida::find()->orderBy('descripcion')->all(), 'idunidadmedida', 'descripcion'), ['prompt' => 'unidades de medida'])->label('Unidades');
echo' <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      <button id="btproductos" type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
      <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';

ActiveForm::end();

Modal::end(); ?>

<!--<script>
    $(document).ready(function(){
        $("#form_agregar_producto").on("submit", function(event) {
            event.preventDefault();
            var cadena = $(this).serialize();
            alert(cadena);
            return false;
        });
    });
</script>-->


<!--
<script type="text/javascript">
$(document).ready(function() {
$('#enviar').click(function(event){
    event.preventDefault();
    var dataString = $('#form_bienesysuministros').serialize();
    var dataString;
    alert(dataString);
    $.ajax({
             datatype:'json',
             type:'post',
             data:{'cadena':'dataString'},
             url: "",
             success:function(response){
               console.log(response);
             },
         })

  });
});
</script>-->

<?php
$this->endBody();
$this->endPage();
?>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#modalImputacion .modal-dialog").addClass("modal-lg");
	});
    </script>
        
     
   <script>
    $(document).ready(function(){
        $("#requisiciondeta-descripcion").blur(function() {
           
            var cadena = $(this).val();
            $("#descripcionoculto").val(cadena);
            alert(cadena);
            return false;
        });
    });
</script>
        



	                  <!-- modal agregar producto-->

	<script type="text/javascript">
	 $(document).ready(function(){
		$("#btproductos").click(function(){
	         var cantidadbs = $("#requisiciondeta-cantidad").val();
                 var descripcionbs = $("#requisiciondeta-descripcion").val();
                 var unidadbs = $("#unidadmedida-descripcion option:selected").text();

                id = $("tr.productosbs").last().attr("id");
                id = Number(id.substr(8, id.length)) + 1;
                dataKey = $("tr.productosbs").last().attr("data-key");
                productoNumero = parseInt($("tr.productosbs").last().find("td").first().text()) + 1;
                $("#tablaproductosbs tbody").append('<tr id="producto' + id + '" class="productosbs" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' +'<input type="text" name="cantidad_bs" id=cantidad_bs' + id + '  class="form-control"  readonly="true"  value="'+cantidadbs+'">'+ '</td><td>' +'<input type="text" name="descripcion_bs" id=descripcion_bs' + id + '   class="form-control" readonly="true" value="'+descripcionbs+'">'+ '</td><td>' +'<input type="text" name="unidades_bs" class="form-control" id=unidades_bs' + id + ' readonly="true"  value="'+unidadbs+'">'+ '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
		});
	});
	</script>

  <script type="text/javascript">

    /*modal unidad ejecutora- bienes y suministros*/

    $(document).ready(function() {
        $("#salvarbs").click(function() {
            var valor1 = $("#modaluebs option:selected").text();
            var valor2 = $("#categoriaprogramatica-bs").val();

            id = $("tr.uebs").last().attr("id");
            id = Number(id.substr(7, id.length)) + 1;
            dataKey = $("tr.uebs").last().attr("data-key");
            unidadeNumero = parseInt($("tr.uebs").last().find("td").first().text()) + 1;
            $("#tablauebs tbody").append('<tr id="unidade' + id + '" class="uebs" data-key="' + dataKey + '"><td>' + unidadeNumero + '</td><td>' + '<input type="text" name="unidad_bs" id=unidad_bs' + id + ' readonly="true" class="form-control" value="' + valor1 + '">' + '</td><td>' + '<input type="text" name="actividad_bs"  id=actividad_bs' + id + ' readonly="true" class="form-control" value="' + valor2 + '">' + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#unidade' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
        });

    });

</script>

<script type="text/javascript">

    /*modal imputacion presupuestaria*/

    $(document).ready(function() {
        $("#salvarip").click(function() {
            var ueip = $("#ueip option:selected").text();
            var cuentaip = $("#cuentaip").val();
            var dcuentaip = $("#pucd").val();
            var disponibleip = $("#disponibilidad").val();
            var montoip = $("#montoip").val();

            id = $("tr.ip").last().attr("id");
            id = Number(id.substr(10, id.length)) + 1;
            dataKey = $("tr.ip").last().attr("data-key");
            productoNumero = parseInt($("tr.ip").last().find("td").first().text()) + 1;
            $("#tablaip tbody").append('<tr id="imputacion' + id + '" class="ip" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' + '<input type="text" name="unidad_ejecutora_bs" id=unidad_ejecutora_bs' + id + '   readonly="true" class="form-control" value="' + ueip + '">' + '</td><td>' + '<input type="text" name="cuentaip" id=cuentaip' + id + ' readonly="true" class="form-control" value="' + cuentaip + '">' + '</td><td>' + '<input type="text" name="dcuentaip"  id=dcuentaip' + id + ' value="' + dcuentaip + '" class="form-control" readonly="true" >' + '</td><td>' + '<input type="text" class="form-control" value="' + disponibleip + '" readonly="true" name="disponible" id=disponibilidad' + id + '>' + '</td><td>' + montoip + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#imputacion' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');


        });
    });

</script>
