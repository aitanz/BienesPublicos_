<?php
                         //formulario de tipo requisicion : bienes y suministros

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\widgets\AlertBlock;
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
use kartik\widgets\Select2;
use yii\grid\GridView;
//instanciar los modelos
use yii\helpers\Url;
$producto = new Producto();
$coordinacion = new Coordinacion();
$tipoproducto = new Tipoproducto();
$reqDeta = new Requisiciondeta();
$unidadmedida = new Unidadmedida();
$cp = new Cuentapresupuestaria();
$tp = new Tipopagos();
$capro = new Categoriaprogramatica();
//variables de usuarios logueado
$direction = \yii::$app->user->Identity->id_direccion;
//$coordination = \yii::$app->user->Identity->idcoordinacion; ?>       


<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
         <li class="active"><a href="#tab_1" data-toggle="tab">BIENES Y SUMINISTROS</a></li>
         <li><a href="#tab_2" data-toggle="tab" value="1" id="tipo_requisicion" >SERVICIOS</a></li>
         <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class='panel panel-primary'>
              <div class='panel-heading'>
                 <h4 align="center">REQUISICIÓN  BIENES Y SUMINISTROS</h4>
              </div>
            <div class='panel-body'>
            <div class="requisicion-form">
            <?php $form = ActiveForm::begin(); ?>
            <?php $fecha = date('d-m-Y'); ?>
                
              <div class="main row">
                    <div class="col col-md-2 ">            
                     <?=$form->field($model, 'fecha')->textInput(array('value' => $fecha, 'readonly' => 'readonly'));?>
                    </div>
                  
                    <div class="col col-md-4 ">  </div>
                    <div class="col col-md-4 ">  </div>
                  
                  <div class="col col-md-2 ">
                      <label>Secuencia:</label>
                      <input type="text" readonly="true" id="numerorequisicion" class="form-control" placeholder="numero de control">
                  </div>
              </div>
           
            <?= $form->field($model, 'idtipoproducto')->dropDownlist(ArrayHelper::map(Tipoproducto::find()->where(['not', ['puc' => null]])->orderBy('descripcion')->all(), 'idtipoproducto', 'descripcion'), ['prompt' => '--seleccion un producto--',
             'onchange' => "$.ajax({
			  sync: false,
			  type: 'POST',
			  cache: false,
			  url: '" . yii\helpers\Url::to(['requisicion/get-productopuc']) . "',
			  data: {idtipoproducto: $('#requisicion-idtipoproducto').val()},
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
				     $('#pcont').unblock();
				}
			}
	   });"])->label('Tipo Producto');?>
            <?= $form->field($model,'puc')->textinput(['readonly'=>'true' ,'id'=>'pucproducto']);?>
            <?= $form->field($model, 'concepto')->textarea(['maxlength' => true]) ?>
                
                
      
            
                
                
                
                
            <?php ActiveForm::end(); ?>
            
            <div class="panel panel-primary">
            <div class="panel-heading">AGREGAR PRODUCTOS</div>
            <div class="panel-body">
                                                            <!--tabla productos-->
            <form id="form_producto">
             <table id="tablaproductosbs" class="table table-hover table-condensed table-striped ">
             <thead>
             <tr bgcolor="#CED8F6">
                <th>#</th> <th>Cantidad</th> <th>Producto</th> <th>Unidad</th> <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <tr id="producto" class="productosbs" data-key="0">
                <td style="visibility:hidden;">0</td>
                <td></td> <td></td>
                <td></td> <td></td>
            </tr>
            </tbody>
            </table>
              <input type="hidden" name="onumerorequisicio" id="onumerorequisicion"> 
         </form>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> AGREGAR PRODUCTOS</button>
            <br><br><br>
            </div>
            </div>
            <div class="panel panel-primary">
            <div class="panel-heading">IMPUTACION PRESUPUESTARIA</div>
            <div class="panel-body">
                                                    <!--tabla imputacion -->
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
              <td></td> <td></td> <td></td>
              <td></td> <td></td><td></td>
            </tr>
            </tbody>
            </table>
            <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>IMPUTACION</button>

           <br><br>
             <div class="form-group pull-right">
                 <label>total</label>    
                   <input type="text" name="monto"  id="monto" class="form-control" readonly="true"placeholder="total"> 
             </div>
            </div><!--panel body-->
             </div><!--panel primary-->
            <input type="hidden" name="ocultoidpuc" id="oculto1" > <br>
            <input type="hidden" name="ocultopuc" id="oculto2" >
            <input type="hidden" name="ocultocategoria" id="oculto3" >                                           

           </div><!requisicion-form-->
  
                                                           <!modal productos-->
            <?php
            Modal::begin([ 'id' => 'modalAgregarProducto', 'header' => '<h3 align="center">AGREGAR PRODUCTOS</h3>']);

            $form = ActiveForm::begin(['id'=>'productosform']);
            echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)', 'title' => 'introdusca cantidad']);
            echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500, 'title' => 'introduzca descripcion del producto']);
            echo $form->field($unidadmedida, 'descripcion')->dropdownList(Arrayhelper::map(Unidadmedida::find()->orderBy('descripcion')->all(), 'idunidadmedida', 'descripcion'), ['prompt' => 'unidades de medida'])->label('Unidades');
            echo' <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                  <button id="btproductos" type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
                  <button type="reset" class="btn btn-danger" value="reset" id="resetear"> Reset</button>';

            ActiveForm::end();

            Modal::end(); ?>
                                                        
                           <!--************************modal imputacion*******************-->
            <?php
            Modal::begin(['header' => '<h3><center>IMPUTACIÓN PRESUPUESTARIA</center></h3>', 'id' => 'modalImputacion',
             "class" => "modal fade bs-example-modal-lg"] );
            $form = ActiveForm::begin();?>
            
           <div class="container">
                <div class="main row">
                    <div class="col-md-5 column">
                         <?=$form->field($coordinacion, 'nombre')->dropDownlist(Arrayhelper::map(Coordinacion::find()
                                                ->where(['iddireccion' => $direction, 'esdireccion' => 'false'])
                                                ->all(), 'idcoordinacion', 'nombre'), ['prompt' => '--Seleccione--', 'id' => 'ueip',
                                                'onchange' => "$.ajax({
                                                                type: 'POST',
                                                                cache: false,
                                                                url: '" . yii\helpers\Url::to(['requisicion/get-unidad']) . "',
                                                                data:{idcoordinacion: $('#ueip').val(), 
                                                                      //idpuc:$('#puc').val(),
                                                                      //idpuccoordinacion:$('#oculto1').val(),
                                                                      puc:$('#oculto2').val(),
                                                                      },
                                                                success: function(response){
                                                                            $( '#xxx' ).html(response);
                                                                           
                                                                        }
                    });"])->label('Unidad Ejecutora');?>
                        
                        <?= $form->field($model, 'auxiliar')->dropDownList(array(),['id'=>'xxx',
                              'onchange' => "$.ajax({
                                                     type: 'POST',
                                                     url: '" . yii\helpers\Url::to(['requisicion/xxx']) . "',
                                                     data:{ idcategoriaprogramatica: $('#xxx').val()},
                                                     success: function (response) {
                                                     response =JSON.parse(response);
                                                     
                                                      var puc_b = $('#pucproducto').val();
                                                      $('#cuentaip').val(response.categoria+puc_b);
                                                       
                                                     $('#categoria_b').val(response.categoria);
                                                     $('#montoip').focus();
                                                     }  
                                                    });" ])->label('Categoria'); ?>   
                        
                    <input type="hidden" id="categoria_b" name="categoria_b">
                    <label class="label-control">Cuenta</label>
                    <input type="text" class="form-control" name="cuenta" id="cuentaip" readonly="true">
                    <label class="label-control">Disponible</label>
                    <input type="text" class="form-control" name="disponibilidad" id="disponibilidad" readonly="true">.<br>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button id="salvarip" type="button" class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
                    <button type="reset" class="btn btn-danger" value="reset"> Reset</button>
                   </div>

                    <div class ="col-md-4 column">

                    <label>Descripcion de la Cuenta</label>
                    <input type="text" id="pucd" class="form-control" readonly="true">
                    <?= $form->field($model, 'monto')->textinput(['id' => 'montoip', 'onkeypress' => 'return acceptNum(event)',])->label('monto'); ?>
                    <?= $form->field($model, 'auxiliar')->dropDownList(array(),['id'=>'auxiliar_b',
                                     'onchange' => "$.ajax({
                                                    type: 'POST',
                                                    url: '" . yii\helpers\Url::to(['requisicion/cuentapresupuestaria']) . "',
                                                    data:{ idcuenta: $('#auxiliar_b').val()},
                                                    success: function (response) {
                                                    response = JSON.parse(response);
                                                    $('#disponibilidad').val(response.disponibilidad);
                                                    }  
                                                    });" ])->label('Auxiliar'); ?>

                    </div>
                </div><!--row-->
            </div><!container-->
            <?php
            ActiveForm::end();
            Modal::end(); ?>
                
            </div><!panel body>
            
              <div class="form-group" align="center">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'btn_bienesysuministros']) ?>
              <button class="btn btn-danger reset">cancel</button>
               </div>
        </div><!panel-primary>
           <!--********************************************Requisicion servicios*****************************************-->
           
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2" >
            
           <div class='panel panel-primary'>
              <div class='panel-heading'>
                 <h4 align="center">REQUISICIÓN SERVICIOS</h4>
              </div>
            <div class='panel-body'>

            <?php $form = ActiveForm::begin(); ?>
             
            <?php $fecha = date('d-m-Y'); ?>
                
             <div class="main row">
                    <div class="col col-md-2 ">            
                     <?=$form->field($model, 'fecha')->textInput(array('value' => $fecha, 'readonly' => 'readonly'));?>
                    </div>
                    <div class="col col-md-4 ">  </div>
                    <div class="col col-md-4 ">  </div>
                    <div class="col col-md-2 ">
                          <label>Secuencia:</label>
                          <input type="text" readonly="true" id="numerorequisicion_s" class="form-control" placeholder="numero de control">
                    </div>
              </div>
            
            <?= $form->field($tp,'idpuc')->dropDownList(ArrayHelper::map(Tipopagos::find()->where(['servicio'=>'true'])->orderBy('descripcion')->all(), 'idtipopago', 'descripcion'), [ 'prompt' => '---Selecciona un tipo de pago---', 'id' => 'tppuc',
                    'onchange' => " $.ajax({
			                    sync: false,
			                    type: 'POST',
			                    cache: false,
			                    url: '" . yii\helpers\Url::to(['requisicion/get-tipopagoip']) . "',
		                            data:{idtipopago: $('#tppuc').val()},
			                    success: function(response) {
			                    response = JSON.parse(response);
				            if(response.success){
				                                $('#pucd_s').val(response.descripcion);
                                                                $('#puc_s').val(response.puc); //puc response 
                                                                }
				                                   else{
                                                                      alert(response.mensaje);
					                             //$('#pcont').unblock();
                                                                   }
					                       
				           }
                                        });"])->label('TIPO DE PAGO');?>
                
        <?= $form->field($model,'puc')->textinput(['readonly'=>'true' ,'id'=>'puc_s']);?>    
        <?= $form->field($model,'concepto')->textarea(['id'=>'concepto_servicios'])->label('CONCEPTO');  ?> 
       
        <?php ActiveForm::end();?>
            
            
        <div class="panel panel-primary">
            <div class="panel-heading">AGREGAR DETALLES</div>
            <div class="panel-body">
            
            <!-- tabla Detalles-->
      
        <form id="form_detalles">  
            <table id="tgrilla"  class="table table-hover table-condensed" >
                                        
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
            <input type="hidden" id="oidrequisicion_detalles" name="idrequisicion">
          
        </form>
                    <!--div id grilla-->
                <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modal_agregar_detalles"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>DETALLES</button>
                <br><br>


                <div class="row">  
                    <div class=" col-lg-2  pull-right">
                        <input type="text"  class="form-control"  name="detalles_s" id="resultado_detalle_s" readonly="readonly"/>
                    </div>
                </div>

            </div><!--body-->
        </div><!--primary-->
                        
                                     <!--tabla imputacion_servicios-->
                           
              <div class="panel panel-primary">
              <div class="panel-heading">AGREGAR IMPUTACION</div>
              <div class="panel-body">
              <table id="tablaip_s" class="table table-hover table-condensed table-striped ">
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
            <tr id="imputacion_s" class="ip_s" data-key="0">
              <td style="visibility:hidden;">0</td>
              <td></td> <td></td> <td></td>
              <td></td> <td></td> <td></td>
            </tr>
            </tbody>
            </table>
            <button type="button" id="dialogo_s" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion_s"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>IMPUTACION</button>
                
            <div class="row">  
                    <div class=" col-lg-2  pull-right">
                        <input type="text"  class="form-control" id="monto_s" readonly="readonly" placeholder="total"/>
                    </div>
            </div>
            
              </div>
              </div><br>
               
              <div align="center">
                   <button class="btn btn-success"  id="btn_envia_servicios" >CREAR</button>
                   <button class="btn btn-danger">Cancelar</button>
              </div>
              
           </div><!--panel body-->
             </div><!--panel primary-->

        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->


    <script type="text/javascript">
	$(document).ready(function(){
		$("#modalImputacion .modal-dialog").addClass("modal-lg");
                $("#modalImputacion_s .modal-dialog").addClass("modal-lg");
	});
    </script>
    
   <script type="text/javascript">

    /*modal imputacion presupuestaria  */

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
            $("#tablaip tbody").append('<tr id="imputacion' + id + '" class="ip" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' + '<input type="text" name="unidad_ejecutora_bs" id=unidad_ejecutora_bs' + id + '   readonly="true" class="form-control" value="' + ueip + '">' + '</td><td>' + '<input type="text" name="cuentaip" id=cuentaip' + id + ' readonly="true" class="form-control" value="' + cuentaip + '">' + '</td><td>' + '<input type="text" name="dcuentaip"  id=dcuentaip' + id + ' value="' + dcuentaip + '" class="form-control" readonly="true" >' + '</td><td>' + '<input type="text" class="form-control" value="' + disponibleip + '" readonly="true" name="disponible" id=disponibilidad' + id + '>' + '</td><td>'  + montoip +  '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#imputacion' + id + '\').remove(),actualizarbs()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');

            //funcion para sumar monto 
                suma = 0;
                $('#tablaip tr.ip').each(function(){
                suma+= Number($(this).find('td').eq(5).html());
                });//each
                $("#monto").val(suma);
        });//click
    });//document

