<?php

namespace app\modules\requisiciones\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $idusuario
 * @property string $login
 * @property string $passwd
 * @property integer $idefiscal
 * @property integer $idorganizacion
 * @property integer $persona
 * @property string $accaplicacion
 * @property string $accorganizacion
 * @property string $accestructura
 * @property string $acccambiofecha
 * @property string $accusuario
 * @property string $accpersona
 * @property string $acccambioefiscal
 * @property string $acciva
 * @property string $accut
 * @property string $accdesbloquear
 * @property string $accdesconectar
 * @property string $acctasaactiva
 * @property string $accusuariocat
 * @property string $accfichacat
 * @property string $accvalorterrecat
 * @property string $accvalortipocat
 * @property string $accdepreciacioncat
 * @property string $accrepcedcat
 * @property string $accrepceremp
 * @property string $accrepfichacat
 * @property string $accrepgenseccat
 * @property string $acccontribuyente
 * @property string $accactividad
 * @property string $accdeclaraciones
 * @property string $accedocuenta
 * @property string $accconfigcome
 * @property string $accusuariocome
 * @property string $accreppatente
 * @property string $accimpedoctasectcome
 * @property string $accrepgensector
 * @property string $accrepactividad
 * @property string $accrepfecdecla
 * @property string $accrepmondecla
 * @property string $accimppatente
 * @property string $accinmueble
 * @property string $accedoctainmue
 * @property string $accvalfisterre
 * @property string $accvalfiscons
 * @property string $accconfiginmue
 * @property string $accusuarioinmue
 * @property string $accusrepsectcat
 * @property string $accusrepmontaval
 * @property string $accusreptipconstruc
 * @property string $accusrepmontdeud
 * @property string $accusrepvalorconstruc
 * @property string $accimpedoctasectinmue
 * @property string $accapuesta
 * @property string $accclaseapuesta
 * @property string $accedoctaapuesta
 * @property string $accconfigapuesta
 * @property string $accusuarioapuesta
 * @property string $accvehiculo
 * @property string $accclasevehiculo
 * @property string $accedoctavehiculo
 * @property string $accconfigvehiculo
 * @property string $accusuariovehiculo
 * @property string $accrepgenvehi
 * @property string $accrepcontvehideud
 * @property string $accreptipvehi
 * @property string $accpublicidad
 * @property string $accclasepublicidad
 * @property string $accedoctapublicidad
 * @property string $accconfigpublicidad
 * @property string $accusuariopublicidad
 * @property string $accrepgensecpubli
 * @property string $accrepcontpublideud
 * @property string $accreptippubli
 * @property string $accrepedoctapubli
 * @property string $accrenta
 * @property string $accedoctarenta
 * @property string $accconfigrenta
 * @property string $accusuariorenta
 * @property string $accefiscal
 * @property string $acccatpro
 * @property string $accpuc
 * @property string $acccrearfactura
 * @property string $accanularfactura
 * @property string $accusuariofactura
 * @property string $acctiporenta
 * @property string $accrepgenrenta
 * @property string $accurepcontratorenta
 * @property string $accrepdeudarenta
 * @property string $accrepedoctarenta
 * @property string $accreptiporenta
 * @property string $accbanco
 * @property string $acccuentabancaria
 * @property string $numcaja
 * @property string $accusuariopresu
 * @property string $accformpresu
 * @property string $accaprobpresup
 * @property string $accreppuc
 * @property string $accrepformpresu
 * @property string $accreppresuing
 * @property string $accrepedofinanc
 * @property string $accrepmovpresu
 * @property string $accrepcondicpar
 * @property string $accrepcomprom
 * @property string $accpartext
 * @property string $accaumentopart
 * @property string $accdisminucionpart
 * @property string $acctraslado
 * @property string $acccompromiso
 * @property string $accfacturar
 * @property string $accanularfact
 * @property string $accusuariofacturacion
 * @property string $accrepfactemit
 * @property string $accurepfactporcobrar
 * @property string $accrepfactcobrada
 * @property string $accrepfactanulada
 * @property string $accrepfactportipo
 * @property string $accingresos
 * @property string $accsupervisor
 * @property string $accrepresumcaja
 * @property string $accreptransdiarias
 * @property string $accrepactutransac
 * @property string $accreptransacciones
 * @property string $accrepcontrolcheq
 * @property string $accrepcontroldepo
 * @property string $accusuariocaja
 * @property string $acctipoingreso
 * @property string $acctipoimpuesto
 * @property string $accrepconstancia
 * @property string $accrepvalconstruc
 * @property string $accrepvalterreno
 * @property string $accrepdepreciacion
 * @property string $accreptipoapuesta
 * @property string $accrepgensectapu
 * @property string $accrepdeclanualapu
 * @property string $accrepdeudapuesta
 * @property string $accrepedoctapuesta
 * @property string $accactudeuindustria
 * @property string $accactudeuinmue
 * @property string $accactudeurenta
 * @property string $accactudeuvehiculo
 * @property string $accactudeuapuesta
 * @property string $acctasapasiva
 * @property string $accgestores
 * @property string $accasignacion
 * @property string $accvisitas
 * @property string $accefectividad
 * @property string $accrepresucaja
 * @property string $accreptransadia
 * @property string $accrepmovactu
 * @property string $accrepdeudaperi
 * @property string $accrepfactuasigna
 * @property string $accrepdeudarecu
 * @property string $accusuariogestion
 * @property string $acclicores
 * @property string $actipotasa
 * @property string $accedoctalicores
 * @property string $accconfiglicores
 * @property string $accusuariolicores
 * @property string $accrepgenseclicor
 * @property string $accrepcontlicores
 * @property string $accreptipotasa
 * @property string $accrepedoctalicores
 * @property string $accexplicores
 * @property string $acctiporetencion
 * @property string $accusuarioadmini
 * @property string $accegresos
 * @property string $acctransferenciabanc
 * @property string $accconciliacion
 * @property string $acccheqanul
 * @property string $accdebito
 * @property string $acccredito
 * @property string $acccausar
 * @property string $accaproborden
 * @property string $accrepordenpago
 * @property string $accrepbanco
 * @property string $accrepretencion
 * @property string $accrepfondoterc
 * @property string $accdeposito
 * @property string $accfondotercero
 * @property string $accpagoordenes
 * @property string $accregobras
 * @property string $accusuarioingenieria
 * @property string $accasigobras
 * @property string $acccaratula
 * @property string $acccuaderno
 * @property string $accrepgenobras
 * @property string $accrepobrasasig
 * @property string $accrepobraejecu
 * @property string $accrepcontratista
 * @property string $acccamstainmue
 * @property string $acccontratista
 * @property string $acccargos
 * @property string $accactivos
 * @property string $accaprocompro
 * @property string $accalmacen
 * @property string $accsolisuministro
 * @property string $accunimedi
 * @property string $accproveedor
 * @property string $acctipoproducto
 * @property string $accproducto
 * @property string $accrequisicion
 * @property string $accsolicompra
 * @property string $accaprosolicompra
 * @property string $accusuariocompra
 * @property string $accrepalmacen
 * @property string $accreprespalmacen
 * @property string $accrepsolicompra
 * @property string $accrepsolisumi
 * @property string $accreprequisicion
 * @property string $acccontrolinterno
 * @property string $acccuentacontable
 * @property string $accaprobpagoobras
 * @property string $accsolicpagoobras
 * @property string $accubicacionalmacen
 * @property string $accentradaalmacen
 * @property string $accsalidaalmacen
 * @property string $accdespachoalmacen
 * @property string $acclisgencompraalmacen
 * @property string $acclismovcompraalmacen
 * @property string $acclisinventario
 * @property string $acclissolicompraalmacen
 * @property string $accaprodesaprodespacho
 * @property string $accespecial
 * @property string $accrepresugenobra
 * @property string $accusuarionomina
 * @property string $accpermdecla
 * @property string $accacreditacion
 * @property string $acctipomulta
 * @property string $accmultaindu
 * @property string $accmultainmu
 * @property string $accmultavehi
 * @property string $accmultaapu
 * @property string $accmultapropa
 * @property string $accmultarenta
 * @property string $accmultalico
 * @property string $accformucue
 * @property string $accvincucue
 * @property string $accrepplancue
 * @property string $accrepvincucue
 * @property string $accusuarioconta
 * @property string $acctipoactivo
 * @property string $accubicacionbien
 * @property string $accmotivoincorporacion
 * @property string $accmotivodesincorporacion
 * @property string $accincorporacionmueble
 * @property string $accincorporacioninmueble
 * @property string $accdesincorporacionmueble
 * @property string $accdesincorporacioninmueble
 * @property string $acctransferenciabien
 * @property string $accreptipoactivo
 * @property string $accrepubicacionbien
 * @property string $accrepdisposicion
 * @property string $accrepincorporacion
 * @property string $accrepdesincorporacion
 * @property string $accreptransferencia
 * @property string $accusuariobien
 * @property string $acccargarcue
 * @property string $accasiento
 * @property integer $status
 * @property boolean $liquidador
 * @property string $accmodreten
 * @property string $accrepobras
 * @property string $accenvchecausar
 * @property boolean $poseeimpresora
 * @property integer $puerto
 * @property string $accrepcatcue
 * @property string $accrepsalini
 * @property string $accrepsaldo
 * @property string $accrepbalacom
 * @property string $accrepbalagen
 * @property string $accrepasiento
 * @property string $accrepestamov
 * @property string $accrepinvemueble
 * @property string $accrepresuinvemueble
 * @property string $accrepmovimueble
 * @property string $accrepmresucuemue
 * @property string $accrepmayoranali
 * @property string $accacticontri
 * @property integer $impresora
 * @property string $accadministrador
 * @property integer $idcoordinacion
 * @property integer $iddireccion
 * @property boolean $rememberMe
 *
 * @property Ajuste[] $ajustes
 * @property Ajuste[] $ajustes0
 * @property Efiscal $idefiscal0
 * @property Organizacion $idorganizacion0
 * @property Persona $persona0
 * @property Usuariosupervisor[] $usuariosupervisors
 * @property Coordinacion[] $idcoordinacions
 * @property SeguridadUsuarioGrupo[] $seguridadUsuarioGrupos
 * @property SeguridadGrupo[] $idGrupos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'passwd'], 'required'],
            [['idefiscal', 'idorganizacion', 'persona', 'status', 'puerto', 'impresora', 'idcoordinacion', 'iddireccion'], 'integer'],
            [['liquidador', 'poseeimpresora', 'rememberMe'], 'boolean'],
            [['login', 'accaplicacion'], 'string', 'max' => 20],
            [['passwd'], 'string', 'max' => 128],
            [['accorganizacion', 'accestructura', 'accusuario', 'accpersona', 'acciva', 'accdesconectar', 'accusuariocat', 'accfichacat', 'accvalorterrecat', 'accvalortipocat', 'accdepreciacioncat', 'acccontribuyente', 'accactividad', 'accusuariocome', 'accvalfisterre', 'accvalfiscons', 'accusuarioinmue', 'accapuesta', 'accclaseapuesta', 'accusuarioapuesta', 'accvehiculo', 'accclasevehiculo', 'accusuariovehiculo', 'accpublicidad', 'accclasepublicidad', 'accusuariopublicidad', 'accrenta', 'accusuariorenta', 'accefiscal', 'acccatpro', 'accpuc', 'accusuariofactura', 'acctiporenta', 'accbanco', 'acccuentabancaria', 'accusuariopresu', 'accusuariofacturacion', 'accusuariocaja', 'acctipoingreso', 'accgestores', 'accusuariogestion', 'actipotasa', 'accusuariolicores', 'accexplicores', 'acctiporetencion', 'accusuarioadmini', 'accregobras', 'accusuarioingenieria', 'acccontratista', 'accalmacen', 'accsolisuministro', 'accunimedi', 'accproveedor', 'acctipoproducto', 'accproducto', 'accrequisicion', 'accsolicompra', 'accusuariocompra', 'acccuentacontable', 'accsolicpagoobras', 'accubicacionalmacen', 'accentradaalmacen', 'accsalidaalmacen', 'accdespachoalmacen', 'accusuarionomina', 'acctipomulta', 'accmultaindu', 'accmultainmu', 'accmultavehi', 'accmultaapu', 'accmultapropa', 'accmultarenta', 'accmultalico', 'accformucue', 'accusuarioconta', 'acctipoactivo', 'accubicacionbien', 'accmotivoincorporacion', 'accmotivodesincorporacion', 'accincorporacionmueble', 'accincorporacioninmueble', 'accdesincorporacionmueble', 'accdesincorporacioninmueble', 'acctransferenciabien', 'accusuariobien', 'accasiento'], 'string', 'max' => 4],
            [['acccambiofecha', 'acccambioefiscal', 'accut', 'accdesbloquear', 'acctasaactiva', 'accrepcedcat', 'accrepceremp', 'accrepfichacat', 'accrepgenseccat', 'accedocuenta', 'accconfigcome', 'accreppatente', 'accimpedoctasectcome', 'accrepgensector', 'accrepactividad', 'accrepfecdecla', 'accrepmondecla', 'accimppatente', 'accedoctainmue', 'accconfiginmue', 'accusrepsectcat', 'accusrepmontaval', 'accusreptipconstruc', 'accusrepmontdeud', 'accusrepvalorconstruc', 'accimpedoctasectinmue', 'accedoctaapuesta', 'accconfigapuesta', 'accedoctavehiculo', 'accconfigvehiculo', 'accrepgenvehi', 'accrepcontvehideud', 'accreptipvehi', 'accedoctapublicidad', 'accconfigpublicidad', 'accrepgensecpubli', 'accrepcontpublideud', 'accreptippubli', 'accrepedoctapubli', 'accedoctarenta', 'accconfigrenta', 'acccrearfactura', 'accanularfactura', 'accrepgenrenta', 'accurepcontratorenta', 'accrepdeudarenta', 'accrepedoctarenta', 'accreptiporenta', 'accformpresu', 'accaprobpresup', 'accreppuc', 'accrepformpresu', 'accreppresuing', 'accrepedofinanc', 'accrepmovpresu', 'accrepcondicpar', 'accrepcomprom', 'accpartext', 'accaumentopart', 'accdisminucionpart', 'acctraslado', 'acccompromiso', 'accfacturar', 'accanularfact', 'accrepfactemit', 'accurepfactporcobrar', 'accrepfactcobrada', 'accrepfactanulada', 'accrepfactportipo', 'accingresos', 'accsupervisor', 'accrepresumcaja', 'accreptransdiarias', 'accrepactutransac', 'accreptransacciones', 'accrepcontrolcheq', 'accrepcontroldepo', 'acctipoimpuesto', 'accrepconstancia', 'accrepvalconstruc', 'accrepvalterreno', 'accrepdepreciacion', 'accreptipoapuesta', 'accrepgensectapu', 'accrepdeclanualapu', 'accrepdeudapuesta', 'accrepedoctapuesta', 'accactudeuindustria', 'accactudeuinmue', 'accactudeurenta', 'accactudeuvehiculo', 'accactudeuapuesta', 'acctasapasiva', 'accasignacion', 'accvisitas', 'accefectividad', 'accrepresucaja', 'accreptransadia', 'accrepmovactu', 'accrepdeudaperi', 'accrepfactuasigna', 'accrepdeudarecu', 'accedoctalicores', 'accconfiglicores', 'accrepgenseclicor', 'accrepcontlicores', 'accreptipotasa', 'accrepedoctalicores', 'accegresos', 'acctransferenciabanc', 'accconciliacion', 'acccheqanul', 'accdebito', 'acccredito', 'acccausar', 'accaproborden', 'accrepordenpago', 'accrepbanco', 'accrepretencion', 'accrepfondoterc', 'accdeposito', 'accfondotercero', 'accpagoordenes', 'accasigobras', 'acccaratula', 'acccuaderno', 'accrepgenobras', 'accrepobrasasig', 'accrepobraejecu', 'accrepcontratista', 'acccamstainmue', 'acccargos', 'accactivos', 'accaprocompro', 'accaprosolicompra', 'accrepalmacen', 'accreprespalmacen', 'accrepsolicompra', 'accrepsolisumi', 'accreprequisicion', 'acccontrolinterno', 'accaprobpagoobras', 'acclisgencompraalmacen', 'acclismovcompraalmacen', 'acclisinventario', 'acclissolicompraalmacen', 'accaprodesaprodespacho', 'accespecial', 'accrepresugenobra', 'accpermdecla', 'accacreditacion', 'accvincucue', 'accrepplancue', 'accrepvincucue', 'accreptipoactivo', 'accrepubicacionbien', 'accrepdisposicion', 'accrepincorporacion', 'accrepdesincorporacion', 'accreptransferencia', 'acccargarcue', 'accmodreten', 'accrepobras', 'accenvchecausar', 'accrepcatcue', 'accrepsalini', 'accrepsaldo', 'accrepbalacom', 'accrepbalagen', 'accrepasiento', 'accrepestamov', 'accrepinvemueble', 'accrepresuinvemueble', 'accrepmovimueble', 'accrepmresucuemue', 'accrepmayoranali', 'accadministrador'], 'string', 'max' => 1],
            [['accdeclaraciones'], 'string', 'max' => 3],
            [['accinmueble', 'numcaja', 'accacticontri'], 'string', 'max' => 2],
            [['acclicores'], 'string', 'max' => 6],
            [['login'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'login' => Yii::t('app', 'Login'),
            'passwd' => Yii::t('app', 'Passwd'),
            'idefiscal' => Yii::t('app', 'Idefiscal'),
            'idorganizacion' => Yii::t('app', 'Idorganizacion'),
            'persona' => Yii::t('app', 'Persona'),
            'accaplicacion' => Yii::t('app', 'Accaplicacion'),
            'accorganizacion' => Yii::t('app', 'Accorganizacion'),
            'accestructura' => Yii::t('app', 'Accestructura'),
            'acccambiofecha' => Yii::t('app', 'Acccambiofecha'),
            'accusuario' => Yii::t('app', 'Accusuario'),
            'accpersona' => Yii::t('app', 'Accpersona'),
            'acccambioefiscal' => Yii::t('app', 'Acccambioefiscal'),
            'acciva' => Yii::t('app', 'Acciva'),
            'accut' => Yii::t('app', 'Accut'),
            'accdesbloquear' => Yii::t('app', 'Accdesbloquear'),
            'accdesconectar' => Yii::t('app', 'Accdesconectar'),
            'acctasaactiva' => Yii::t('app', 'Acctasaactiva'),
            'accusuariocat' => Yii::t('app', 'Accusuariocat'),
            'accfichacat' => Yii::t('app', 'Accfichacat'),
            'accvalorterrecat' => Yii::t('app', 'Accvalorterrecat'),
            'accvalortipocat' => Yii::t('app', 'Accvalortipocat'),
            'accdepreciacioncat' => Yii::t('app', 'Accdepreciacioncat'),
            'accrepcedcat' => Yii::t('app', 'Accrepcedcat'),
            'accrepceremp' => Yii::t('app', 'Accrepceremp'),
            'accrepfichacat' => Yii::t('app', 'Accrepfichacat'),
            'accrepgenseccat' => Yii::t('app', 'Accrepgenseccat'),
            'acccontribuyente' => Yii::t('app', 'Acccontribuyente'),
            'accactividad' => Yii::t('app', 'Accactividad'),
            'accdeclaraciones' => Yii::t('app', 'Accdeclaraciones'),
            'accedocuenta' => Yii::t('app', 'Accedocuenta'),
            'accconfigcome' => Yii::t('app', 'Accconfigcome'),
            'accusuariocome' => Yii::t('app', 'Accusuariocome'),
            'accreppatente' => Yii::t('app', 'Accreppatente'),
            'accimpedoctasectcome' => Yii::t('app', 'Accimpedoctasectcome'),
            'accrepgensector' => Yii::t('app', 'Accrepgensector'),
            'accrepactividad' => Yii::t('app', 'Accrepactividad'),
            'accrepfecdecla' => Yii::t('app', 'Accrepfecdecla'),
            'accrepmondecla' => Yii::t('app', 'Accrepmondecla'),
            'accimppatente' => Yii::t('app', 'Accimppatente'),
            'accinmueble' => Yii::t('app', 'Accinmueble'),
            'accedoctainmue' => Yii::t('app', 'Accedoctainmue'),
            'accvalfisterre' => Yii::t('app', 'Accvalfisterre'),
            'accvalfiscons' => Yii::t('app', 'Accvalfiscons'),
            'accconfiginmue' => Yii::t('app', 'Accconfiginmue'),
            'accusuarioinmue' => Yii::t('app', 'Accusuarioinmue'),
            'accusrepsectcat' => Yii::t('app', 'Accusrepsectcat'),
            'accusrepmontaval' => Yii::t('app', 'Accusrepmontaval'),
            'accusreptipconstruc' => Yii::t('app', 'Accusreptipconstruc'),
            'accusrepmontdeud' => Yii::t('app', 'Accusrepmontdeud'),
            'accusrepvalorconstruc' => Yii::t('app', 'Accusrepvalorconstruc'),
            'accimpedoctasectinmue' => Yii::t('app', 'Accimpedoctasectinmue'),
            'accapuesta' => Yii::t('app', 'Accapuesta'),
            'accclaseapuesta' => Yii::t('app', 'Accclaseapuesta'),
            'accedoctaapuesta' => Yii::t('app', 'Accedoctaapuesta'),
            'accconfigapuesta' => Yii::t('app', 'Accconfigapuesta'),
            'accusuarioapuesta' => Yii::t('app', 'Accusuarioapuesta'),
            'accvehiculo' => Yii::t('app', 'Accvehiculo'),
            'accclasevehiculo' => Yii::t('app', 'Accclasevehiculo'),
            'accedoctavehiculo' => Yii::t('app', 'Accedoctavehiculo'),
            'accconfigvehiculo' => Yii::t('app', 'Accconfigvehiculo'),
            'accusuariovehiculo' => Yii::t('app', 'Accusuariovehiculo'),
            'accrepgenvehi' => Yii::t('app', 'Accrepgenvehi'),
            'accrepcontvehideud' => Yii::t('app', 'Accrepcontvehideud'),
            'accreptipvehi' => Yii::t('app', 'Accreptipvehi'),
            'accpublicidad' => Yii::t('app', 'Accpublicidad'),
            'accclasepublicidad' => Yii::t('app', 'Accclasepublicidad'),
            'accedoctapublicidad' => Yii::t('app', 'Accedoctapublicidad'),
            'accconfigpublicidad' => Yii::t('app', 'Accconfigpublicidad'),
            'accusuariopublicidad' => Yii::t('app', 'Accusuariopublicidad'),
            'accrepgensecpubli' => Yii::t('app', 'Accrepgensecpubli'),
            'accrepcontpublideud' => Yii::t('app', 'Accrepcontpublideud'),
            'accreptippubli' => Yii::t('app', 'Accreptippubli'),
            'accrepedoctapubli' => Yii::t('app', 'Accrepedoctapubli'),
            'accrenta' => Yii::t('app', 'Accrenta'),
            'accedoctarenta' => Yii::t('app', 'Accedoctarenta'),
            'accconfigrenta' => Yii::t('app', 'Accconfigrenta'),
            'accusuariorenta' => Yii::t('app', 'Accusuariorenta'),
            'accefiscal' => Yii::t('app', 'Accefiscal'),
            'acccatpro' => Yii::t('app', 'Acccatpro'),
            'accpuc' => Yii::t('app', 'Accpuc'),
            'acccrearfactura' => Yii::t('app', 'Acccrearfactura'),
            'accanularfactura' => Yii::t('app', 'Accanularfactura'),
            'accusuariofactura' => Yii::t('app', 'Accusuariofactura'),
            'acctiporenta' => Yii::t('app', 'Acctiporenta'),
            'accrepgenrenta' => Yii::t('app', 'Accrepgenrenta'),
            'accurepcontratorenta' => Yii::t('app', 'Accurepcontratorenta'),
            'accrepdeudarenta' => Yii::t('app', 'Accrepdeudarenta'),
            'accrepedoctarenta' => Yii::t('app', 'Accrepedoctarenta'),
            'accreptiporenta' => Yii::t('app', 'Accreptiporenta'),
            'accbanco' => Yii::t('app', 'Accbanco'),
            'acccuentabancaria' => Yii::t('app', 'Acccuentabancaria'),
            'numcaja' => Yii::t('app', 'Numcaja'),
            'accusuariopresu' => Yii::t('app', 'Accusuariopresu'),
            'accformpresu' => Yii::t('app', 'Accformpresu'),
            'accaprobpresup' => Yii::t('app', 'Accaprobpresup'),
            'accreppuc' => Yii::t('app', 'Accreppuc'),
            'accrepformpresu' => Yii::t('app', 'Accrepformpresu'),
            'accreppresuing' => Yii::t('app', 'Accreppresuing'),
            'accrepedofinanc' => Yii::t('app', 'Accrepedofinanc'),
            'accrepmovpresu' => Yii::t('app', 'Accrepmovpresu'),
            'accrepcondicpar' => Yii::t('app', 'Accrepcondicpar'),
            'accrepcomprom' => Yii::t('app', 'Accrepcomprom'),
            'accpartext' => Yii::t('app', 'Accpartext'),
            'accaumentopart' => Yii::t('app', 'Accaumentopart'),
            'accdisminucionpart' => Yii::t('app', 'Accdisminucionpart'),
            'acctraslado' => Yii::t('app', 'Acctraslado'),
            'acccompromiso' => Yii::t('app', 'Acccompromiso'),
            'accfacturar' => Yii::t('app', 'Accfacturar'),
            'accanularfact' => Yii::t('app', 'Accanularfact'),
            'accusuariofacturacion' => Yii::t('app', 'Accusuariofacturacion'),
            'accrepfactemit' => Yii::t('app', 'Accrepfactemit'),
            'accurepfactporcobrar' => Yii::t('app', 'Accurepfactporcobrar'),
            'accrepfactcobrada' => Yii::t('app', 'Accrepfactcobrada'),
            'accrepfactanulada' => Yii::t('app', 'Accrepfactanulada'),
            'accrepfactportipo' => Yii::t('app', 'Accrepfactportipo'),
            'accingresos' => Yii::t('app', 'Accingresos'),
            'accsupervisor' => Yii::t('app', 'Accsupervisor'),
            'accrepresumcaja' => Yii::t('app', 'Accrepresumcaja'),
            'accreptransdiarias' => Yii::t('app', 'Accreptransdiarias'),
            'accrepactutransac' => Yii::t('app', 'Accrepactutransac'),
            'accreptransacciones' => Yii::t('app', 'Accreptransacciones'),
            'accrepcontrolcheq' => Yii::t('app', 'Accrepcontrolcheq'),
            'accrepcontroldepo' => Yii::t('app', 'Accrepcontroldepo'),
            'accusuariocaja' => Yii::t('app', 'Accusuariocaja'),
            'acctipoingreso' => Yii::t('app', 'Acctipoingreso'),
            'acctipoimpuesto' => Yii::t('app', 'Acctipoimpuesto'),
            'accrepconstancia' => Yii::t('app', 'Accrepconstancia'),
            'accrepvalconstruc' => Yii::t('app', 'Accrepvalconstruc'),
            'accrepvalterreno' => Yii::t('app', 'Accrepvalterreno'),
            'accrepdepreciacion' => Yii::t('app', 'Accrepdepreciacion'),
            'accreptipoapuesta' => Yii::t('app', 'Accreptipoapuesta'),
            'accrepgensectapu' => Yii::t('app', 'Accrepgensectapu'),
            'accrepdeclanualapu' => Yii::t('app', 'Accrepdeclanualapu'),
            'accrepdeudapuesta' => Yii::t('app', 'Accrepdeudapuesta'),
            'accrepedoctapuesta' => Yii::t('app', 'Accrepedoctapuesta'),
            'accactudeuindustria' => Yii::t('app', 'Accactudeuindustria'),
            'accactudeuinmue' => Yii::t('app', 'Accactudeuinmue'),
            'accactudeurenta' => Yii::t('app', 'Accactudeurenta'),
            'accactudeuvehiculo' => Yii::t('app', 'Accactudeuvehiculo'),
            'accactudeuapuesta' => Yii::t('app', 'Accactudeuapuesta'),
            'acctasapasiva' => Yii::t('app', 'Acctasapasiva'),
            'accgestores' => Yii::t('app', 'Accgestores'),
            'accasignacion' => Yii::t('app', 'Accasignacion'),
            'accvisitas' => Yii::t('app', 'Accvisitas'),
            'accefectividad' => Yii::t('app', 'Accefectividad'),
            'accrepresucaja' => Yii::t('app', 'Accrepresucaja'),
            'accreptransadia' => Yii::t('app', 'Accreptransadia'),
            'accrepmovactu' => Yii::t('app', 'Accrepmovactu'),
            'accrepdeudaperi' => Yii::t('app', 'Accrepdeudaperi'),
            'accrepfactuasigna' => Yii::t('app', 'Accrepfactuasigna'),
            'accrepdeudarecu' => Yii::t('app', 'Accrepdeudarecu'),
            'accusuariogestion' => Yii::t('app', 'Accusuariogestion'),
            'acclicores' => Yii::t('app', 'Acclicores'),
            'actipotasa' => Yii::t('app', 'Actipotasa'),
            'accedoctalicores' => Yii::t('app', 'Accedoctalicores'),
            'accconfiglicores' => Yii::t('app', 'Accconfiglicores'),
            'accusuariolicores' => Yii::t('app', 'Accusuariolicores'),
            'accrepgenseclicor' => Yii::t('app', 'Accrepgenseclicor'),
            'accrepcontlicores' => Yii::t('app', 'Accrepcontlicores'),
            'accreptipotasa' => Yii::t('app', 'Accreptipotasa'),
            'accrepedoctalicores' => Yii::t('app', 'Accrepedoctalicores'),
            'accexplicores' => Yii::t('app', 'Accexplicores'),
            'acctiporetencion' => Yii::t('app', 'Acctiporetencion'),
            'accusuarioadmini' => Yii::t('app', 'Accusuarioadmini'),
            'accegresos' => Yii::t('app', 'Accegresos'),
            'acctransferenciabanc' => Yii::t('app', 'Acctransferenciabanc'),
            'accconciliacion' => Yii::t('app', 'Accconciliacion'),
            'acccheqanul' => Yii::t('app', 'Acccheqanul'),
            'accdebito' => Yii::t('app', 'Accdebito'),
            'acccredito' => Yii::t('app', 'Acccredito'),
            'acccausar' => Yii::t('app', 'Acccausar'),
            'accaproborden' => Yii::t('app', 'Accaproborden'),
            'accrepordenpago' => Yii::t('app', 'Accrepordenpago'),
            'accrepbanco' => Yii::t('app', 'Accrepbanco'),
            'accrepretencion' => Yii::t('app', 'Accrepretencion'),
            'accrepfondoterc' => Yii::t('app', 'Accrepfondoterc'),
            'accdeposito' => Yii::t('app', 'Accdeposito'),
            'accfondotercero' => Yii::t('app', 'Accfondotercero'),
            'accpagoordenes' => Yii::t('app', 'Accpagoordenes'),
            'accregobras' => Yii::t('app', 'Accregobras'),
            'accusuarioingenieria' => Yii::t('app', 'Accusuarioingenieria'),
            'accasigobras' => Yii::t('app', 'Accasigobras'),
            'acccaratula' => Yii::t('app', 'Acccaratula'),
            'acccuaderno' => Yii::t('app', 'Acccuaderno'),
            'accrepgenobras' => Yii::t('app', 'Accrepgenobras'),
            'accrepobrasasig' => Yii::t('app', 'Accrepobrasasig'),
            'accrepobraejecu' => Yii::t('app', 'Accrepobraejecu'),
            'accrepcontratista' => Yii::t('app', 'Accrepcontratista'),
            'acccamstainmue' => Yii::t('app', 'Acccamstainmue'),
            'acccontratista' => Yii::t('app', 'Acccontratista'),
            'acccargos' => Yii::t('app', 'Acccargos'),
            'accactivos' => Yii::t('app', 'Accactivos'),
            'accaprocompro' => Yii::t('app', 'Accaprocompro'),
            'accalmacen' => Yii::t('app', 'Accalmacen'),
            'accsolisuministro' => Yii::t('app', 'Accsolisuministro'),
            'accunimedi' => Yii::t('app', 'Accunimedi'),
            'accproveedor' => Yii::t('app', 'Accproveedor'),
            'acctipoproducto' => Yii::t('app', 'Acctipoproducto'),
            'accproducto' => Yii::t('app', 'Accproducto'),
            'accrequisicion' => Yii::t('app', 'Accrequisicion'),
            'accsolicompra' => Yii::t('app', 'Accsolicompra'),
            'accaprosolicompra' => Yii::t('app', 'Accaprosolicompra'),
            'accusuariocompra' => Yii::t('app', 'Accusuariocompra'),
            'accrepalmacen' => Yii::t('app', 'Accrepalmacen'),
            'accreprespalmacen' => Yii::t('app', 'Accreprespalmacen'),
            'accrepsolicompra' => Yii::t('app', 'Accrepsolicompra'),
            'accrepsolisumi' => Yii::t('app', 'Accrepsolisumi'),
            'accreprequisicion' => Yii::t('app', 'Accreprequisicion'),
            'acccontrolinterno' => Yii::t('app', 'Acccontrolinterno'),
            'acccuentacontable' => Yii::t('app', 'Acccuentacontable'),
            'accaprobpagoobras' => Yii::t('app', 'Accaprobpagoobras'),
            'accsolicpagoobras' => Yii::t('app', 'Accsolicpagoobras'),
            'accubicacionalmacen' => Yii::t('app', 'Accubicacionalmacen'),
            'accentradaalmacen' => Yii::t('app', 'Accentradaalmacen'),
            'accsalidaalmacen' => Yii::t('app', 'Accsalidaalmacen'),
            'accdespachoalmacen' => Yii::t('app', 'Accdespachoalmacen'),
            'acclisgencompraalmacen' => Yii::t('app', 'Acclisgencompraalmacen'),
            'acclismovcompraalmacen' => Yii::t('app', 'Acclismovcompraalmacen'),
            'acclisinventario' => Yii::t('app', 'Acclisinventario'),
            'acclissolicompraalmacen' => Yii::t('app', 'Acclissolicompraalmacen'),
            'accaprodesaprodespacho' => Yii::t('app', 'Accaprodesaprodespacho'),
            'accespecial' => Yii::t('app', 'Accespecial'),
            'accrepresugenobra' => Yii::t('app', 'Accrepresugenobra'),
            'accusuarionomina' => Yii::t('app', 'Accusuarionomina'),
            'accpermdecla' => Yii::t('app', 'Accpermdecla'),
            'accacreditacion' => Yii::t('app', 'Accacreditacion'),
            'acctipomulta' => Yii::t('app', 'Acctipomulta'),
            'accmultaindu' => Yii::t('app', 'Accmultaindu'),
            'accmultainmu' => Yii::t('app', 'Accmultainmu'),
            'accmultavehi' => Yii::t('app', 'Accmultavehi'),
            'accmultaapu' => Yii::t('app', 'Accmultaapu'),
            'accmultapropa' => Yii::t('app', 'Accmultapropa'),
            'accmultarenta' => Yii::t('app', 'Accmultarenta'),
            'accmultalico' => Yii::t('app', 'Accmultalico'),
            'accformucue' => Yii::t('app', 'Accformucue'),
            'accvincucue' => Yii::t('app', 'Accvincucue'),
            'accrepplancue' => Yii::t('app', 'Accrepplancue'),
            'accrepvincucue' => Yii::t('app', 'Accrepvincucue'),
            'accusuarioconta' => Yii::t('app', 'Accusuarioconta'),
            'acctipoactivo' => Yii::t('app', 'Acctipoactivo'),
            'accubicacionbien' => Yii::t('app', 'Accubicacionbien'),
            'accmotivoincorporacion' => Yii::t('app', 'Accmotivoincorporacion'),
            'accmotivodesincorporacion' => Yii::t('app', 'Accmotivodesincorporacion'),
            'accincorporacionmueble' => Yii::t('app', 'Accincorporacionmueble'),
            'accincorporacioninmueble' => Yii::t('app', 'Accincorporacioninmueble'),
            'accdesincorporacionmueble' => Yii::t('app', 'Accdesincorporacionmueble'),
            'accdesincorporacioninmueble' => Yii::t('app', 'Accdesincorporacioninmueble'),
            'acctransferenciabien' => Yii::t('app', 'Acctransferenciabien'),
            'accreptipoactivo' => Yii::t('app', 'Accreptipoactivo'),
            'accrepubicacionbien' => Yii::t('app', 'Accrepubicacionbien'),
            'accrepdisposicion' => Yii::t('app', 'Accrepdisposicion'),
            'accrepincorporacion' => Yii::t('app', 'Accrepincorporacion'),
            'accrepdesincorporacion' => Yii::t('app', 'Accrepdesincorporacion'),
            'accreptransferencia' => Yii::t('app', 'Accreptransferencia'),
            'accusuariobien' => Yii::t('app', 'Accusuariobien'),
            'acccargarcue' => Yii::t('app', 'Acccargarcue'),
            'accasiento' => Yii::t('app', 'Accasiento'),
            'status' => Yii::t('app', 'Status'),
            'liquidador' => Yii::t('app', 'Liquidador'),
            'accmodreten' => Yii::t('app', 'Accmodreten'),
            'accrepobras' => Yii::t('app', 'Accrepobras'),
            'accenvchecausar' => Yii::t('app', 'Accenvchecausar'),
            'poseeimpresora' => Yii::t('app', 'Poseeimpresora'),
            'puerto' => Yii::t('app', 'Puerto'),
            'accrepcatcue' => Yii::t('app', 'Accrepcatcue'),
            'accrepsalini' => Yii::t('app', 'Accrepsalini'),
            'accrepsaldo' => Yii::t('app', 'Accrepsaldo'),
            'accrepbalacom' => Yii::t('app', 'Accrepbalacom'),
            'accrepbalagen' => Yii::t('app', 'Accrepbalagen'),
            'accrepasiento' => Yii::t('app', 'Accrepasiento'),
            'accrepestamov' => Yii::t('app', 'Accrepestamov'),
            'accrepinvemueble' => Yii::t('app', 'Accrepinvemueble'),
            'accrepresuinvemueble' => Yii::t('app', 'Accrepresuinvemueble'),
            'accrepmovimueble' => Yii::t('app', 'Accrepmovimueble'),
            'accrepmresucuemue' => Yii::t('app', 'Accrepmresucuemue'),
            'accrepmayoranali' => Yii::t('app', 'Accrepmayoranali'),
            'accacticontri' => Yii::t('app', 'Accacticontri'),
            'impresora' => Yii::t('app', 'Impresora'),
            'accadministrador' => Yii::t('app', 'Accadministrador'),
            'idcoordinacion' => Yii::t('app', 'Idcoordinacion'),
            'iddireccion' => Yii::t('app', 'Iddireccion'),
            'rememberMe' => Yii::t('app', 'Remember Me'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAjustes()
    {
        return $this->hasMany(Ajuste::className(), ['id_usuario_crea' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAjustes0()
    {
        return $this->hasMany(Ajuste::className(), ['id_usuario_reversa' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdefiscal0()
    {
        return $this->hasOne(Efiscal::className(), ['idefiscal' => 'idefiscal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdorganizacion0()
    {
        return $this->hasOne(Organizacion::className(), ['idorganizacion' => 'idorganizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona0()
    {
        return $this->hasOne(Persona::className(), ['cedula' => 'persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosupervisors()
    {
        return $this->hasMany(Usuariosupervisor::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcoordinacions()
    {
        return $this->hasMany(Coordinacion::className(), ['idcoordinacion' => 'idcoordinacion'])->viaTable('usuariosupervisor', ['idusuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguridadUsuarioGrupos()
    {
        return $this->hasMany(SeguridadUsuarioGrupo::className(), ['id_usuario' => 'idusuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupos()
    {
        return $this->hasMany(SeguridadGrupo::className(), ['id_grupo' => 'id_grupo'])->viaTable('usuario_grupo', ['id_usuario' => 'idusuario']);
    }
}
