	<?php

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\ArrayHelper;
	use app\modules\requisiciones\models\Proveedor;
	use app\modules\requisiciones\models\Tipopagos;
	use app\modules\requisiciones\models\Producto;
        use app\modules\requisiciones\models\RequisiciondetaSearch;
	use app\modules\requisiciones\models\Requisiciondeta;
	use app\modules\requisiciones\models\Puc;
	use app\modules\requisiciones\models\Cuentapresupuestaria;
	use app\modules\requisiciones\models\Unidadmedida;
	use app\modules\requisiciones\models\Tipoproducto;
	use app\modules\requisiciones\models\Categoriaprogramatica;
	use yii\jui\AutoComplete;
	use yii\bootstrap\Modal;
	use yii\web\JsExpression;
	//use yii\bootstrap\Button;
	//use yii\grid\GridView;
	

	?>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<?php $prove = new Proveedor(); ?>



	<script>
	                            /*modal-detalles*/
  $(document).ready(function (){
      $("#salvar2").click(function (){
        valorc = $("#requisiciondeta-cantidad").val();
        valord = $("#requisiciondeta-descripcion").val();
        valorm = parseFloat($("#requisicion-monto").val());
            if (valorc == ""){
                alert("Campo cantidad esta vacio!");
                $("#requisiciondeta-cantidad").focus();
                return false;
            }
                else if (valord == ""){
                    alert(" campo descripcion esta  vacioo! ");
                   $("#requisiciondeta-descripcion").focus();
                  return false;
              }
              else if (valorm == "") {
                  alert("campo monto esta vacio !!");
                  $("#requisicion-monto").focus();
                  return false;
              }

              id = $("tr.productoFila").last().attr("id");
              id = Number(id.substr(8, id.length)) + 1;
              dataKey = $("tr.productoFila").last().attr("data-key");
              productoNumero = parseInt($("tr.productoFila").last().find("td").first().text()) + 1;
              fila = '<tr id="detalles' + id + '" class="productoFila" data-key="' + dataKey + '"><td>' + productoNumero + '</td><td>' + '<input type="text" id=cantidad_administrativa' + id + '  readonly="true" value="' + valorc + '" class="form-control">' + '</td> <td> ' + '<input type="text" id=descripcion_administrativa' + id + '  readonly="true" value="' + valord + '" class="form-control">' + '</td> <td>' + valorm + '</td> <td> <div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#detalles' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td> </tr>';
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
	         $("#tablauebs tbody").append('<tr id="unidade' + id + '" class="uebs" data-key="' + dataKey + '"><td>' + unidadeNumero + '</td><td>' + '<input type="text" name="uni" id=unidad_administrativa' + id + ' readonly="true" class="form-control" value="' + valor1 + '">' + '</td><td>' + '<input type="text" name="uni"  id=actividad_administrativa' + id + ' readonly="true" class="form-control" value="' + valor2 + '">' + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#unidade' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
	        });

	    });

	</script>


    	<script type="text/javascript">

/*modal imputacion presupuestaria*/
    $(document).ready(function(){
      $("#salvarip").click(function (){
         var ueip =$("#ueip option:selected").text();
         var cuentaip =$("#cuentaip").val();
         var dcuentaip =$("#pucd").val();
         var disponibleip =$("#disponibilidad").val();
         var montoip =$("#montoip").val();

            id = $("tr.ip").last().attr("id");
            id = Number(id.substr(10, id.length)) + 1;
            dataKey = $("tr.ip").last().attr("data-key");
            productoNumero = parseInt($("tr.ip").last().find("td").first().text())+1;
            $("#tablaip tbody").append('<tr id="imputacion' + id + '" class="ip" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' +'<input type="text" name="uni" id=ue_imputacion' + id + ' readonly="true" class="form-control" value="' + ueip + '">'+ '</td><td>' +'<input type="text" name="uni" id=cuentaip' + id + ' readonly="true" class="form-control" value="' + cuentaip + '">'+ '</td><td>' + '<input type="text" id=dcuentaip' + id + ' class="form-control" readonly="true" value="'+dcuentaip+'">' + '</td><td>' +'<input type="text"  id=disponible_ip' + id + ' value="'+disponibleip+'" class="form-control" readonly="true">'+ '</td><td>' +'<input type="text"   id=monto_ip' + id + '  readonly="true" class="form-control" value="'+montoip+'">'+ '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#imputacion' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
        });
    });

</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#modalImputacion .modal-dialog").addClass("modal-lg");
});
</script>




