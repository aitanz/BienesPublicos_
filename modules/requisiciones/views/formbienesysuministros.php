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

