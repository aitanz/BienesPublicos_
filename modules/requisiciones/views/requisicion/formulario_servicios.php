<?php
use yii\helpers\Html;                //formulario de tipo requisicion : servicios
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\requisiciones\models\Proveedor;
use app\modules\requisiciones\models\Tipopagos;
use app\modules\requisiciones\models\Producto;
use app\modules\requisiciones\models\Categoriaprogramatica;
use app\modules\requisiciones\models\RequisiciondetaSearch;
use app\modules\requisiciones\models\Requisiciondeta;
use app\modules\requisiciones\models\Puc;
use app\modules\requisiciones\models\Cuentapresupuestaria;
use app\modules\requisiciones\models\Unidadmedida;
use app\modules\requisiciones\models\Tipoproducto;
use yii\jui\AutoComplete;
use yii\bootstrap\Modal;
//use yii\bootstrap\Button;
//use yii\grid\GridView;
$cp = new Cuentapresupuestaria();
$unidadmedida = new unidadmedida();
$tp = new Tipopagos();
$puc = new Puc();?>


<!--formulario servicios-->

<div class="servicio-form">
    <div class='panel panel-primary'>
        <div class='panel-heading'>
            <h4 align="center">REQUISICIÓN SERVICIOS</h4>
        </div>
        <div class='panel-body'>
        <?php 
         $form3 = ActiveForm::begin(['id' => 'form_servicios',
                                     'enableClientValidation' => true,
                                     'enableAjaxValidation' => false,
                                     'validateOnSubmit' => true,
                                     'validateOnChange' => true,
                                     'validateOnType' => true,]);?>


        <?= $form3->field($tp,'idpuc')->dropDownList(ArrayHelper::map(Tipopagos::find()->where(['servicio'=>'true'])->orderBy('descripcion')->all(), 'idtipopago', 'descripcion'), [ 'prompt' => '---Selecciona un tipo de pago---', 'id' => 'tppuc',
                    'onchange' => " $.ajax({
			                    sync: false,
			                    type: 'POST',
			                    cache: false,
			                    url: '" . yii\helpers\Url::to(['requisicion/get-tipopagoip']) . "',
		                            data:{idtipopago: $('#tppuc').val()},
			                    success: function(response) {
			                    response = JSON.parse(response);
				            if(response.success){
				                                $('#pucd').val(response.descripcion);
                                                                }
				                                   else{
                                                                      alert(response.mensaje);
					                             //$('#pcont').unblock();
                                                                   }
					                       
				                            }
                                        });"])->label('TIPO DE PAGO');?>
              
              
        <!--tabla unidad ejecutora-->
        <div class="form-group">
        <label>UNIDAD EJECUTORA</label>
        <table id="tablaUnidadEjecutora" class="table table-hover table-striped table-condensed">
            <thead>
                <tr bgcolor="#CED8F6">
                    <th>#</th>
                    <th>Unidad Ejecutora</th>
                    <th>Actividad</th>
                    <th>Opciones</th>
                    </tr>
            </thead>
                <tbody>
                    <tr id="unidads" class="ue" data-key="0">
                        <td style="visibility:hidden;">0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
        </table>
        <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalunidadEjecutora"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>UNIDAD EJECUTORA</button>
        </div><br><br>

        <!--tabla inputacion presupuestaria bs-->
        <div class="form-group">

        <label>IMPUTACIÓN PRESUPUESTARIA</label>
        <table id="tablaip"  class="table table-hover table-striped table-condensed">
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
                        <td style="visibility:hidden;"> 0</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
        </table>
        <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>IMPUTACIÓN </button>
        </div>

        <?= $form3->field($model,'concepto')->textarea()->label('CONCEPTO');  ?> <br><br>
       
        <!-- tabla Detalles-->

         </div>  <!--panel body-->
	 </div>  <!--panel primary-->
	 </div>  <!--servicio-form-->


<? ActiveForm::end(); ?>

<!-- modal Unidad Ejecutora -->
<?php
Modal::begin(['header' => '<h3><center>Agregar Unidad Ejecutora</center></h3>', 'id' => 'modalunidadEjecutora']);

