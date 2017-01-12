<?php

$this->title = Yii::t('app', 'Sistema Administrativo');

$this->params['breadcrumbs'][] = $this->title;
?>

 <div class="container" >
      <div class="main row" style="text-align:center;">
          <h1><strong>SISTEMA INTEGRAL DE ADMINISTRACIÓN PÚBLICA</strong></h1>
          <br><br>

<div class="col-md-3 column">
<h3><a href="?r=bienes" class="CrearButton"><br>BIENES</a> </h3>
</div>
 </div>

      </div>


<style type="text/css">
.CrearButton::before {
	/*--ajuste de icono de crear--*/
    content: "\f1ad";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    

    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;
    

}
.CrearButton ,.myMod, .myDolar {

	color: #5A5A5B;

}
.myMod::before {
	/*--ajuste de icono de configuracion--*/
   content: "\f044";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    

    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;
    
    
}
.myDolar::before {
	/*--ajuste de icono de configuracion--*/
   content: "\f15a";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    

    color: #5A5A5B;
    font-size: 50px;
    padding-right: 0;
    
    
}



</style>
