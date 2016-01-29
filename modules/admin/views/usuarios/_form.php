<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use kartik\widgets\AlertBlock;
use yii\widgets\Pjax;
use kartik\password\PasswordInput;
use app\modules\admin\models\Persona;
use app\modules\admin\models\Direccion;
use app\modules\admin\models\SeguridadUsuarios;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SeguridadUsuarios */
/* @var $form yii\widgets\ActiveForm */

$person = new Persona();
$direccion = new Direccion();

      
?>

<div class="seguridad-usuarios-form">
    
         <div class="container">
              
                <div class="main row">
                        <div class="col-md-5 column">
                            <div class="panel panel-primary">
                                <div class="panel-heading">DATOS DE USUARIO</div>
                                    <div class="panel-body">
                                    <?php $form = ActiveForm::begin(['id'=>'form_usuario'])?>
                                        
                                        <?= $form->field($model, 'cedula')->textInput(['placeholder'=>'introduzca cedula','maxlength'=>'8']) ?> 
                                        <input type="hidden" name="cedulausuario" id="cedulausuario" >
                                        <div id="div_validacedula"style="font-size:16px;color:red;display:none" ></div> <!--mensaje validar cedula usuario--><br>
                                        
                                        <?= $form->field($model, 'id_direccion')->dropdownList(Arrayhelper::map(Direccion::find()->orderBy('nombre')->all(), 'iddireccion', 'nombre'), ['prompt' => 'unidad'])->label('Unidad Administrativa');?>

                                        <?= $form->field($model, 'login')->textInput(['maxlength' => true,'placeholder'=>'Introduzca usuario']) ?>
                                        
                                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>'introduzca password']) ?>

                                        <label for="confirmar">Confirmar</label>
                                        <input type="password" name="confirmar" id="confirmar" class="form-control" placeholder="confirmar">
                                        <div id="confirmar_pass"style="font-size:16px;color:red;display:none" ></div> <!--confirmar pass--><br><br>
                                        <input type="hidden" id="ocultoiddireccion">
                                        
                                       
                                            <div class="form-group">
                                             <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ,'id'=>'validador']) ?>
                                             <button type="reset" class="btn btn-danger" value="reset" id="reset"> Cancel</button>
                                            </div>
                                        
                                            <?php ActiveForm::end(); ?>
                                    </div><!--panel-body-->
                            </div> <!--panel-->
                            
                            
                            
                           </div><!--col-md-5-->

                           <div class ="col-md-5 column">
                              <div class="panel panel-primary">
                                <div class="panel-heading">DATOS DE PERSONAS</div>
                                <div class="panel-body">
                                    <div id="mensajero"style="font-size:16px;color:red;display:none"> 
                                    
                                    
                                    </div>
                                    
                                  
                                     <?php $form = ActiveForm::begin(['id'=>'form_personas'])?>
                                    
                                    <?= $form->field($person, 'cedula')->textInput(['required'=>true,'placeholder'=>'introduzca cedula persona']); ?>
                                   
                                    <?= $form->field($person, 'nombres')->textInput(['required'=>true,'placeholder'=>'introduzca nombre persona']); ?>

                                    <?= $form->field($person, 'apellidos')->textInput(['required'=>true,'placeholder'=>'introduzca apellido persona']); ?>
                                    
                                    <?= $form->field($person, 'direccion')->textInput(['required'=>true,'placeholder'=>'introduzca direccion']); ?>
                                    
                                 
                                    <?= $form->field($person, 'fnacimiento')->widget(DatePicker::classname(), [
                                                    'name' => 'fnacimiento','type' => DatePicker::TYPE_COMPONENT_APPEND,
                                                    'options' => ['placeholder' => 'Fecha de Nacimiento ...'],
                                                    'pluginOptions' => ['autoclose'=>true,'format' => 'yyyy-m-dd' ]]) ?>
                                    
                                    
                                    
                                    <?= $form->field($person, 'tlf1')->textInput(['placeholder'=>'telefono'])->label('Telefono'); ?>
                                    
                                    <?= $form->field($person, 'correoe')->textInput(['placeholder'=>'correo'])->label('Correo'); ?>
                                    
                                    <?= $form->field($person, 'sexo')->radioList(array('m'=>'Masculino','f'=>'Femenino')); ?>
                                 
                                    
                                    <div id="div_insertapersona" style="display:none;"> 
                                         
                                         <button type="button" id ="pan" class="btn btn-success">Crear Persona</button>
                                         <button type="reset" class="btn btn-danger" value="reset" id="reset"> Cancel</button>
                                    </div> <br><br>
                                     <!--<spam id="pan"><a href src="#">pan</a></spam> <br>-->
                                     
                                     
                                        
                                </div><!--panel-body-->
                            </div> <!--panel-->
                        </div>
                            
                           
                      
                        </div><!--row-->
                        
                       
                        
                          <?php  // ActiveForm::end(); ?>
                </div><!--container-->
        </div><!--form-->


