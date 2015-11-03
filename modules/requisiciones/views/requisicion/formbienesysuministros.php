<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\bootstrap\Button;//use yii\grid\GridView;
use app\modules\requisiciones\models\Requisicion;
use app\modules\requisiciones\models\Requisiciondeta;
use app\modules\requisiciones\models\Tipoproducto;

//instanciar los modelos
$model = new Requisicion();
$tipoproducto = new Tipoproducto();
$reqDeta = new Requisiciondeta();

var_dump($model);

?>
<h3 align="center">BIENES Y SUMINISTROS</h3>


        
           
                    

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
            <?php
            $form = ActiveForm::begin([ 'id' => 'form_bienesysuministros',
                                        'enableClientValidation' => true,
                                        'enableAjaxValidation' => false,
                                        'validateOnSubmit' => true,
                                        'validateOnChange' => true,
                                        'validateOnType' => true]);?> 
                
                
                
            <?php $fecha = date('d-m-Y');?>
            <?= $form->field($model, 'fecha')->textInput(array('value' => $fecha, 'readonly' => 'readonly'))->label('Fecha');?>
            
            <?= $form->field($tipoproducto, 'descripcion')->dropDownlist(ArrayHelper::map(Tipoproducto::find()->where(['not', ['puc' => null]])->orderBy('descripcion')->all(), 'idtipoproducto', 'descripcion'), ['prompt' => '--seleccion un producto--',
            'onchange' => "$.ajax({
			  sync: false,
			  type: 'POST',
			  cache: false,
			  url: '" . yii\helpers\Url::to(['requisicion/get-productopuc']) . "',
			  beforeSend: function(xhr){
			  $('#pcont').block({css:{
					border: 'none',
					padding: '15px',
					backgroundColor: '#000',
					'-webkit-border-radius': '10px',
					'-moz-border-radius': '10px',
					opacity: .5,
					color: '#fff'
				}});
			 },
			data: {idtipoproducto: $('#tipoproducto-descripcion').val()},
			error: function(error){
			  error(error);
			  $('#pcont').unblock();
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
					      $('#pcont').unblock();
					 }
			}
	    });"])->label('Tipo Producto');?>
            
            
            
            <div class="form-group">
                <label for="puc-producto">Puc</label>
                <input type="number" name="pucproducto" id="pucproducto" class="form-control" readonly="true"> 
            </div>
                
                
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
            <button type="button" id="dialogo" class="btn btn-primary" data-toggle="modal" data-target="#modalImputacion"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>UNIDAD EJECUTORA</button><br><br>
                <input type="hidden" name="ocultoidpuc" id="oculto1" > <br>
                <input type="hidden" name="ocultopuc" id="oculto2" >
                <input type="hidden" name="ocultocategoria" id="oculto3" >
                
            
            <div class="form-group">
                <label for="concepto">Concepto</label>
                <?= $form->field($model,'concepto')->textarea()->label(false);?>
            </div>   
            
                
            <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-alert']) ?>
            </div>    
            
            <?php ActiveForm::end(); ?>
            </div><!panel body>
            </div><!panel-primary>
         

         

           

        </div><!-- /.tab-pane -->


        <div class="tab-pane" id="tab_2">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Proveedores</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_filter">
                                    <a class="btn btn-app" id="agregarProveedor">
                                        <i class="fa fa-plus"></i>Agregar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="overflow: auto">
                            <div class="col-sm-12">
                                <table aria-describedby="example1_info" role="grid" id="example1" class="table table-bordered table-striped dataTable">
                                    <thead class="bg-red-active color-palette">
                                        <tr role="row">
                                            <th rowspan="2">Beneficiario</th>
                                            <th rowspan="2">N° Referencia del Crédito</th>
                                            <th colspan="2">RIF/CI Beneficiario</th>
                                            <th rowspan="2">Tipo Cuenta</th>
                                            <th rowspan="2">N° Cuenta Benefciario</th>
                                            <th rowspan="2">Monto Crédito</th>
                                            <th rowspan="2">Tipo Pago</th>
                                            <th rowspan="2">Banco</th>
                                            <th rowspan="2">Duración Cheque</th>
                                            <th rowspan="2">EMAIL Beneficiario</th>
                                            <th rowspan="2">Fecha Valor Débito</th>
                                            <th rowspan="2">Eliminar</th>
                                        </tr>
                                        <tr>
                                            <th>Letra RIF/CI</th>
                                            <th>NUMERO RIF/CI</th>
                                        </tr>
                                    </thead>

                                    <tbody id="proveedores">
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>

        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->



    
    
    
    
    