</script>
                                                  
                                                  <!-- modal agregar producto-->

	<script type="text/javascript">
	 $(document).ready(function(){
		$("#btproductos").click(function(){
                     
	         var cantidadbs = $("#requisiciondeta-cantidad").val();
                 var descripcionbs = $("#requisiciondeta-descripcion").val();
                 var unidadbs = $("#unidadmedida-descripcion option:selected").text();
                 var unidadmedida_oculto = $("#unidadmedida-descripcion option:selected").val();
                 
                 if(cantidadbs ==""){
                     alert("debe introducir una cantidad!");
                     $("#requisiciondeta-cantidad").focus();
                     return false;
                 }
                     else if(descripcionbs ==""){
                     alert("introduzca una descripcion..!");
                     $("#requisiciondeta-descripcion").focus();
                     return false;
                    }
               

                id = $("tr.productosbs").last().attr("id");
                id = Number(id.substr(8, id.length)) + 1;
                dataKey = $("tr.productosbs").last().attr("data-key");
                productoNumero = parseInt($("tr.productosbs").last().find("td").first().text()) + 1;
                $("#tablaproductosbs tbody").append('<tr id="producto' + id + '" class="productosbs" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' +'<input type="text" name="cantidad" id=cantidad_bs' + id + '  class="form-control"  readonly="true"  value="'+cantidadbs+'">'+ '</td><td>' +'<input type="text" name="descripcion" id=descripcion_bs' + id + '   class="form-control" readonly="true" value="'+descripcionbs+'">'+ '</td><td>' +'<input type="text" name="unidades_bs" class="form-control" id=unidades_bs' + id + ' readonly="true"  value="'+unidadbs+'">'+ '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td> <td>' +'<input type="hidden" name="unidadmedida"  value="'+unidadmedida_oculto+'" >'+ '</td> </tr>');
	        $("#productosform").trigger("reset");
                });
	});
	</script>
        
   <script type="text/javascript">

    /*modal imputacion presupuestaria servicios */

    $(document).ready(function() {
        $("#salvarip_s").click(function() {
            var ueip_s = $("#ueip_s option:selected").text();
            var cuentaip_s = $("#cuentaip_s").val();
            var dcuentaip_s = $("#pucd_s").val();
            var disponibleip_s = $("#disponibilidad_s").val();
            var montoip_s = $("#montoip_s").val();

            id = $("tr.ip_s").last().attr("id");
            id = Number(id.substr(12, id.length)) + 1;
            dataKey = $('tr.ip').last().attr('data-key');
            productoNumero = parseInt($("tr.ip_s").last().find("td").first().text()) + 1;
            $('#tablaip_s tbody').append('<tr id="imputacion_s' + id + '" class="ip_s" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' + '<input type="text" name="unidad_ejecutora_bs" id=unidad_ejecutora_bs' + id + '   readonly="true" class="form-control" value="' + ueip_s + '">' + '</td><td>' + '<input type="text" name="cuentaip" id=cuentaip' + id + ' readonly="true" class="form-control" value="' + cuentaip_s + '">' + '</td><td>' + '<input type="text" name="dcuentaip"  id=dcuentaip' + id + ' value="' + dcuentaip_s + '" class="form-control" readonly="true" >' + '</td><td>' + '<input type="text" class="form-control" value="' + disponibleip_s + '" readonly="true" name="disponible" id=disponibilidad' + id + '>' + '</td><td>'  + montoip_s +  '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#imputacion_s' + id + '\').remove(),actualizar_s()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');

            //funcion para sumar monto 
            
                suma = 0;
                $('#tablaip_s tr.ip_s').each(function(){
                suma+= Number($(this).find('td').eq(5).html());
                });//each
                $("#monto_s").val(suma);
                
               
         
        });//click
    });//document