$form = ActiveForm::begin(['id' => 'form_agregar_categoria',]);
echo $form->field($capro, 'idcategoriaprogramatica')->dropDownlist(ArrayHelper::map(Categoriaprogramatica::find()->orderBy('descripcion')->all(), 'idcategoriaprogramatica', 'descripcion'), ['prompt' => 'unidad-ejecutora', 'id' => 'modaluebs',
    'onchange' => "$.ajax({
			sync: false,
			type: 'POST',
			cache: false,
			url: '" . yii\helpers\Url::to(['requisicion/get-actividad']) . "',
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
			data: {idcategoriaprogramatica: $('#modaluebs').val()},
			error: function(error){
			  error(error);
			  //$('#pcont').unblock();
			},
			success: function(response){
			   response = JSON.parse(response);
				  if( response.success){
					$('#categoriaprogramatica-bs').val(response.categoria);
				   }
					 else{
						  alert(response.mensaje);
						  //$('#pcont').unblock();
					 }
			}
	   });"])->label('Unidad Ejecutora');
        echo $form->field($capro, 'categoriaprogramatica')->textinput(['readonly' => 'readonly', 'id' => 'categoriaprogramatica-bs'])->label('Actividad');
        echo' <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
	      <button id="salvar_ues" type="button" class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
	      <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';

	ActiveForm::end();
	Modal::end();
	?>

<!--modal imputacion-->
<?php
Modal::begin(['header' => '<h3><center>IMPUTACIÓN PRESUPUESTARIA</center></h3>', 'id' => 'modalImputacion',
 "class" => "modal fade bs-example-modal-lg"] );
$form = ActiveForm::begin(['id' => 'form_agregar_imputacion',]); ?>

<div class="container">
    <div class="main row">
        <div class="col-md-5 column">
            <?= $form->field($capro, 'idcategoriaprogramatica')->dropDownlist(Arrayhelper::map(Categoriaprogramatica::find()->all(), 'idcategoriaprogramatica', 'descripcion'), ['prompt' => 'Unidad Ejecutora ip', 'id' => 'ueip',
                'onchange' => " $.ajax({
				  type: 'POST',
				  cache: false,
				  url: '" . yii\helpers\Url::to(['requisicion/get-unidad']) . "',
				  data: {idcategoriaprogramatica: $('#ueip').val(), idpuc : $('#puc').val()},
				  success: function(response){
				  response = JSON.parse(response);
					   if( response.success){
						  $('#cuentaip').val(response.cat);
						  $('#disponibilidad').val(response.disponibilidad);
						}
						  else{
							  alert(response.mensaje);
							  //$('#pcont').unblock();
							  }
					}
			});"])->label('Unidad Ejecutora'); ?>
            <label class="label-control">CUENTA</label>
            <input type="text" class="form-control" name="cuenta" id="cuentaip" readonly="true">
            <label class="label-control">DISPONIBLE</label>
            <input type="text" class="form-control" name="disponibilidad" id="disponibilidad" readonly="true">.<br>
            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            <button id="salvarip" type="button" class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
            <button type="reset" class="btn btn-danger" value="reset"> Reset</button>
       </div>

        <div class ="col-md-4 column">

        <?= $form->field($puc, 'descripcion')->textinput(['id' => 'pucd', 'readonly' => 'readonly'])->label('Descripcion de cuenta'); ?>
	<?= $form->field($model, 'monto')->textinput(['id' => 'montoip', 'onkeypress' => 'return acceptNum(event)', 'onblur' => 'formateadora();'])->label('monto'); ?>
        <?= $form->field($cp, 'auxiliar')->dropDownlist(Arrayhelper::map(Cuentapresupuestaria::find()->all(), 'auxiliar', 'auxiliar'), ['prompt' => 'ord']); ?>

        </div>
    </div>
</div>
<?php
ActiveForm::end();
Modal::end();
?>



<?php
$this->beginPage();
$this->beginBody(); ?>

<?php
Modal::begin([ 'id' => 'modal_Agregar_detalles', 'header' => '<h3 align="center">AGREGAR PRODUCTOS</h3>']);

$form = ActiveForm::begin(['id' => 'form_agregar_producto',]);
echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)', 'title' => 'introdusca cantidad']);
echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500, 'title' => 'introduzca descripcion del producto']);
echo $form->field($model, 'monto')->textInput(['onkeypress' => 'return acceptNum(event)']);
echo' <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      <button id="salvar_detalless" type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
      <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';

ActiveForm::end();

Modal::end(); ?>
<div id="respuesta"></div>
<?php
$this->endBody();
$this->endPage();
?>