<script>                                //buscar persona por numero de cedula 
            $(document).ready(function(){
                $("#seguridadusuarios-cedula").blur(function(){
                     	$.ajax({
		                type: 'POST',
	                        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=admin/usuarios/buscarpersona' ?>',
		                data:'cedula='+$(this).val(),
                                
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
		                success: function(response){
                                    $('#contenido').unblock();
                                    response = JSON.parse(response);
                                    //console.log(response);
                                      if( response.success){
                                       $('#persona-cedula').val(response.cedula).attr('disabled','disabled');
			               $('#persona-nombres').val(response.nombres).attr('disabled', 'disabled');
                                       $('#persona-apellidos').val(response.apellidos).attr('disabled', 'disabled');
                                       $('#persona-direccion').val(response.direccion).attr('disabled', 'disabled');
                                       $('#persona-tlf1').val(response.telefono).attr('disabled', 'disabled');
                                       $('#persona-correoe').val(response.correo).attr('disabled', 'disabled');
                                       $('#mensajero').slideUp(500);
                                       $('#div_insertapersona').slideUp(500);
                                       $('#cedulausuario').val(response.cedulau);
                                       
                                       //desbloquear formulario de registro de usuarios
                                         //$('#seguridadusuarios-login').removeAttr("disabled").val('');
                                         $('#seguridadusuarios-password').removeAttr("disabled").val('');
                                         
                                         $('#seguridadusuarios-login').prop("readonly",false).val('');
                                 
				      }
                                      
                                      if(response.false){
                                          //remover atributo disable
                                           $('#persona-cedula').removeAttr("disabled").val('');
                                           $('#persona-nombres').removeAttr("disabled").val('');
                                           $('#persona-apellidos').removeAttr("disabled").val('');
                                           $('#persona-direccion').removeAttr("disabled").val('');
                                           $('#persona-tlf1').removeAttr("disabled").val('');
                                           $('#persona-correoe').removeAttr("disabled").val('');
                                 
                                           $('#mensajero').html(' Aviso : Cedula no Registrada!<br> Debes Registrar Persona').slideDown(500);
                                           $('#seguridadusuarios-login').prop("readonly",true);
                                           //$('#seguridadusuarios-password').attr('disabled', 'true');
                                           //DESPLEGAR BOTON INSERTAR PERSONAS
                                            $('#div_insertapersona').slideDown(500);
                                          
                                      }    
                                   
		                }, //success
                            
                                error: function (error) {
                                $('#contenido').unblock();
                                 },
                
		        }); //ajax
                    
                }); //blur
                
                      //validar password-confirm
                     $("#confirmar").change(function(){
                     if($(this).val() != $("#seguridadusuarios-password").val()){
                      $("#confirmar_pass").html(' Aviso:  password no coinciden').slideDown(500);
                     }
                       if($(this).val() === $("#seguridadusuarios-password").val()){
                             $("#confirmar_pass").slideUp(500);
                       } 
                   });
                   
                   
                                   
                                   
            });//document
            
