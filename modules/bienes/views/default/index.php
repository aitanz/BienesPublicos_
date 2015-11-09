<?php  

use yii\helpers\Html;

$this->title = 'SISTEMA DE BIENES';

?>



   <h2 align="center"> <label>Registro de bienes</label></h2> <br>

     <div class="container" >
      <div class="main row" style="text-align:center;">
   <div class="col-md-3 column">
<h3 ><a href="?r=bienes/bienes"class ="CrearButton"><br>Crear</a></h3>

 
    </div></div></div>


         
<h2 align="center"><label>Configuracion de bienes</label></h2> <br> <br>
<br>
    <div class="container">
        <div class="main row" style="text-align:center;">
<div class="col-md-3 column">
   <h3><a href="?r=bienes/categoria"class ="myMod"><br>Categoria</a></h3>

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
 </div><!--main row-->
 </div> <!--fin de container-->
  

<!--<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Tipo de Pago'), '#', ['class' => 'myMod']) ?>
</div>-->





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