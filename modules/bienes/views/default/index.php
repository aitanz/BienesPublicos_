<?php  

use yii\helpers\Html;

$this->title = 'SISTEMA DE BIENES';

?>




<div class="container">
   <h2 align="center"> <label>Registro de bienes</label></h2> <br>
     
     <div class="main row">
     <div class="col-md-2 column">
    <?= Html::a(Yii::t('app', 'Crear'), ['/bienes/bienes/'], ['class' => 'CrearButton']) ?>
    </div>
         <br><br><br><br>
<h2 align="center"><label>Configuracion de bienes</label></h2> <br>

    
  
<div class="col-md-3 column">
<?= Html::a(Yii::t('app','Categoria'), ['/bienes/categoria/'], ['class' => 'myMod']) ?>
</div>
<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Codigo'), ['/bienes/codigo'], ['class' => 'myMod']) ?>
</div>
<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Localidad'), ['/bienes/localidad'], ['class' => 'myMod']) ?>
</div>
<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Sede'), ['/bienes/sede/'], ['class' => 'myMod']) ?>
</div>

</div><!--fin de main row -->
  </div><!--fin de container -->
<br><br>
<!--<div class="col-md-3 column">
<?= Html::a(Yii::t('app', 'Tipo de Pago'), '#', ['class' => 'myMod']) ?>
</div>-->





 <style type="text/css">
.myMod {
	/*--ajuste generales--*/
	-moz-box-shadow:inset -3px 10px 0px -1px #bbdaf7;
	-webkit-box-shadow:inset -3px 10px 0px -1px #bbdaf7;
	
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5));
	background:-moz-linear-gradient(top, #79bbff 5%, #378de5 100%);
	background:-webkit-linear-gradient(top, #79bbff 5%, #378de5 100%);
	background:-o-linear-gradient(top, #79bbff 5%, #378de5 100%);
	background:-ms-linear-gradient(top, #79bbff 5%, #378de5 100%);
	background:linear-gradient(to bottom, #79bbff 5%, #378de5 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5',GradientType=0);
	background-color:#79bbff;
	-moz-border-radius:41px;
	-webkit-border-radius:41px;
	
	border:5px solid #84bbf3;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:30px;
	font-weight:bold;
	padding:26px 48px;
	
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
      
}


.myMod:hover {
	/*--ajuste al pasar el puntero--*/
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #141413), color-stop(1, #79bbff));
	background:-moz-linear-gradient(top, #141413 5%, #79bbff 100%);
	background:-webkit-linear-gradient(top, #141413 5%, #79bbff 100%);
	background:-o-linear-gradient(top, #141413 5%, #79bbff 100%);
	background:-ms-linear-gradient(top, #141413 5%, #79bbff 100%);
	background:linear-gradient(to bottom, #141413 5%, #79bbff 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff',GradientType=0);
	background-color:#141413;
     
}
.myMod:active {
	position:relative;
	top:1px;
}

 .CrearButton {
	-moz-box-shadow:inset 0px 7px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 7px 0px 0px #bbdaf7;
	
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #44c767), color-stop(1, #5cbf2a));
	background:-moz-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-webkit-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-o-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:-ms-linear-gradient(top, #44c767 5%, #5cbf2a 100%);
	background:linear-gradient(to bottom, #44c767 5%, #5cbf2a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#44c767', endColorstr='#5cbf2a',GradientType=0);
	background-color:#44c767;
	-moz-border-radius:41px;
	-webkit-border-radius:41px;
	
	border:4px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:30px;
	font-weight:bold;
	padding:26px 48px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
      

}
.CrearButton:hover {
        
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #141413), color-stop(1, #44c767));
	background:-moz-linear-gradient(top, #141413 5%, #44c767 100%);
	background:-webkit-linear-gradient(top, #5cbf2a 5%, #44c767 100%);
	background:-o-linear-gradient(top, #141413 5%, #44c767 100%);
	background:-ms-linear-gradient(top, #141413 5%, #44c767 100%);
	background:linear-gradient(to bottom, #141413 5%, #44c767 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#141413', endColorstr='#44c767',GradientType=0);
	background-color:#141413;
}
.CrearButton::before {
	/*--ajuste de icono de crear--*/
    content: "\f044";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;

    color: #000;
    font-size: 30px;
    padding-right: 0.5em;
    position: absolute;
    top: 30px;
    left: 40px;
}
.myMod::before {
	/*--ajuste de icono de configuracion--*/
    content: "\f013";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    color: #000;
    font-size: 30px;
    padding-right: 0.5em;
    position: absolute;
     top: 30px;
    left: 30px;
}




.CrearButton:active {
	position:relative;
	top:1px;
}

/*tamaño de boton*/
.CrearButton , .myMod
{ 
  width:220px;
height:100px; 
text-align: center;
}       
 </style>