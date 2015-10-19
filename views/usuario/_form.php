<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwd')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idefiscal')->textInput() ?>

    <?= $form->field($model, 'idorganizacion')->textInput() ?>

    <?= $form->field($model, 'persona')->textInput() ?>

    <?= $form->field($model, 'accaplicacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accorganizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accestructura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccambiofecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpersona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccambioefiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acciva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdesbloquear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdesconectar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctasaactiva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariocat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accfichacat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvalorterrecat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvalortipocat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdepreciacioncat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcedcat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepceremp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfichacat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgenseccat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccontribuyente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdeclaraciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedocuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfigcome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariocome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreppatente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accimpedoctasectcome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgensector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepactividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfecdecla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmondecla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accimppatente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accinmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctainmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvalfisterre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvalfiscons')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfiginmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarioinmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusrepsectcat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusrepmontaval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusreptipconstruc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusrepmontdeud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusrepvalorconstruc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accimpedoctasectinmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accclaseapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctaapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfigapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarioapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accclasevehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctavehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfigvehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariovehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgenvehi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontvehideud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptipvehi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpublicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accclasepublicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctapublicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfigpublicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariopublicidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgensecpubli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontpublideud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptippubli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepedoctapubli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctarenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfigrenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariorenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accefiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccatpro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpuc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccrearfactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accanularfactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariofactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctiporenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgenrenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accurepcontratorenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdeudarenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepedoctarenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptiporenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accbanco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccuentabancaria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numcaja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariopresu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accformpresu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaprobpresup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreppuc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepformpresu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreppresuing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepedofinanc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmovpresu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcondicpar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcomprom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpartext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaumentopart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdisminucionpart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctraslado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccompromiso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accfacturar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accanularfact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariofacturacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfactemit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accurepfactporcobrar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfactcobrada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfactanulada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfactportipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accingresos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accsupervisor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepresumcaja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptransdiarias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepactutransac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptransacciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontrolcheq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontroldepo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariocaja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctipoingreso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctipoimpuesto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepconstancia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepvalconstruc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepvalterreno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdepreciacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptipoapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgensectapu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdeclanualapu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdeudapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepedoctapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactudeuindustria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactudeuinmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactudeurenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactudeuvehiculo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactudeuapuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctasapasiva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accgestores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accasignacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvisitas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accefectividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepresucaja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptransadia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmovactu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdeudaperi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfactuasigna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdeudarecu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariogestion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acclicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actipotasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accedoctalicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconfiglicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariolicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgenseclicor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontlicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptipotasa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepedoctalicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accexplicores')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctiporetencion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarioadmini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accegresos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctransferenciabanc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accconciliacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccheqanul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdebito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccredito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccausar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaproborden')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepordenpago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepbanco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepretencion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepfondoterc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdeposito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accfondotercero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpagoordenes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accregobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarioingenieria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accasigobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccaratula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccuaderno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepgenobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepobrasasig')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepobraejecu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepcontratista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccamstainmue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccontratista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccargos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accactivos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaprocompro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accsolisuministro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accunimedi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accproveedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctipoproducto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accproducto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrequisicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accsolicompra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaprosolicompra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariocompra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreprespalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepsolicompra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepsolisumi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreprequisicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccontrolinterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccuentacontable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaprobpagoobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accsolicpagoobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accubicacionalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accentradaalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accsalidaalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdespachoalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acclisgencompraalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acclismovcompraalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acclisinventario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acclissolicompraalmacen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accaprodesaprodespacho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accespecial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepresugenobra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarionomina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accpermdecla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accacreditacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctipomulta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultaindu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultainmu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultavehi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultaapu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultapropa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultarenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmultalico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accformucue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accvincucue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepplancue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepvincucue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuarioconta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctipoactivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accubicacionbien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmotivoincorporacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accmotivodesincorporacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accincorporacionmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accincorporacioninmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdesincorporacionmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accdesincorporacioninmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acctransferenciabien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptipoactivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepubicacionbien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdisposicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepincorporacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepdesincorporacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accreptransferencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accusuariobien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acccargarcue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accasiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'liquidador')->checkbox() ?>

    <?= $form->field($model, 'accmodreten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepobras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accenvchecausar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poseeimpresora')->checkbox() ?>

    <?= $form->field($model, 'puerto')->textInput() ?>

    <?= $form->field($model, 'accrepcatcue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepsalini')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepsaldo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepbalacom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepbalagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepasiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepestamov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepinvemueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepresuinvemueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmovimueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmresucuemue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accrepmayoranali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accacticontri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'impresora')->textInput() ?>

    <?= $form->field($model, 'accadministrador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idcoordinacion')->textInput() ?>

    <?= $form->field($model, 'iddireccion')->textInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
