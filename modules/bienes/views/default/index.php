<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
$this->title = 'SISTEMA DE BIENES';
$ad = !\Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();
$idusuario = \yii::$app->user->Identity->id_usuario;
?>

 

   <h2 align="center"><label>Registro de Bienes</label><a href="http://siap.anz/OpenSiap/"</a></h2> <br>

     
      <div class="main row" style="text-align:center;">
   <div class="col-md-3 column">
     <h3><a href="?r=bienes/bienes"class ="CrearButton"><br>Crear</a></h3>
   </div>
 <div class="col-md-3 column" id="ocultar">
  <h3 ><?= Html::a("<br>Reportes", '#', [
            'id' => 'reportico_popup',
            'class' => 'myReport',
            'data-url' => Url::toRoute(['/reportico/mode/prepare',
                            'project' => 'bienes', 
                            'project_password' => '123321',  // Only necessary for password protected projects
                            'new_reportico_window' => 1,
                            'report' => 'bienes.xml'])

        ]); ?></h3>
                
          </div>
           <div class="col-md-3 column" >
  <h3><a href="?r=bienes/txt"class ="myReport"><br>TXT</a></h3>
                
          </div>
</div>  

   <br>
<h2 align="center"><label>Configuración de Bienes</label></h2>
<br>

        <div class="main row" style="text-align:center;">
<div class="col-md-3 column">
   <h3><a href="?r=bienes/categoria" class ="myMod"><br>Categoria</a></h3>

 </div>
<div class="col-md-3 column">
 <h3><a href="?r=bienes/codigo"class ="myMod"><br>Codigo</a></h3>

 </div>
 <div class="col-md-3 column">
<h3><a href="?r=bienes/localidad"class ="myMod"><br>Localidad</a></h3>

 </div>
 <div class="col-md-2 column">
 <h3><a href="?r=bienes/sede"class ="myMod"><br>Sede</a></h3>

 </div>
            <div class="col-md-3 column"><br>
 <h3><a href="?r=bienes/marcas"class="myMar"><br>Marcas</a></h3>

 </div>
            <div class="col-md-3 column"><br>
 <h3><a href="?r=bienes/modelos"class="myMar"><br>Modelos</a></h3>

 </div>
 </div><!--main row-->
 


<!--<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Tipo de Pago'), '#', ['class' => 'myMod']) ?>
</div>-->
<?php
Modal::begin([
            'id' => 'myModal',
            'header' => 'MENU DE REPORTES',
            'size' => 'modal-lg'
        ]);
?> 
        <div id='modalcontent'></div>
<?php 
    Modal::end();
?>

<?php
$this->registerJs(
"
$(document).on('click', '#reportico_popup', function(event)
{ 
    $('#myModal').modal('show') ;
    $('#modalcontent').html('Espere..');
    $.ajax({
    type: 'GET',
    url: $(this).data('url')
    }).
    done(function(html_form) {
        $('#modalcontent').html(html_form);
        reportico_initialise_page();
    });
    return false;
});");
?>
<!--BLOQUEAR LOGO REPORTES-->
        
        <script>
       var add= "<?php echo json_encode($ad); ?>";
       var usuario="<?php echo json_encode($idusuario);?>";

   $(document).ready( function()
           
    { 
        if (add==="true" || usuario==="47")
        {
      $("#ocultar").show(); 
        }
                    else
            {
      $("#ocultar").hide();
  
                     }
  
  
    }
            
            
            );
       

        </script>

<style type="text/css">


.CrearButton::before {
	/*--ajuste de icono de crear--*/
    content: "\f044";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;


    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;


}
.CrearButton ,.myMod,.myReport,.myMar{

	color: #5A5A5B;

}
.myMod::before {
	/*--ajuste de icono de configuracion--*/
   content: "\f085";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;


    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;


}
.myReport::before {
	/*--ajuste de icono de configuracion--*/
   content: "\f0f6";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;


    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;


}
.myMar::before {
	/*--ajuste de icono de configuracion--*/
   content: "\f1b2";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;


    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;





</style>