<script type="text/javascript">
  /*modal unidad ejecutora*/
  $(document).ready(function() {
     $("#salvar_ues").on('click', function() {
       valor1 = $("#modaluebs option:selected").val();
       valor3 = $("#modaluebs option:selected").val();
       valor2 = $("#categoriaprogramatica-bs").val();
         if (valor2 == ""){
	    alert("Actividad no puede estar vacio");
	    $("#categoriaprogramatica-categoriaprogramatica").focus();
	    return false;
	  }
            id = $("tr.ue").last().attr("id");
	    id = Number(id.substr(7, id.length)) + 1;
	    dataKey = $("tr.ue").last().attr("data-key");
	    productoNumero = parseInt($("tr.ue").last().find("td").first().text()) + 1;
            $.ajax({
	            type: 'POST',
		    async: false,
	            cache: false,
		    url: '<?= yii\helpers\Url::to(['requisicion/get-productopuc']) ?>',
			     data: { rowId: id, categoria:valor3},
		    	     success: function(response){
			     response = JSON.parse( response );
			      if( response.success ){
			         var html = response.mensaje;
				 $("#respuesta").html(html);
				 alert( $("#respuesta").find("tr").html());
				 $("#tablaUnidadEjecutora tbody").append($("#respuesta").find("tr").html());
					//$("#respuesta").html("");
	                      }
                              else{
                                   alert(response.mensaje);
				}
			    }
		    });



  /*$("#tabla tbody").append('<tr id="unidads' + id + '" class="ue" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' +'<input type="text" id= unidadejecutora_s' + id + ' value="'+valor1+'" class="form-control" readonly="true">'+ '</td><td>' +'<input type="text" id= categoria_s'+id+'  value="'+valor2+'" class="form-control" readonly="true">'+ '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#unidads' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
  */
	});
    
    $("#salvar_detalless").click(function (){
        valorc = $("#requisiciondeta-cantidad").val();
        valord = $("#requisiciondeta-descripcion").val();
        valorm = parseFloat($("#requisicion-monto").val());
            if (valorc == ""){
	       alert("Campo cantidad esta vacio!");
	       $("#requisiciondeta-cantidad").focus();
	       return false;
	     }
	        else if(valord == ""){
		       alert(" campo descripcion esta  vacioo! ");
		       $("#requisiciondeta-descripcion").focus();
		       return false;
		   }
		    else if (valorm == ""){
		     alert("campo monto esta vacio !!");
		     $("#requisicion-monto").focus();
		     return false;
		    }
		id = $("tr.productoFila").last().attr("id");
		id = Number(id.substr(8, id.length)) + 1;
		dataKey = $("tr.productoFila").last().attr("data-key");
		productoNumero = parseInt($("tr.productoFila").last().find("td").first().text()) + 1;
		fila = '<tr id="detalles' + id + '" class="productoFila" data-key="' + dataKey + '"><td>' + productoNumero + '</td><td>' + '<input type="text"  id="cantidad_s' + id + '"readonly="true" class="form-control" value="'+valorc+'" >' + '</td> <td> ' +'<input type="text" id="descripcion_s' + id + '" readonly="true" class="form-control" value="'+valord+'" >'+ '</td> <td>' + valorm + '</td> <td> <div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#detalles' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td> </tr>';
		$("#grilla table tbody").append(fila);
		suma = 0;
		$('#tgrilla tr.productoFila').each(function () //funcion suma
		{
			suma += Number($(this).find('td').eq(3).text());
			// lenguaje español
                                numeral.language('Es', {
                                    delimiters: {
                                        thousands: '.',
                                        decimal: ','
                                    },
                                    ordinal: function (number) {
                                        return number === 1 ? 'er' : 'ème';
                                    },
                                    currency: {
                                        symbol: '€'
                                    }
                                });
                                // switch between languages
                                numeral.language('Es');
                                num = numeral(suma).format('0,0.00');
                            });
                            $("#result").val(num).css('color', 'black');
                        });

	$("#salvarip").click(function ()
	{
		var ueip =$("#ueip option:selected").text();
		var cuentaip =$("#cuentaip").val();
		var disponibleip =$("#disponibilidad").val();
		var dcuentaip =$("#pucd").val();
		var montoip=$("#montoip").val();


		id = $("tr.ip").last().attr("id");
		id = Number(id.substr(11, id.length)) + 1;
		dataKey = $("tr.ip").last().attr("data-key");
		productoNumero = parseInt($("tr.ip").last().find("td").first().text()) + 1;

		$("#tablaip tbody").append('<tr id="imputacions' + id + '" class="ip" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' +'<input type="text" id="ue_s' + id + '"  value="'+ueip+'" class="form-control" readonly="true">' + '</td><td>' + '<input type="text" id="cuenta_s' + id + '" value="'+cuentaip+'" class="form-control" readonly="true">' + '</td><td>' + '<input type="text" id="dcuentaip_s' + id + '" class="form-control"  value="'+dcuentaip+'"readonly="true" >' + '</td><td>' +'<input type="text" value="'+disponibleip +'" id="disponibleip_s' + id + '"  class="form-control" readonly="true">'+ '</td><td>' +'<input type="text" id="montoip_s' + id + '" readonly="true" value="'+montoip+'" class="form-control" >'+ '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#imputacions' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
	});
	$("#modalImputacion .modal-dialog").addClass("modal-lg");
});
	</script>