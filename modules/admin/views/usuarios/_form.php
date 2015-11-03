<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use yii\widgets\Pjax;
use kartik\password\PasswordInput;
use app\modules\admin\models\Persona;
use app\modules\admin\models\Direccion;
use app\modules\admin\models\SeguridadUsuarios;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SeguridadUsuarios */
/* @var $form yii\widgets\ActiveForm */
  
$person = new Persona();
$direccion = new Direccion();
?>
<br>

<div class="seguridad-usuarios-form">
    
         <div class="container">
              
                <div class="main row">
                        <div class="col-md-5 column">
                            <div class="panel panel-primary">
                                <div class="panel-heading">DATOS DE USUARIO</div>
                                    <div class="panel-body">
                                    <?php $form = ActiveForm::begin(['id'=>'usuario_form',
                                                                     'enableClientValidation' => true,
                                                                     'enableAjaxValidation' => true,
                                                                     'validateOnSubmit' => true,
                                                                     'validateOnChange' => true,
                                                                     'validateOnType' => true]); ?>
                                        
                                        <?= $form->field($model, 'cedula')->input('number') ?> 

                                        <?= $form->field($model, 'id_direccion')->dropdownList(Arrayhelper::map(Direccion::find()->orderBy('nombre')->all(), 'iddireccion', 'nombre'), ['prompt' => 'unidad'])->label('Unidad Administrativa');?>

                                        <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

                                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                                        <label for="confirmar">Confirmar</label>
                                        <input type="password" name="confirmar" id="confirmar" class="form-control">
                                        <div id="confirmar_pass"style="font-size:16px;color:red;display:none" ></div> <!--confirmar pass--><br><br>
                                        
                                        
                                       
                                            <div class="form-group">
                                             <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                             <button type="reset" class="btn btn-danger" value="reset" id="reset"> Cancel</button>
                                            </div>
                                        
                                            <?ActiveForm::end()  ?>
                                    </div><!--panel-body-->
                            </div> <!--panel-->
                            
                            
                            
                            
                            
                            
                  
                        </div><!--col-md-5-->

                        <div class ="col-md-5 column">
                            <div class="panel panel-primary">
                                <div class="panel-heading">DATOS DE PERSONAS</div>
                                <div class="panel-body">
                                    <div id="mensajero"style="font-size:16px;color:red;display:none"> 
                                    
                                    
                                    </div>
                                    
                                     <?php $form = ActiveForm::begin(['id'=>'persona_form']); ?>
                                    
                                    <?= $form->field($person, 'cedula')->textInput(); ?>
                                   
                                    <?= $form->field($person, 'nombres')->textInput(); ?>

                                    <?= $form->field($person, 'apellidos')->textInput(); ?>
                                    
                                    <?= $form->field($person, 'direccion')->textInput(); ?>
                                    
                                    <div class="form-group">
                                        <label>Fecha Nacimiento</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control"  placeholder="DD-MM-YY" type='datetime' name='fecha' >
                                        </div><!-- /.input group -->
                                     </div>
                                    
                                    <?= $form->field($person, 'tlf1')->textInput()->label('Telefono'); ?>
                                    
                                    <?= $form->field($person, 'correoe')->textInput()->label('Correo'); ?>
                                    
                                    <?= $form->field($person, 'sexo')->radioList(array('m'=>'Masculino','f'=>'Femenino')); ?>
                                 
                                    
                                      
                                    <div class="frmSearch">
                                      <input type="text" id="search-box" class="form-control" placeholder="buscar usuario" />
                                     <div id="suggesstion-box"></div>    
                                    </div><BR>
                                    
                                    <div id="div_insertapersona" style="display:none;"> 
                                         <button id="btn_insertarpersona" type="button" class="btn btn-info">INSERTAR PERSONAS</button>
                                          
                                    </div> 
                                    
                                     <button id="persona" type="button" class="btn btn-default">INSERTAR PERSONAS</button>
                                     
                                     <?php Pjax::begin(); ?>
                                     <?= Html::a("send", ['usuarios/index'], ['class' => 'btn btn-lg btn-primary','id'=>'bajax']) ?>
                                     <?php Pjax::end(); ?>
                                     <br><br>
                                     <spam id="pan"><a href src="#">pan</a></spam> <br>
                                     
                                     
                                        <?ActiveForm::end()  ?>
                                </div><!--panel-body-->
                            </div> <!--panel-->
                        </div>
                            
                           
                      
                        </div><!--row-->
                        
                       
                        
                          <?php  // ActiveForm::end(); ?>
                </div><!--container-->
        </div><!--form-->


<script>                                //buscar persona por cedula
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
                                    console.log(response);
                                      if( response.success){
                                       $('#persona-cedula').val(response.cedula).attr('disabled','disabled');
			               $('#persona-nombres').val(response.nombres).attr('disabled', 'disabled');
                                       $('#persona-apellidos').val(response.apellidos).attr('disabled', 'disabled');
                                       $('#persona-direccion').val(response.direccion).attr('disabled', 'disabled');
                                       $('#persona-tlf1').val(response.telefono).attr('disabled', 'disabled');
                                       $('#persona-correoe').val(response.correo).attr('disabled', 'disabled');
                                       $('#mensajero').html(' Aviso : Cedula Registrada!').slideUp(500);
                                       //bloquear formulario de registro de usuarios
                                       $('#direccion-nombre').removeAttr('disable').val('');
				      }
                                      
                                      if(response.false){
                                          //remover atributo disable
                                           $('#persona-cedula').removeAttr("disabled").val('');
                                           $('#persona-nombres').removeAttr("disabled").val('');
                                           $('#persona-apellidos').removeAttr("disabled").val('');
                                           $('#persona-direccion').removeAttr("disabled").val('');
                                           $('#persona-tlf1').removeAttr("disabled").val('');
                                           $('#persona-correoe').removeAttr("disabled").val('');
                                           $('#mensajero').html(' Aviso : Cedula no Registrada!').slideDown(500);
                                           //desabilitar campos formulario usuarios
                                           
                                           $('#seguridadusuarios-id_direccion').attr('disabled','disabled');
                                           $('#seguridadusuarios-login').attr('disabled','disabled');
                                           $('#seguridadusuarios-password').attr('disabled', 'disabled');
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
                             $("#confirmar_pass").slideup(500);
                       } 
                   });
            });//document
            
</script>

 <script>                      //enviar formulario personas
$(document).ready(function(){
	$("#pan").click(function(e){
            e.preventDefault();
             $.ajax({
		type: "POST",
	        url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=admin/usuarios/insertapersona' ?>',
		data:{ cedula:$('#persona-cedula').val(),
                       nombres:$('#persona-nombres').val(),
                       apellidos:$('#persona-apellidos').val(),
                       direccion:$('#persona-direccion').val()},
		
		success: function(response){
                        console.log(response);
			
		}
               
                
		});
              
           
         
	});//funcion
});//document


</script>
    
    