<!--formulario tipo de requisicion administrativa-->
<div class="requisicion-form">
    <div class='panel panel-primary'>
        <div class='panel-heading'>
		<h4 align="center">REQUISICIÓN ADMINISTRATIVA</h4>
        </div>
        <div class='panel-body'>
          <?php $form4 = ActiveForm::begin([ 'id' => 'form_administrativa',
				    'enableClientValidation' => true,
				    'enableAjaxValidation' => false,
				    'validateOnSubmit' => true,
				    'validateOnChange' => true,
				    'validateOnType' => true,]);?>

            <?= $form4->field($tp, 'idpuc')->dropDownList(ArrayHelper::map(Tipopagos::find()->where(['administrativa'=>'true'])->orderBy('descripcion')->all(),
                       'idtipopago', 'descripcion'), [ 'prompt' => '---Selecciona un tipo de pago---', 'id' => 'tppuc',
            'onchange' => "$.ajax({
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
				else
			             alert(response.mensaje);
			            //$('#pcont').unblock();
				                }
            });"])->label('TIPO DE PAGO');?>

        <!--tabla unidad ejecutora-->

        <div class="form-group">
        <label>UNIDAD EJECUTORA</label>
        <table id="tablauebs"  class="table table-hover table-condensed table-striped ">
            <thead>
                <tr bgcolor="#CED8F6">
                    <th>#</th>
                    <th>Unidad Ejecutora</th>
                    <th>Actividad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr id="unidade" class="uebs" data-key="0">
                  <td style="visibility:hidden;">0</td>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
           </tbody>
        </table>
        <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalunidadEjecutora"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>UNIDAD</button>
        </div> <br><br>

	<!--tabla inputacion presupuestaria bs-->
        <div class="form-group">
	  <label>IMPUTACIÓN PRESUPUESTARIA</label>
            <table id="tablaip"  class="table table-hover table-condensed table-striped ">
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
	<button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>IMPUTACIÓN</button>
        </div><br><br><!--form-group-->



        <!-- autocompletado -->

        <label>DATOS DE BENEFICIARIO</label>
        <div class="form-group">
        <div class="input-group">
    	<div class="input-group-addon" title="introdusca código "> Código:</div>

	<?php
	echo AutoComplete::widget([
	     'name' => "buscarProveedor",
             'id' => 'label',
	     'clientOptions' => [ 'label' => 'id', 'razonsocial', 'rif',
	     'source' => yii\helpers\Url::toRoute("requisicion/buscar-proveedor"),
	     'autoFill' => true,
	     'select' => new \yii\web\JsExpression("function( event, ui ) {
             $(\"#beneficiario\").val(ui.item.label);
             }") ],
	]); ?>


  	</div><!--input group-->
        </div><!--form-group-->
        <div class="form-group">
        <?= $form4->field($prove, 'razonsocial')->textInput(['id' => 'beneficiario', 'readonly' => 'readonly'])->label('RazonSocial'); ?>
        </div>

        <br>
        <?= $form4->field($model, 'concepto')->textarea()->label('Concepto'); ?>
        <br>

         <!-- tabla Detalles-->
        <div id="grilla" class="grid-view">
        <div> <label>DETALLES</label></div>
        <table id="tgrilla"   class="table table-hover table-condensed table-striped ">
            <thead bgcolor="#CED8F6" >
                <tr>
                    <th>#</th>
                    <th>Cantidad</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                    <th> Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr id="producto" class="productoFila" data-key="0">
                    <td style="visibility:hidden;">0</td>
                    <td></td>
                    <td></td>
                    <td> </td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
        </div><!--div id grilla-->

         <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modal_agregar_detalles"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>DETALLES</button>
        <br><br>

        <div class="form-group">
        <label for="result">Resultado</label>
        <input type="text"  size="200px"  class="form-control"  name="result" id="result" readonly="readonly"/>
        </div>


        </div><!--panel-body-->
        </div> <!--panel-primary-->
        </div> <!--requisicion-form-->

        <? ActiveForm::end(); ?> <!--cerrar el form Action-->

<?php /*********************************** MODALS ******************************** */ ?>

<?php
$this->beginPage();
$this->beginBody();
?>

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
echo '<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
<button id="salvarbs" type="button" class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
<button type="reset" class="btn btn-danger" value="reset"> Reset</button>';

ActiveForm::end();
Modal::end();
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
				});"])->label('Unidad Ejecutora');?>
            
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
            <?= $form->field($cp, 'auxiliar')->dropDownlist(Arrayhelper::map(Cuentapresupuestaria::find()->all(), 'auxiliar', 'auxiliar'), ['prompt' => 'ord']);
            ?>

        </div>
    </div>
</div>
<?php
ActiveForm::end();
Modal::end(); ?>


	<!-- modal Agregar Detalle-->

<?php
Modal::begin(['header' => '<h3 align="center">Agregar Detalle</h3>', 'id'=>'modal_agregar_detalles']);
$form = ActiveForm::begin(['id'=>'agregar_detalles']);
echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)']);
echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500]);
echo $form->field($model, 'monto')->textInput(['onkeypress' => 'return acceptNum(event)', 'onchange' => 'format(this)']);
echo'<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
     <button id="salvar2" type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
     <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';
ActiveForm::end();
Modal::end();?>

<?php
$this->endBody();
$this->endPage();
?>

        
          //$query->select('max((CAST (secuencia AS integer)))')
              //$query->select('max(secuencia) as secuencia')