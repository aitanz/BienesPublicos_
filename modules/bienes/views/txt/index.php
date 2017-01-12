<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
$this->title = 'TXT SISTEMA DE BIENES';

?>
 
      <div class="main row" style="text-align:center;">
            <div class="col-md-3 column">
<h3><a href="?r=bienes/txt/muebles"class="myReport"><br>muebles_A</a></h3>
   </div>
   <div class="col-md-3 column">
<h3><a href="?r=bienes/txt/marcas"class="myReport"><br>Marcas</a></h3>
   </div>
            <div class="col-md-3 column">
<h3><a href="?r=bienes/txt/modelos"class="myReport"><br>Modelos</a></h3>
   </div>
    
          <div class="col-md-3 column"> 
<h3><a href="?r=bienes/txt/unidades"class="myReport"><br>Unidades</a></h3>
   </div>
                               <div class="col-md-3 column"><br>
<h3><?= Html::a("<br>Basicos", '#', [
            'id' => 'reportico_popup',
            'class' => 'myReport',
            'data-url' => Url::toRoute(['/reportico/mode/prepare',
                            'project' => 'bienes', 
                            'project_password' => '123321',  // Only necessary for password protected projects
                            'new_reportico_window' => 1,
                            'report' => 'basicos.xml'])

        ]); ?></h3>
   </div>
                <div class="col-md-3 column"> <br>
<h3><a href="?r=bienes/txt/responsables"class="myReport"><br>Responsables</a></h3>
   </div>
      </div>
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

<style type="text/css">

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

.myReport{

	color: #5A5A5B;

}




</style>
