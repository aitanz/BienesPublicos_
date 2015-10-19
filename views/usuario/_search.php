<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idusuario') ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'passwd') ?>

    <?= $form->field($model, 'idefiscal') ?>

    <?= $form->field($model, 'idorganizacion') ?>

    <?php // echo $form->field($model, 'persona') ?>

    <?php // echo $form->field($model, 'accaplicacion') ?>

    <?php // echo $form->field($model, 'accorganizacion') ?>

    <?php // echo $form->field($model, 'accestructura') ?>

    <?php // echo $form->field($model, 'acccambiofecha') ?>

    <?php // echo $form->field($model, 'accusuario') ?>

    <?php // echo $form->field($model, 'accpersona') ?>

    <?php // echo $form->field($model, 'acccambioefiscal') ?>

    <?php // echo $form->field($model, 'acciva') ?>

    <?php // echo $form->field($model, 'accut') ?>

    <?php // echo $form->field($model, 'accdesbloquear') ?>

    <?php // echo $form->field($model, 'accdesconectar') ?>

    <?php // echo $form->field($model, 'acctasaactiva') ?>

    <?php // echo $form->field($model, 'accusuariocat') ?>

    <?php // echo $form->field($model, 'accfichacat') ?>

    <?php // echo $form->field($model, 'accvalorterrecat') ?>

    <?php // echo $form->field($model, 'accvalortipocat') ?>

    <?php // echo $form->field($model, 'accdepreciacioncat') ?>

    <?php // echo $form->field($model, 'accrepcedcat') ?>

    <?php // echo $form->field($model, 'accrepceremp') ?>

    <?php // echo $form->field($model, 'accrepfichacat') ?>

    <?php // echo $form->field($model, 'accrepgenseccat') ?>

    <?php // echo $form->field($model, 'acccontribuyente') ?>

    <?php // echo $form->field($model, 'accactividad') ?>

    <?php // echo $form->field($model, 'accdeclaraciones') ?>

    <?php // echo $form->field($model, 'accedocuenta') ?>

    <?php // echo $form->field($model, 'accconfigcome') ?>

    <?php // echo $form->field($model, 'accusuariocome') ?>

    <?php // echo $form->field($model, 'accreppatente') ?>

    <?php // echo $form->field($model, 'accimpedoctasectcome') ?>

    <?php // echo $form->field($model, 'accrepgensector') ?>

    <?php // echo $form->field($model, 'accrepactividad') ?>

    <?php // echo $form->field($model, 'accrepfecdecla') ?>

    <?php // echo $form->field($model, 'accrepmondecla') ?>

    <?php // echo $form->field($model, 'accimppatente') ?>

    <?php // echo $form->field($model, 'accinmueble') ?>

    <?php // echo $form->field($model, 'accedoctainmue') ?>

    <?php // echo $form->field($model, 'accvalfisterre') ?>

    <?php // echo $form->field($model, 'accvalfiscons') ?>

    <?php // echo $form->field($model, 'accconfiginmue') ?>

    <?php // echo $form->field($model, 'accusuarioinmue') ?>

    <?php // echo $form->field($model, 'accusrepsectcat') ?>

    <?php // echo $form->field($model, 'accusrepmontaval') ?>

    <?php // echo $form->field($model, 'accusreptipconstruc') ?>

    <?php // echo $form->field($model, 'accusrepmontdeud') ?>

    <?php // echo $form->field($model, 'accusrepvalorconstruc') ?>

    <?php // echo $form->field($model, 'accimpedoctasectinmue') ?>

    <?php // echo $form->field($model, 'accapuesta') ?>

    <?php // echo $form->field($model, 'accclaseapuesta') ?>

    <?php // echo $form->field($model, 'accedoctaapuesta') ?>

    <?php // echo $form->field($model, 'accconfigapuesta') ?>

    <?php // echo $form->field($model, 'accusuarioapuesta') ?>

    <?php // echo $form->field($model, 'accvehiculo') ?>

    <?php // echo $form->field($model, 'accclasevehiculo') ?>

    <?php // echo $form->field($model, 'accedoctavehiculo') ?>

    <?php // echo $form->field($model, 'accconfigvehiculo') ?>

    <?php // echo $form->field($model, 'accusuariovehiculo') ?>

    <?php // echo $form->field($model, 'accrepgenvehi') ?>

    <?php // echo $form->field($model, 'accrepcontvehideud') ?>

    <?php // echo $form->field($model, 'accreptipvehi') ?>

    <?php // echo $form->field($model, 'accpublicidad') ?>

    <?php // echo $form->field($model, 'accclasepublicidad') ?>

    <?php // echo $form->field($model, 'accedoctapublicidad') ?>

    <?php // echo $form->field($model, 'accconfigpublicidad') ?>

    <?php // echo $form->field($model, 'accusuariopublicidad') ?>

    <?php // echo $form->field($model, 'accrepgensecpubli') ?>

    <?php // echo $form->field($model, 'accrepcontpublideud') ?>

    <?php // echo $form->field($model, 'accreptippubli') ?>

    <?php // echo $form->field($model, 'accrepedoctapubli') ?>

    <?php // echo $form->field($model, 'accrenta') ?>

    <?php // echo $form->field($model, 'accedoctarenta') ?>

    <?php // echo $form->field($model, 'accconfigrenta') ?>

    <?php // echo $form->field($model, 'accusuariorenta') ?>

    <?php // echo $form->field($model, 'accefiscal') ?>

    <?php // echo $form->field($model, 'acccatpro') ?>

    <?php // echo $form->field($model, 'accpuc') ?>

    <?php // echo $form->field($model, 'acccrearfactura') ?>

    <?php // echo $form->field($model, 'accanularfactura') ?>

    <?php // echo $form->field($model, 'accusuariofactura') ?>

    <?php // echo $form->field($model, 'acctiporenta') ?>

    <?php // echo $form->field($model, 'accrepgenrenta') ?>

    <?php // echo $form->field($model, 'accurepcontratorenta') ?>

    <?php // echo $form->field($model, 'accrepdeudarenta') ?>

    <?php // echo $form->field($model, 'accrepedoctarenta') ?>

    <?php // echo $form->field($model, 'accreptiporenta') ?>

    <?php // echo $form->field($model, 'accbanco') ?>

    <?php // echo $form->field($model, 'acccuentabancaria') ?>

    <?php // echo $form->field($model, 'numcaja') ?>

    <?php // echo $form->field($model, 'accusuariopresu') ?>

    <?php // echo $form->field($model, 'accformpresu') ?>

    <?php // echo $form->field($model, 'accaprobpresup') ?>

    <?php // echo $form->field($model, 'accreppuc') ?>

    <?php // echo $form->field($model, 'accrepformpresu') ?>

    <?php // echo $form->field($model, 'accreppresuing') ?>

    <?php // echo $form->field($model, 'accrepedofinanc') ?>

    <?php // echo $form->field($model, 'accrepmovpresu') ?>

    <?php // echo $form->field($model, 'accrepcondicpar') ?>

    <?php // echo $form->field($model, 'accrepcomprom') ?>

    <?php // echo $form->field($model, 'accpartext') ?>

    <?php // echo $form->field($model, 'accaumentopart') ?>

    <?php // echo $form->field($model, 'accdisminucionpart') ?>

    <?php // echo $form->field($model, 'acctraslado') ?>

    <?php // echo $form->field($model, 'acccompromiso') ?>

    <?php // echo $form->field($model, 'accfacturar') ?>

    <?php // echo $form->field($model, 'accanularfact') ?>

    <?php // echo $form->field($model, 'accusuariofacturacion') ?>

    <?php // echo $form->field($model, 'accrepfactemit') ?>

    <?php // echo $form->field($model, 'accurepfactporcobrar') ?>

    <?php // echo $form->field($model, 'accrepfactcobrada') ?>

    <?php // echo $form->field($model, 'accrepfactanulada') ?>

    <?php // echo $form->field($model, 'accrepfactportipo') ?>

    <?php // echo $form->field($model, 'accingresos') ?>

    <?php // echo $form->field($model, 'accsupervisor') ?>

    <?php // echo $form->field($model, 'accrepresumcaja') ?>

    <?php // echo $form->field($model, 'accreptransdiarias') ?>

    <?php // echo $form->field($model, 'accrepactutransac') ?>

    <?php // echo $form->field($model, 'accreptransacciones') ?>

    <?php // echo $form->field($model, 'accrepcontrolcheq') ?>

    <?php // echo $form->field($model, 'accrepcontroldepo') ?>

    <?php // echo $form->field($model, 'accusuariocaja') ?>

    <?php // echo $form->field($model, 'acctipoingreso') ?>

    <?php // echo $form->field($model, 'acctipoimpuesto') ?>

    <?php // echo $form->field($model, 'accrepconstancia') ?>

    <?php // echo $form->field($model, 'accrepvalconstruc') ?>

    <?php // echo $form->field($model, 'accrepvalterreno') ?>

    <?php // echo $form->field($model, 'accrepdepreciacion') ?>

    <?php // echo $form->field($model, 'accreptipoapuesta') ?>

    <?php // echo $form->field($model, 'accrepgensectapu') ?>

    <?php // echo $form->field($model, 'accrepdeclanualapu') ?>

    <?php // echo $form->field($model, 'accrepdeudapuesta') ?>

    <?php // echo $form->field($model, 'accrepedoctapuesta') ?>

    <?php // echo $form->field($model, 'accactudeuindustria') ?>

    <?php // echo $form->field($model, 'accactudeuinmue') ?>

    <?php // echo $form->field($model, 'accactudeurenta') ?>

    <?php // echo $form->field($model, 'accactudeuvehiculo') ?>

    <?php // echo $form->field($model, 'accactudeuapuesta') ?>

    <?php // echo $form->field($model, 'acctasapasiva') ?>

    <?php // echo $form->field($model, 'accgestores') ?>

    <?php // echo $form->field($model, 'accasignacion') ?>

    <?php // echo $form->field($model, 'accvisitas') ?>

    <?php // echo $form->field($model, 'accefectividad') ?>

    <?php // echo $form->field($model, 'accrepresucaja') ?>

    <?php // echo $form->field($model, 'accreptransadia') ?>

    <?php // echo $form->field($model, 'accrepmovactu') ?>

    <?php // echo $form->field($model, 'accrepdeudaperi') ?>

    <?php // echo $form->field($model, 'accrepfactuasigna') ?>

    <?php // echo $form->field($model, 'accrepdeudarecu') ?>

    <?php // echo $form->field($model, 'accusuariogestion') ?>

    <?php // echo $form->field($model, 'acclicores') ?>

    <?php // echo $form->field($model, 'actipotasa') ?>

    <?php // echo $form->field($model, 'accedoctalicores') ?>

    <?php // echo $form->field($model, 'accconfiglicores') ?>

    <?php // echo $form->field($model, 'accusuariolicores') ?>

    <?php // echo $form->field($model, 'accrepgenseclicor') ?>

    <?php // echo $form->field($model, 'accrepcontlicores') ?>

    <?php // echo $form->field($model, 'accreptipotasa') ?>

    <?php // echo $form->field($model, 'accrepedoctalicores') ?>

    <?php // echo $form->field($model, 'accexplicores') ?>

    <?php // echo $form->field($model, 'acctiporetencion') ?>

    <?php // echo $form->field($model, 'accusuarioadmini') ?>

    <?php // echo $form->field($model, 'accegresos') ?>

    <?php // echo $form->field($model, 'acctransferenciabanc') ?>

    <?php // echo $form->field($model, 'accconciliacion') ?>

    <?php // echo $form->field($model, 'acccheqanul') ?>

    <?php // echo $form->field($model, 'accdebito') ?>

    <?php // echo $form->field($model, 'acccredito') ?>

    <?php // echo $form->field($model, 'acccausar') ?>

    <?php // echo $form->field($model, 'accaproborden') ?>

    <?php // echo $form->field($model, 'accrepordenpago') ?>

    <?php // echo $form->field($model, 'accrepbanco') ?>

    <?php // echo $form->field($model, 'accrepretencion') ?>

    <?php // echo $form->field($model, 'accrepfondoterc') ?>

    <?php // echo $form->field($model, 'accdeposito') ?>

    <?php // echo $form->field($model, 'accfondotercero') ?>

    <?php // echo $form->field($model, 'accpagoordenes') ?>

    <?php // echo $form->field($model, 'accregobras') ?>

    <?php // echo $form->field($model, 'accusuarioingenieria') ?>

    <?php // echo $form->field($model, 'accasigobras') ?>

    <?php // echo $form->field($model, 'acccaratula') ?>

    <?php // echo $form->field($model, 'acccuaderno') ?>

    <?php // echo $form->field($model, 'accrepgenobras') ?>

    <?php // echo $form->field($model, 'accrepobrasasig') ?>

    <?php // echo $form->field($model, 'accrepobraejecu') ?>

    <?php // echo $form->field($model, 'accrepcontratista') ?>

    <?php // echo $form->field($model, 'acccamstainmue') ?>

    <?php // echo $form->field($model, 'acccontratista') ?>

    <?php // echo $form->field($model, 'acccargos') ?>

    <?php // echo $form->field($model, 'accactivos') ?>

    <?php // echo $form->field($model, 'accaprocompro') ?>

    <?php // echo $form->field($model, 'accalmacen') ?>

    <?php // echo $form->field($model, 'accsolisuministro') ?>

    <?php // echo $form->field($model, 'accunimedi') ?>

    <?php // echo $form->field($model, 'accproveedor') ?>

    <?php // echo $form->field($model, 'acctipoproducto') ?>

    <?php // echo $form->field($model, 'accproducto') ?>

    <?php // echo $form->field($model, 'accrequisicion') ?>

    <?php // echo $form->field($model, 'accsolicompra') ?>

    <?php // echo $form->field($model, 'accaprosolicompra') ?>

    <?php // echo $form->field($model, 'accusuariocompra') ?>

    <?php // echo $form->field($model, 'accrepalmacen') ?>

    <?php // echo $form->field($model, 'accreprespalmacen') ?>

    <?php // echo $form->field($model, 'accrepsolicompra') ?>

    <?php // echo $form->field($model, 'accrepsolisumi') ?>

    <?php // echo $form->field($model, 'accreprequisicion') ?>

    <?php // echo $form->field($model, 'acccontrolinterno') ?>

    <?php // echo $form->field($model, 'acccuentacontable') ?>

    <?php // echo $form->field($model, 'accaprobpagoobras') ?>

    <?php // echo $form->field($model, 'accsolicpagoobras') ?>

    <?php // echo $form->field($model, 'accubicacionalmacen') ?>

    <?php // echo $form->field($model, 'accentradaalmacen') ?>

    <?php // echo $form->field($model, 'accsalidaalmacen') ?>

    <?php // echo $form->field($model, 'accdespachoalmacen') ?>

    <?php // echo $form->field($model, 'acclisgencompraalmacen') ?>

    <?php // echo $form->field($model, 'acclismovcompraalmacen') ?>

    <?php // echo $form->field($model, 'acclisinventario') ?>

    <?php // echo $form->field($model, 'acclissolicompraalmacen') ?>

    <?php // echo $form->field($model, 'accaprodesaprodespacho') ?>

    <?php // echo $form->field($model, 'accespecial') ?>

    <?php // echo $form->field($model, 'accrepresugenobra') ?>

    <?php // echo $form->field($model, 'accusuarionomina') ?>

    <?php // echo $form->field($model, 'accpermdecla') ?>

    <?php // echo $form->field($model, 'accacreditacion') ?>

    <?php // echo $form->field($model, 'acctipomulta') ?>

    <?php // echo $form->field($model, 'accmultaindu') ?>

    <?php // echo $form->field($model, 'accmultainmu') ?>

    <?php // echo $form->field($model, 'accmultavehi') ?>

    <?php // echo $form->field($model, 'accmultaapu') ?>

    <?php // echo $form->field($model, 'accmultapropa') ?>

    <?php // echo $form->field($model, 'accmultarenta') ?>

    <?php // echo $form->field($model, 'accmultalico') ?>

    <?php // echo $form->field($model, 'accformucue') ?>

    <?php // echo $form->field($model, 'accvincucue') ?>

    <?php // echo $form->field($model, 'accrepplancue') ?>

    <?php // echo $form->field($model, 'accrepvincucue') ?>

    <?php // echo $form->field($model, 'accusuarioconta') ?>

    <?php // echo $form->field($model, 'acctipoactivo') ?>

    <?php // echo $form->field($model, 'accubicacionbien') ?>

    <?php // echo $form->field($model, 'accmotivoincorporacion') ?>

    <?php // echo $form->field($model, 'accmotivodesincorporacion') ?>

    <?php // echo $form->field($model, 'accincorporacionmueble') ?>

    <?php // echo $form->field($model, 'accincorporacioninmueble') ?>

    <?php // echo $form->field($model, 'accdesincorporacionmueble') ?>

    <?php // echo $form->field($model, 'accdesincorporacioninmueble') ?>

    <?php // echo $form->field($model, 'acctransferenciabien') ?>

    <?php // echo $form->field($model, 'accreptipoactivo') ?>

    <?php // echo $form->field($model, 'accrepubicacionbien') ?>

    <?php // echo $form->field($model, 'accrepdisposicion') ?>

    <?php // echo $form->field($model, 'accrepincorporacion') ?>

    <?php // echo $form->field($model, 'accrepdesincorporacion') ?>

    <?php // echo $form->field($model, 'accreptransferencia') ?>

    <?php // echo $form->field($model, 'accusuariobien') ?>

    <?php // echo $form->field($model, 'acccargarcue') ?>

    <?php // echo $form->field($model, 'accasiento') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'liquidador')->checkbox() ?>

    <?php // echo $form->field($model, 'accmodreten') ?>

    <?php // echo $form->field($model, 'accrepobras') ?>

    <?php // echo $form->field($model, 'accenvchecausar') ?>

    <?php // echo $form->field($model, 'poseeimpresora')->checkbox() ?>

    <?php // echo $form->field($model, 'puerto') ?>

    <?php // echo $form->field($model, 'accrepcatcue') ?>

    <?php // echo $form->field($model, 'accrepsalini') ?>

    <?php // echo $form->field($model, 'accrepsaldo') ?>

    <?php // echo $form->field($model, 'accrepbalacom') ?>

    <?php // echo $form->field($model, 'accrepbalagen') ?>

    <?php // echo $form->field($model, 'accrepasiento') ?>

    <?php // echo $form->field($model, 'accrepestamov') ?>

    <?php // echo $form->field($model, 'accrepinvemueble') ?>

    <?php // echo $form->field($model, 'accrepresuinvemueble') ?>

    <?php // echo $form->field($model, 'accrepmovimueble') ?>

    <?php // echo $form->field($model, 'accrepmresucuemue') ?>

    <?php // echo $form->field($model, 'accrepmayoranali') ?>

    <?php // echo $form->field($model, 'accacticontri') ?>

    <?php // echo $form->field($model, 'impresora') ?>

    <?php // echo $form->field($model, 'accadministrador') ?>

    <?php // echo $form->field($model, 'idcoordinacion') ?>

    <?php // echo $form->field($model, 'iddireccion') ?>

    <?php // echo $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