</script>
        
        
    <script type="text/javascript">

       var nav4 = window.Event ? true : false;
       function acceptNum(evt) {
        // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57
       var key = nav4 ? evt.which : evt.keyCode;
       return (key <= 13 || (key >= 48 && key <= 57) || key == 46 || key == 44);
       }
         //Funcion para actualizar monto de tabla
         function actualizar(){
         var num;
         var suma = 0;
         $('#tgrilla tr.productoFila').each(function(){
            suma += Number($(this).find('td').eq('3').text())
            //suma += parseInt($(this).find('td').eq(3).text()||0,10)
            // load a language
            numeral.language('Es', {
                delimiters: {
                    thousands: '.',
                    decimal: ','
                },
                ordinal: function(number) {
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

    }
   


 </script>


 <script>
                                                  //cargar numero de control
            $(document).ready(function(){
                  
                       $.ajax({
                                type:'POST',
                                url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/control' ?>',
                                data:{control: $("#numerorequisicion").val()},
                                success:function(response){
                                response = JSON.parse(response);
                                console.log(response);
                                  $("#numerorequisicion").val(response.secuencia.secuencia);
                                  $("#numerorequisicion").val(parseFloat($("#numerorequisicion").val()) + 1);
                                  
                                  //numero de control requisicion servicios
                                  $("#numerorequisicion_s").val(response.secuencia.secuencia);
                                  $("#numerorequisicion_s").val(parseFloat($("#numerorequisicion_s").val()) + 1);
                                  
                                  $("#onumerorequisicion").val(response.idrequisicion.idrequisicion);
                                  $("#onumerorequisicion").val(parseFloat($("#onumerorequisicion").val()) + 1);
                                  
                                  $("#oidrequisicion_detalles").val(response.idrequisicion.idrequisicion);
                                  $("#oidrequisicion_detalles").val(parseFloat($("#oidrequisicion_detalles").val()) + 1);
                                  
                                  
                              
                                  
                                  
                                }
                                        
                           
                       });//ajax
            
           
            });//document
    </script>              
   
    <script>
                                /*serializar campos en tabla ,los envio por ajax, mediante id de formulario*/
          $(document).ready(function(){                      
            $('#btn_bienesysuministros').click(function(){
               
             var inputs =$('#form_producto').serializeArray();
             var string = JSON.stringify(inputs);
                 $.ajax({
                        type:'POST',
                        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/enviarproductos' ?>',
                        data:{inputs},
                        beforeSend: function (xhr){
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
                        success: function(){
                        $('#contenido').unblock();
                        },//success
                       
                       error:function(){
                           $('#contenido').unblock();
                       }
                       });//ajax
                       
            });
            
                   
                             //enviar requisicion
            $('#btn_bienesysuministros').click(function(){
            $.ajax({
                    type:'POST',
                    url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/send' ?>',
                    data:{ concepto: $('#requisicion-concepto').val(),
                           fecha: $('#requisicion-fecha').val(),
                           tipo: $('#requisicion-tipo').val(),
                           monto: $('#monto').val(),
                           secuencia:$('#numerorequisicion').val()
                          },
                    success:function(response){
                    console.log(response);
                  
                    //$('#numerorequisicion').val(parseInt($('#onumeroreqisicion').val()) + 1);
                       
                    },
                    error:function(){
                        
                    }
                     
                    });//ajax2
                      
           });//click
            
        });//document
  
    </script> 
    
    
   
    <script>   /*actualizar campo monto al eliminar celda en requisicion bienes y suminsitros*/
     function actualizarbs(){
     suma = 0;
     $('#tablaip tr.ip').each(function(){
            suma+= Number($(this).find('td').eq(5).html());
     });//each
     $("#monto").val(suma);
    }
            
    </script>
    
    
    <script>   /*actualizar campo resultado de tabla detalles en requisicion servicios */
     function actualizars(){
     suma = 0;
     $('#tgrilla tr.productoFila').each(function(){
      suma+= Number($(this).find('td').eq(3).html());
     });//each
     $("#resultado_detalle_s").val(suma);
    }
            
    </script>
    
    
      <script>   /*actualizar total tabla imputacion requisicion-servicios*/
     function actualizar_s(){
     suma = 0;
     $('#tablaip_s tr.ip_s').each(function(){
            suma+= Number($(this).find('td').eq(5).html());
     });//each
     $("#monto_s").val(suma);
    }
            
    </script>
    
                                           <!-- modal Agregar Detalle-->
        <?php
        Modal::begin(['header' => '<h3 align="center">Agregar Detalle</h3>', 'id' => 'modal_agregar_detalles']);
        $form = ActiveForm::begin(['id' => 'agregar_detalles']);
        echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)' ,'id'=>'cantidad_s']);
        echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500,'id'=>'descripcion_s']);
        echo $form->field($model, 'monto')->textInput(['onkeypress' => 'return acceptNum(event)', 'onchange' => 'format(this)']);
        echo'<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
	    <button id="salvar2"  type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
	    <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';
        ActiveForm::end();
        Modal::end();
        ?>

	

    <script>
                                                  //tabla detalles
        
        $(document).ready(function(){
	    $("#salvar2").click(function (){
                //validar campos vacios
                valorc = $("#cantidad_s").val();
                valord = $("#descripcion_s").val();
                valorm = parseFloat($("#requisicion-monto").val());
                    if(valorc == ""){
                    alert("Campo cantidad esta vacio!");
	            $("#cantidad_s").focus();
	            return false;
	            }
		      else if (valord == ""){
		      alert(" campo descripcion esta  vacioo! ");
		      $("#descripcion_s").focus();
		      return false;
		      }
		         else if (valorm == ""){
	                 alert("campo monto esta vacio !!");
		         $("#requisicion-monto").focus();
	                 return false;
		         }
	
		id = $("tr.productoFila").last().attr("id");
		id = Number(id.substr(12, id.length)) + 1;
		dataKey = $("tr.productoFila").last().attr("data-key");
		productoNumero = parseInt($("tr.productoFila").last().find("td").first().text()) + 1;
                                             //añadir nueva fila
		fila = '<tr id="detalles' + id + '" class="productoFila" data-key="' + dataKey + '"><td>' + productoNumero + '</td><td>' + '<input type="text"  id="cantidad_s' + id + '" readonly="true" name="cantidad"   class="form-control" value="'+ valorc +'" >' + '</td> <td> ' +'<input type="text" id="descripcion_s' + id + '" readonly="true" name="descripcion"  class="form-control" value='+valord+' >'+ '</td> <td>' + valorm + '</td> <td> <div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#detalles' + id + '\').remove(),actualizars()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td> </tr>';
		$("#tgrilla  tbody").append(fila);
                
                    suma = 0;
		    $('#tgrilla tr.productoFila').each(function(){
		    suma += Number($(this).find('td').eq(3).html());
                    $("#resultado_detalle_s").val(suma).css('color', 'black');
                    
	            }) 
	               
     }); //detalles
                 });//ocument

</script>
    
                                                <!--modal imputacion_servicios-->                  
            <?php
            Modal::begin(['header' => '<h3><center>IMPUTACIÓN PRESUPUESTARIA</center></h3>', 'id' => 'modalImputacion_s',
             "class" => "modal fade bs-example-modal-lg"] );
            $form = ActiveForm::begin(['id'=>'form_imputacion_s']);
            ?>

            <div class="container">
                <div class="main row">
                    <div class="col-md-5 column">
                        <?=
                        $form->field($coordinacion, 'nombre')->dropDownlist(Arrayhelper::map(Coordinacion::find()
                                                ->where(['iddireccion' => $direction, 'esdireccion' => 'false'])
                                                ->all(), 'idcoordinacion', 'nombre'), ['prompt' => '--Seleccione--', 'id' => 'ueip_s',
                                                'onchange' => "$.ajax({
                                                                type: 'POST',
                                                                cache: false,
                                                                url: '" . yii\helpers\Url::to(['requisicion/get-unidadservicios']) . "',
                                                                data:{idcoordinacion: $('#ueip_s').val(),
                                                                      idtipopago:$('#tppuc').val()
                                                                },
                                                                success: function(response){
                                                                $( '#categoria_servicios' ).html(response);
                                                                }
                    });"])->label('Unidad Ejecutora_servicios'); ?> 
                        
                        
                <?= $form->field($model, 'auxiliar')->dropDownList(array(),['id'=>'categoria_servicios',
                              'onchange' => "$.ajax({
                                                     type: 'POST',
                                                     url: '" . yii\helpers\Url::to(['requisicion/xxx']) . "',
                                                     data:{ idcategoriaprogramatica: $('#categoria_servicios').val()},
                                                     success: function (response) {
                                                     response =JSON.parse(response);
                                                     $('#ocultocategoria_servicios').val(response.categoria);
                                                     var puc_servicios = $('#puc_s').val();
                                                     $('#cuentaip_s').val(response.categoria+puc_servicios);
                                                  
                                                     }  
                                                    });" ])->label('Categoria_servicios'); ?> 
                        
                        <input type="hidden"  id="ocultocategoria_servicios"  name="ocultocategoria_servicios"> 
                        <input type="hidden"  id="ocultotipopago_puc" name="ocultotipopago_puc"><!--le asigno puc atravez de idtipopago-->
                      <!-- <input type="hidden"  id="ocultocategoria_s"  name="ocultocategoria_s">-->
                        <label class="label-control">CUENTA</label>
                        <input type="text" class="form-control" name="cuenta" id="cuentaip_s" readonly="true">
                        <label class="label-control">DISPONIBLE</label>
                        <input type="text" class="form-control" name="disponibilidad" id="disponibilidad_s" readonly="true">.<br>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        <button id="salvarip_s" type="button"  class="btn btn-primary "  data-dismiss="modal" >Salvar</button>
                        <button type="reset" class="btn btn-danger" value="reset"> Reset</button>
                   </div>

                    <div class ="col-md-4 column">

                    <label>Descripcion de la Cuenta</label>
                    <input type="text" id="pucd_s" class="form-control" readonly="true">
                    <?= $form->field($model, 'monto')->textinput(['id' => 'montoip_s', 'onkeypress' => 'return acceptNum(event);'])->label('monto'); ?>
                    <?= $form->field($model, 'auxiliar')->dropDownList(array(),['id'=>'div_auxiliar',
                              'onchange' => "$.ajax({
                                                        type: 'POST',
                                                        url: '" . yii\helpers\Url::to(['requisicion/cuentapresupuestaria']) . "',
                                                        data:{ idcuenta: $('#div_auxiliar').val()},
                                                        success: function (response) {
                                                            response = JSON.parse(response);
                                                            $('#disponibilidad_s').val(response.disponibilidad);
                                                           
                                                            }  
                                                    });" ])->label('Auxiliar'); ?>
                   </div>
                </div><!--row-->
            </div><!container-->
            <?php
            ActiveForm::end();
            Modal::end(); ?>

                                               <!-- insert tabla detalles-->
 <script>
        $(document).ready(function(){
           $('#btn_envia_servicios').click(function(){
            var datos = $('#form_detalles').serializeArray();
               $.ajax({ type:'POST',
                        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/enviardetalles' ?>',
                        data:{datos}
                      });//ajax enviar detalles
           }); //click
           
                                                       //enviar requisicion servicios
           $('#btn_envia_servicios').click(function(){
                $.ajax({
                    type:'POST',
                    url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/requisicionservicios_send' ?>',
                    data:{
                         fecha: $('#requisicion-fecha').val(),
                         concepto: $('#concepto_servicios').val(),
                         idtipopago: $('#tppuc').val(),
                         
                         secuencia:$('#numerorequisicion').val() },
                         success:function(){
                       
                       }
                });//ajax
           });//enviar requisicion servicios
           
        });//document
        
        
   </script>
   
   
   <script>
        $(document).ready(function(){
             //$('#montoip_s').focus(function(){
             $('#montoip_s').click(function(){
                $.ajax({
                       type:'POST',
                       url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/variable' ?>',
                       data:{categoria: $('#ocultocategoria_servicios').val(), puc: $('#puc_s').val()},
                       success:function(response){
                       $( '#div_auxiliar' ).html(response);
                       console.log(response.categoria); }
                    });
            }); 
        });
   </script>
   
     <script>
       $(document).ready(function(){
            $('#xxx').blur(function(){
                $.ajax({
                       type:'POST',
                       url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=requisiciones/requisicion/variable2' ?>',
                       data:{categoria: $('#categoria_b').val(), puc: $('#pucproducto').val()},
                       success:function(response){
                        $( '#auxiliar_b' ).html(response);
                        console.log(response.categoria);
                        }
                    });
            }); 
        });
   </script>
 
        <script>
           $(document).ready(function(){
             $('#salvarip_s').click(function(e){
               e.PreventDefault();
            
               var monto = $("#montoip_s").val();
               var dis   = $("#disponibilidad_s").val();
                if(monto > dis){
                  
                     alert('Monto Superior a Disponibilidad');
                     return false;
                    
                }
                
             });
           });


        </script>

   


                                <!------------------------------------------------------------------->
  
 