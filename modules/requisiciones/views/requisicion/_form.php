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
$model = new Requisicion();
$tipoproducto = new Tipoproducto();
$reqDeta = new Requisiciondeta();
$unidadmedida = new Unidadmedida();
$cp = new Cuentapresupuestaria();

//variables de usuarios logueado
$direction = \yii::$app->user->Identity->iddireccion;
$coordination = \yii::$app->user->Identity->idcoordinacion;


 ?>       
           
                    

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">BIENES Y SUMINISTROS</a></li>
        <li><a href="#tab_2" data-toggle="tab">SERVICIOS</a></li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
                            <!estilo pane de boostrap-->
              
            <div class='panel panel-primary'>
              <div class='panel-heading'>
                 <h4 align="center">REQUISICIÓN  BIENES Y SUMINISTROS</h4>
              </div>
            <div class='panel-body'>
            <div class="requisicion-form">

            <?php $form = ActiveForm::begin(); ?>
             
            <?php $fecha = date('d-m-Y'); ?>
                
            <?=$form->field($model, 'fecha')->textInput(array('value' => $fecha, 'readonly' => 'readonly'))->label('Fecha');?>
                
                
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

            <?= $form->field($model, 'tipo')->textInput() ?>
                
            <?= $form->field($model, 'status')->textInput() ?>

            <?= $form->field($model, 'concepto')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'numcontrol')->textInput() ?>
            
            
            <div class="panel panel-primary">
            <div class="panel-heading">AGREGAR PRODUCTOS</div>
            <div class="panel-body">
                <?= $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)', 'title' => 'introdusca cantidad']);?>
            
                <?= $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500, 'title' => 'introduzca descripcion del producto']);  ?>
            
                <?= $form->field($unidadmedida, 'descripcion')->dropdownList(Arrayhelper::map(Unidadmedida::find()->orderBy('descripcion')->all(), 'idunidadmedida', 'descripcion'), ['prompt' => 'unidades de medida'])->label('Unidades');?>
                
            </div>
            </div>
            
         
            

            
                
                                                  <!--tabla productos-->

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
            <br><br><br>

            
                                                        <!--modal imputacion -->
                                                        
             
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
  
  
  <input type="hidden" name="ocultoidpuc" id="oculto1" > <br>
  <input type="hidden" name="ocultopuc" id="oculto2" >
   <input type="hidden" name="ocultocategoria" id="oculto3" >                                           

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

           </div><!requisicion-form-->
  
        
                                                        <!modal productos-->
            <?php
            Modal::begin([ 'id' => 'modalAgregarProducto', 'header' => '<h3 align="center">AGREGAR PRODUCTOS</h3>']);

            $form = ActiveForm::begin();
            echo $form->field($reqDeta, 'cantidad')->textInput(['onkeypress' => 'return acceptNum(event)', 'title' => 'introdusca cantidad']);
            echo $form->field($reqDeta, 'descripcion')->textInput(['maxlength' => 500, 'title' => 'introduzca descripcion del producto']);
            echo $form->field($unidadmedida, 'descripcion')->dropdownList(Arrayhelper::map(Unidadmedida::find()->orderBy('descripcion')->all(), 'idunidadmedida', 'descripcion'), ['prompt' => 'unidades de medida'])->label('Unidades');
            echo' <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
              <button id="btproductos" type="button" class="btn btn-primary "  data-dismiss="modal" > Guardar</button>
              <button type="reset" class="btn btn-danger" value="reset"> Reset</button>';

            ActiveForm::end();

            Modal::end(); ?>
                                                        
                                                        
                                                        
            
                                         <!--modal imputacion-->
            <?php
            Modal::begin(['header' => '<h3><center>IMPUTACIÓN PRESUPUESTARIA</center></h3>', 'id' => 'modalImputacion',
             "class" => "modal fade bs-example-modal-lg"] );
            $form = ActiveForm::begin();
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
                </div><!--row-->
            </div><!container-->
            <?php
            ActiveForm::end();
            Modal::end(); ?>
                
            </div><!panel body>
            </div><!panel-primary>
         

         

           

        </div><!-- /.tab-pane -->


        <div class="tab-pane" id="tab_2">

             <?php $form2 = ActiveForm::begin(); ?>
             
            <?php $fecha = date('d-m-Y'); ?>
                
            <?=$form2->field($model, 'fecha')->textInput(array('value' => $fecha, 'readonly' => 'readonly'))->label('Fecha');?>
                
                
             <?= $form2->field($tipoproducto, 'descripcion')->dropDownlist(ArrayHelper::map(Tipoproducto::find()->where(['not', ['puc' => null]])->orderBy('descripcion')->all(), 'idtipoproducto', 'descripcion'), ['prompt' => '--seleccion un producto--',
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

            <?= $form2->field($model, 'tipo')->textInput() ?>
                
            <?= $form2->field($model, 'status')->textInput() ?>

            <?= $form2->field($model, 'concepto')->textInput(['maxlength' => true]) ?>

            <?= $form2->field($model, 'numcontrol')->textInput() ?>
            
             <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            
           <?Activeform::end(); ?>

        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->





    
  <script type="text/javascript">
	$(document).ready(function(){
		$("#modalImputacion .modal-dialog").addClass("modal-lg");
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
    function formateadora() {
        // lenguaje español
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
        var dolar = $("#montoip").val();
        bolivar = numeral(dolar).format('0,0.00');
        $("#montoip").val(bolivar).css('color', 'black');
    }
/*--------------------------------crear funciones-------------------------------------*/

     function unidadEjecutora(unidadEjecutora)
     {
      this.unidadEjecutora = unidadEjecutora;
     }

     function imputacionPresupuestaria(unidadEjecutora, monto, ord)
     {
        this.unidadEjecutora = unidadEjecutora;
        this.monto = monto;
        this.ord = ord;
     }

     function detalles(cantidad, descripcion, monto)
     {
       this.cantidad = cantidad;
       this.descripcion = descripcion;
       this.monto = monto;
     }
      
       
   /*---------------------------------------------fin----------------------------------------------------*/

</script>

<style type="text/css">
  .th{
        background-color: #F2F2F2;
        margin-left:30px;
      }

  #tdetalle{
        background-color:#fff;
        border-radius:10px;
        border:solid silver 2px;
      }

 
  #capa2{
    display:block;
    }


</style>

