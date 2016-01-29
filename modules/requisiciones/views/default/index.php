<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
$this->title = 'SISTEMA DE BIENES';
$ad = !\Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin();
$idusuario = \yii::$app->user->Identity->id_usuario;
?>
  <h3 ><?= Html::a("<br>Reportes", '#', [
            'id' => 'reportico_popup',
            'class' => 'myMod',
            'data-url' => Url::toRoute(['/reportico/mode/prepare',
                            'project' => 'requisiciones', 
                            'project_password' => '123321',  // Only necessary for password protected projects
                            'new_reportico_window' => 1,
                            'report' => 'requisiciones.xml'])

        ]); ?></h3>
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
    jQuery.ajax({
    type: 'GET',
    url: jQuery(this).data('url')
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
.CrearButton ,.myMod{

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




</style>