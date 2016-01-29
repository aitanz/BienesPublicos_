<?php  

use yii\helpers\Html;

$this->title = 'SISTEMA DE ORGANIZACIÓN';

?>



   <h2 align="center"> <label>ORGANIZACIÓN</label></h2> <br>

     <div class="container" >
      <div class="main row" style="text-align:center;">
   <div class="col-md-4 column">
<h3><a href="?r=organizacion/organizacion"class ="CrearButton"><br>Organización</a></h3>
 </div>
       <div class="col-md-4 column">
<h3><a href="?r=organizacion/uadministrativa"class ="CrearButton"><br> Unidad Administrativa</a></h3>
 </div>
     </div></div>







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