</script>

 <script>                      //enviar formulario personas
$(document).ready(function(){
	$("#pan").click(function(){
            cedulap = $("#persona-cedula").val();
            nombrep = $("#persona-nombres").val();
	    apellidop = $("#persona-apellidos").val();
            dirccionp = $("#persona-direccion").val()
            
            if (cedulap == ""){
            alert("Campo cedula esta vacio");
            $("#persona-cedula").focus();
	     return false;
            }
                else if(isNaN(parseInt(cedulap))){
                       alert('campo cedula debe ser numerico');
                       $("persona-cedula").focus();
                       return false;
                   }    
            
                       else if (nombrep == ""){
		         alert(" campo nombre esta  vacioo! ");
	                 $("#persona-nombres").focus();
		         return false;
		        }
                
                            else if (apellidop == ""){
                                alert("campo apellido esta vacio !!");
                                $("#persona-apellidos").focus();
                                return false;
                           }
                             
         $.ajax({
		type: "POST",
	        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=admin/usuarios/insertapersona' ?>',
		data:{ cedula:$('#persona-cedula').val(),
                       nombres:$('#persona-nombres').val(),
                       apellidos:$('#persona-apellidos').val(),
                       direccion:$('#persona-direccion').val(),
		       fnacimiento:$('#persona-fnacimiento').val(),
                       tlf1: $('#persona-tlf1').val(),
                       correoe : $('#persona-correoe').val()},
		success: function(response){
                              console.log(response);
                            
                              //limpiamos formulario personas al insertar datos de personas
                              $('#persona-cedula').val('');
                              $('#persona-nombres').val('');
                              $('#persona-apellidos').val('');
                              $('#persona-direccion').val('');
                              $('#persona-correoe').val('');
                              $('#persona-tlf1').val('');
                              $('#persona-fnacimiento').val('');
                              $('#seguridadusuarios-cedula').val('');
                              $('#mensajero').slideUp(500);
                              alert('Datos de Personas Fueron Ingresados con Exito....');
		},
                        
                error: function(){
                
                      alert("datos duplicados");
                 }
                
               
                
		});
              
           
         
	});//funcion
});//document


</script>

  
    
                                           <!--valida cedula con ajax-->

          <script>
              $(document).ready(function()
              {
                 $("#seguridadusuarios-cedula").blur(function(){
                   
                     $.ajax({
		type: "POST",
	        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=admin/usuarios/validar' ?>',
		data:{ cedula:$('#seguridadusuarios-cedula').val()},
		success: function(response){
                         response = JSON.parse(response);
                              if(response.success){
                              console.log(response);
                              $('#div_validacedula').html(' Aviso : Cedula ya tiene asignado un Usuario !').slideDown(500);
                              $('#seguridadusuarios-login').val(response.login);
                              $('#validador').attr('disabled', 'disabled');
                              $('#ocultoiddireccion').val(response.iddireccion);
                             }//if success
                                  if(response.false){
                                     $("#seguridadusuarios-login").removeAttr("disabled").val('');
                                     $("#seguridadusuarios-password").removeAttr("disabled").val('');
                                     $("#validador").removeAttr("disabled");
                                     $("#persona-cedula").focus();
                                     $('#div_validacedula').slideUp(500);
                                      
                                    } //if false
                         
		},
                error:function(){
                                   
                   alert('introduzca numero de cedula');           
                                    
                }
               
                
		});//ajax
                
                
              
                 }); //function
                 
                 
                 //ge-unidad ejecutora
                   $("#seguridadusuarios-cedula").blur(function(){
                      $.ajax({
                              type:'POST',
                              url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=admin/usuarios/unidadejecutora' ?>',
                              data:{iddireccion:$('#ocultoiddireccion').val()},
                              success:function(response){
 
                              console.log(response);
                             
                                  
                              }
                      });
                    });
                 
                 //
                  
              }); //document
         </script>
    

    
