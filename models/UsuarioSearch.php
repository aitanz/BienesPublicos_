<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'idefiscal', 'idorganizacion', 'persona', 'status', 'puerto', 'impresora', 'idcoordinacion', 'iddireccion'], 'integer'],
            [['login', 'passwd', 'accaplicacion', 'accorganizacion', 'accestructura', 'acccambiofecha', 'accusuario', 'accpersona', 'acccambioefiscal', 'acciva', 'accut', 'accdesbloquear', 'accdesconectar', 'acctasaactiva', 'accusuariocat', 'accfichacat', 'accvalorterrecat', 'accvalortipocat', 'accdepreciacioncat', 'accrepcedcat', 'accrepceremp', 'accrepfichacat', 'accrepgenseccat', 'acccontribuyente', 'accactividad', 'accdeclaraciones', 'accedocuenta', 'accconfigcome', 'accusuariocome', 'accreppatente', 'accimpedoctasectcome', 'accrepgensector', 'accrepactividad', 'accrepfecdecla', 'accrepmondecla', 'accimppatente', 'accinmueble', 'accedoctainmue', 'accvalfisterre', 'accvalfiscons', 'accconfiginmue', 'accusuarioinmue', 'accusrepsectcat', 'accusrepmontaval', 'accusreptipconstruc', 'accusrepmontdeud', 'accusrepvalorconstruc', 'accimpedoctasectinmue', 'accapuesta', 'accclaseapuesta', 'accedoctaapuesta', 'accconfigapuesta', 'accusuarioapuesta', 'accvehiculo', 'accclasevehiculo', 'accedoctavehiculo', 'accconfigvehiculo', 'accusuariovehiculo', 'accrepgenvehi', 'accrepcontvehideud', 'accreptipvehi', 'accpublicidad', 'accclasepublicidad', 'accedoctapublicidad', 'accconfigpublicidad', 'accusuariopublicidad', 'accrepgensecpubli', 'accrepcontpublideud', 'accreptippubli', 'accrepedoctapubli', 'accrenta', 'accedoctarenta', 'accconfigrenta', 'accusuariorenta', 'accefiscal', 'acccatpro', 'accpuc', 'acccrearfactura', 'accanularfactura', 'accusuariofactura', 'acctiporenta', 'accrepgenrenta', 'accurepcontratorenta', 'accrepdeudarenta', 'accrepedoctarenta', 'accreptiporenta', 'accbanco', 'acccuentabancaria', 'numcaja', 'accusuariopresu', 'accformpresu', 'accaprobpresup', 'accreppuc', 'accrepformpresu', 'accreppresuing', 'accrepedofinanc', 'accrepmovpresu', 'accrepcondicpar', 'accrepcomprom', 'accpartext', 'accaumentopart', 'accdisminucionpart', 'acctraslado', 'acccompromiso', 'accfacturar', 'accanularfact', 'accusuariofacturacion', 'accrepfactemit', 'accurepfactporcobrar', 'accrepfactcobrada', 'accrepfactanulada', 'accrepfactportipo', 'accingresos', 'accsupervisor', 'accrepresumcaja', 'accreptransdiarias', 'accrepactutransac', 'accreptransacciones', 'accrepcontrolcheq', 'accrepcontroldepo', 'accusuariocaja', 'acctipoingreso', 'acctipoimpuesto', 'accrepconstancia', 'accrepvalconstruc', 'accrepvalterreno', 'accrepdepreciacion', 'accreptipoapuesta', 'accrepgensectapu', 'accrepdeclanualapu', 'accrepdeudapuesta', 'accrepedoctapuesta', 'accactudeuindustria', 'accactudeuinmue', 'accactudeurenta', 'accactudeuvehiculo', 'accactudeuapuesta', 'acctasapasiva', 'accgestores', 'accasignacion', 'accvisitas', 'accefectividad', 'accrepresucaja', 'accreptransadia', 'accrepmovactu', 'accrepdeudaperi', 'accrepfactuasigna', 'accrepdeudarecu', 'accusuariogestion', 'acclicores', 'actipotasa', 'accedoctalicores', 'accconfiglicores', 'accusuariolicores', 'accrepgenseclicor', 'accrepcontlicores', 'accreptipotasa', 'accrepedoctalicores', 'accexplicores', 'acctiporetencion', 'accusuarioadmini', 'accegresos', 'acctransferenciabanc', 'accconciliacion', 'acccheqanul', 'accdebito', 'acccredito', 'acccausar', 'accaproborden', 'accrepordenpago', 'accrepbanco', 'accrepretencion', 'accrepfondoterc', 'accdeposito', 'accfondotercero', 'accpagoordenes', 'accregobras', 'accusuarioingenieria', 'accasigobras', 'acccaratula', 'acccuaderno', 'accrepgenobras', 'accrepobrasasig', 'accrepobraejecu', 'accrepcontratista', 'acccamstainmue', 'acccontratista', 'acccargos', 'accactivos', 'accaprocompro', 'accalmacen', 'accsolisuministro', 'accunimedi', 'accproveedor', 'acctipoproducto', 'accproducto', 'accrequisicion', 'accsolicompra', 'accaprosolicompra', 'accusuariocompra', 'accrepalmacen', 'accreprespalmacen', 'accrepsolicompra', 'accrepsolisumi', 'accreprequisicion', 'acccontrolinterno', 'acccuentacontable', 'accaprobpagoobras', 'accsolicpagoobras', 'accubicacionalmacen', 'accentradaalmacen', 'accsalidaalmacen', 'accdespachoalmacen', 'acclisgencompraalmacen', 'acclismovcompraalmacen', 'acclisinventario', 'acclissolicompraalmacen', 'accaprodesaprodespacho', 'accespecial', 'accrepresugenobra', 'accusuarionomina', 'accpermdecla', 'accacreditacion', 'acctipomulta', 'accmultaindu', 'accmultainmu', 'accmultavehi', 'accmultaapu', 'accmultapropa', 'accmultarenta', 'accmultalico', 'accformucue', 'accvincucue', 'accrepplancue', 'accrepvincucue', 'accusuarioconta', 'acctipoactivo', 'accubicacionbien', 'accmotivoincorporacion', 'accmotivodesincorporacion', 'accincorporacionmueble', 'accincorporacioninmueble', 'accdesincorporacionmueble', 'accdesincorporacioninmueble', 'acctransferenciabien', 'accreptipoactivo', 'accrepubicacionbien', 'accrepdisposicion', 'accrepincorporacion', 'accrepdesincorporacion', 'accreptransferencia', 'accusuariobien', 'acccargarcue', 'accasiento', 'accmodreten', 'accrepobras', 'accenvchecausar', 'accrepcatcue', 'accrepsalini', 'accrepsaldo', 'accrepbalacom', 'accrepbalagen', 'accrepasiento', 'accrepestamov', 'accrepinvemueble', 'accrepresuinvemueble', 'accrepmovimueble', 'accrepmresucuemue', 'accrepmayoranali', 'accacticontri', 'accadministrador'], 'safe'],
            [['liquidador', 'poseeimpresora', 'rememberMe'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuario::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idusuario' => $this->idusuario,
            'idefiscal' => $this->idefiscal,
            'idorganizacion' => $this->idorganizacion,
            'persona' => $this->persona,
            'status' => $this->status,
            'liquidador' => $this->liquidador,
            'poseeimpresora' => $this->poseeimpresora,
            'puerto' => $this->puerto,
            'impresora' => $this->impresora,
            'idcoordinacion' => $this->idcoordinacion,
            'iddireccion' => $this->iddireccion,
            'rememberMe' => $this->rememberMe,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'passwd', $this->passwd])
            ->andFilterWhere(['like', 'accaplicacion', $this->accaplicacion])
            ->andFilterWhere(['like', 'accorganizacion', $this->accorganizacion])
            ->andFilterWhere(['like', 'accestructura', $this->accestructura])
            ->andFilterWhere(['like', 'acccambiofecha', $this->acccambiofecha])
            ->andFilterWhere(['like', 'accusuario', $this->accusuario])
            ->andFilterWhere(['like', 'accpersona', $this->accpersona])
            ->andFilterWhere(['like', 'acccambioefiscal', $this->acccambioefiscal])
            ->andFilterWhere(['like', 'acciva', $this->acciva])
            ->andFilterWhere(['like', 'accut', $this->accut])
            ->andFilterWhere(['like', 'accdesbloquear', $this->accdesbloquear])
            ->andFilterWhere(['like', 'accdesconectar', $this->accdesconectar])
            ->andFilterWhere(['like', 'acctasaactiva', $this->acctasaactiva])
            ->andFilterWhere(['like', 'accusuariocat', $this->accusuariocat])
            ->andFilterWhere(['like', 'accfichacat', $this->accfichacat])
            ->andFilterWhere(['like', 'accvalorterrecat', $this->accvalorterrecat])
            ->andFilterWhere(['like', 'accvalortipocat', $this->accvalortipocat])
            ->andFilterWhere(['like', 'accdepreciacioncat', $this->accdepreciacioncat])
            ->andFilterWhere(['like', 'accrepcedcat', $this->accrepcedcat])
            ->andFilterWhere(['like', 'accrepceremp', $this->accrepceremp])
            ->andFilterWhere(['like', 'accrepfichacat', $this->accrepfichacat])
            ->andFilterWhere(['like', 'accrepgenseccat', $this->accrepgenseccat])
            ->andFilterWhere(['like', 'acccontribuyente', $this->acccontribuyente])
            ->andFilterWhere(['like', 'accactividad', $this->accactividad])
            ->andFilterWhere(['like', 'accdeclaraciones', $this->accdeclaraciones])
            ->andFilterWhere(['like', 'accedocuenta', $this->accedocuenta])
            ->andFilterWhere(['like', 'accconfigcome', $this->accconfigcome])
            ->andFilterWhere(['like', 'accusuariocome', $this->accusuariocome])
            ->andFilterWhere(['like', 'accreppatente', $this->accreppatente])
            ->andFilterWhere(['like', 'accimpedoctasectcome', $this->accimpedoctasectcome])
            ->andFilterWhere(['like', 'accrepgensector', $this->accrepgensector])
            ->andFilterWhere(['like', 'accrepactividad', $this->accrepactividad])
            ->andFilterWhere(['like', 'accrepfecdecla', $this->accrepfecdecla])
            ->andFilterWhere(['like', 'accrepmondecla', $this->accrepmondecla])
            ->andFilterWhere(['like', 'accimppatente', $this->accimppatente])
            ->andFilterWhere(['like', 'accinmueble', $this->accinmueble])
            ->andFilterWhere(['like', 'accedoctainmue', $this->accedoctainmue])
            ->andFilterWhere(['like', 'accvalfisterre', $this->accvalfisterre])
            ->andFilterWhere(['like', 'accvalfiscons', $this->accvalfiscons])
            ->andFilterWhere(['like', 'accconfiginmue', $this->accconfiginmue])
            ->andFilterWhere(['like', 'accusuarioinmue', $this->accusuarioinmue])
            ->andFilterWhere(['like', 'accusrepsectcat', $this->accusrepsectcat])
            ->andFilterWhere(['like', 'accusrepmontaval', $this->accusrepmontaval])
            ->andFilterWhere(['like', 'accusreptipconstruc', $this->accusreptipconstruc])
            ->andFilterWhere(['like', 'accusrepmontdeud', $this->accusrepmontdeud])
            ->andFilterWhere(['like', 'accusrepvalorconstruc', $this->accusrepvalorconstruc])
            ->andFilterWhere(['like', 'accimpedoctasectinmue', $this->accimpedoctasectinmue])
            ->andFilterWhere(['like', 'accapuesta', $this->accapuesta])
            ->andFilterWhere(['like', 'accclaseapuesta', $this->accclaseapuesta])
            ->andFilterWhere(['like', 'accedoctaapuesta', $this->accedoctaapuesta])
            ->andFilterWhere(['like', 'accconfigapuesta', $this->accconfigapuesta])
            ->andFilterWhere(['like', 'accusuarioapuesta', $this->accusuarioapuesta])
            ->andFilterWhere(['like', 'accvehiculo', $this->accvehiculo])
            ->andFilterWhere(['like', 'accclasevehiculo', $this->accclasevehiculo])
            ->andFilterWhere(['like', 'accedoctavehiculo', $this->accedoctavehiculo])
            ->andFilterWhere(['like', 'accconfigvehiculo', $this->accconfigvehiculo])
            ->andFilterWhere(['like', 'accusuariovehiculo', $this->accusuariovehiculo])
            ->andFilterWhere(['like', 'accrepgenvehi', $this->accrepgenvehi])
            ->andFilterWhere(['like', 'accrepcontvehideud', $this->accrepcontvehideud])
            ->andFilterWhere(['like', 'accreptipvehi', $this->accreptipvehi])
            ->andFilterWhere(['like', 'accpublicidad', $this->accpublicidad])
            ->andFilterWhere(['like', 'accclasepublicidad', $this->accclasepublicidad])
            ->andFilterWhere(['like', 'accedoctapublicidad', $this->accedoctapublicidad])
            ->andFilterWhere(['like', 'accconfigpublicidad', $this->accconfigpublicidad])
            ->andFilterWhere(['like', 'accusuariopublicidad', $this->accusuariopublicidad])
            ->andFilterWhere(['like', 'accrepgensecpubli', $this->accrepgensecpubli])
            ->andFilterWhere(['like', 'accrepcontpublideud', $this->accrepcontpublideud])
            ->andFilterWhere(['like', 'accreptippubli', $this->accreptippubli])
            ->andFilterWhere(['like', 'accrepedoctapubli', $this->accrepedoctapubli])
            ->andFilterWhere(['like', 'accrenta', $this->accrenta])
            ->andFilterWhere(['like', 'accedoctarenta', $this->accedoctarenta])
            ->andFilterWhere(['like', 'accconfigrenta', $this->accconfigrenta])
            ->andFilterWhere(['like', 'accusuariorenta', $this->accusuariorenta])
            ->andFilterWhere(['like', 'accefiscal', $this->accefiscal])
            ->andFilterWhere(['like', 'acccatpro', $this->acccatpro])
            ->andFilterWhere(['like', 'accpuc', $this->accpuc])
            ->andFilterWhere(['like', 'acccrearfactura', $this->acccrearfactura])
            ->andFilterWhere(['like', 'accanularfactura', $this->accanularfactura])
            ->andFilterWhere(['like', 'accusuariofactura', $this->accusuariofactura])
            ->andFilterWhere(['like', 'acctiporenta', $this->acctiporenta])
            ->andFilterWhere(['like', 'accrepgenrenta', $this->accrepgenrenta])
            ->andFilterWhere(['like', 'accurepcontratorenta', $this->accurepcontratorenta])
            ->andFilterWhere(['like', 'accrepdeudarenta', $this->accrepdeudarenta])
            ->andFilterWhere(['like', 'accrepedoctarenta', $this->accrepedoctarenta])
            ->andFilterWhere(['like', 'accreptiporenta', $this->accreptiporenta])
            ->andFilterWhere(['like', 'accbanco', $this->accbanco])
            ->andFilterWhere(['like', 'acccuentabancaria', $this->acccuentabancaria])
            ->andFilterWhere(['like', 'numcaja', $this->numcaja])
            ->andFilterWhere(['like', 'accusuariopresu', $this->accusuariopresu])
            ->andFilterWhere(['like', 'accformpresu', $this->accformpresu])
            ->andFilterWhere(['like', 'accaprobpresup', $this->accaprobpresup])
            ->andFilterWhere(['like', 'accreppuc', $this->accreppuc])
            ->andFilterWhere(['like', 'accrepformpresu', $this->accrepformpresu])
            ->andFilterWhere(['like', 'accreppresuing', $this->accreppresuing])
            ->andFilterWhere(['like', 'accrepedofinanc', $this->accrepedofinanc])
            ->andFilterWhere(['like', 'accrepmovpresu', $this->accrepmovpresu])
            ->andFilterWhere(['like', 'accrepcondicpar', $this->accrepcondicpar])
            ->andFilterWhere(['like', 'accrepcomprom', $this->accrepcomprom])
            ->andFilterWhere(['like', 'accpartext', $this->accpartext])
            ->andFilterWhere(['like', 'accaumentopart', $this->accaumentopart])
            ->andFilterWhere(['like', 'accdisminucionpart', $this->accdisminucionpart])
            ->andFilterWhere(['like', 'acctraslado', $this->acctraslado])
            ->andFilterWhere(['like', 'acccompromiso', $this->acccompromiso])
            ->andFilterWhere(['like', 'accfacturar', $this->accfacturar])
            ->andFilterWhere(['like', 'accanularfact', $this->accanularfact])
            ->andFilterWhere(['like', 'accusuariofacturacion', $this->accusuariofacturacion])
            ->andFilterWhere(['like', 'accrepfactemit', $this->accrepfactemit])
            ->andFilterWhere(['like', 'accurepfactporcobrar', $this->accurepfactporcobrar])
            ->andFilterWhere(['like', 'accrepfactcobrada', $this->accrepfactcobrada])
            ->andFilterWhere(['like', 'accrepfactanulada', $this->accrepfactanulada])
            ->andFilterWhere(['like', 'accrepfactportipo', $this->accrepfactportipo])
            ->andFilterWhere(['like', 'accingresos', $this->accingresos])
            ->andFilterWhere(['like', 'accsupervisor', $this->accsupervisor])
            ->andFilterWhere(['like', 'accrepresumcaja', $this->accrepresumcaja])
            ->andFilterWhere(['like', 'accreptransdiarias', $this->accreptransdiarias])
            ->andFilterWhere(['like', 'accrepactutransac', $this->accrepactutransac])
            ->andFilterWhere(['like', 'accreptransacciones', $this->accreptransacciones])
            ->andFilterWhere(['like', 'accrepcontrolcheq', $this->accrepcontrolcheq])
            ->andFilterWhere(['like', 'accrepcontroldepo', $this->accrepcontroldepo])
            ->andFilterWhere(['like', 'accusuariocaja', $this->accusuariocaja])
            ->andFilterWhere(['like', 'acctipoingreso', $this->acctipoingreso])
            ->andFilterWhere(['like', 'acctipoimpuesto', $this->acctipoimpuesto])
            ->andFilterWhere(['like', 'accrepconstancia', $this->accrepconstancia])
            ->andFilterWhere(['like', 'accrepvalconstruc', $this->accrepvalconstruc])
            ->andFilterWhere(['like', 'accrepvalterreno', $this->accrepvalterreno])
            ->andFilterWhere(['like', 'accrepdepreciacion', $this->accrepdepreciacion])
            ->andFilterWhere(['like', 'accreptipoapuesta', $this->accreptipoapuesta])
            ->andFilterWhere(['like', 'accrepgensectapu', $this->accrepgensectapu])
            ->andFilterWhere(['like', 'accrepdeclanualapu', $this->accrepdeclanualapu])
            ->andFilterWhere(['like', 'accrepdeudapuesta', $this->accrepdeudapuesta])
            ->andFilterWhere(['like', 'accrepedoctapuesta', $this->accrepedoctapuesta])
            ->andFilterWhere(['like', 'accactudeuindustria', $this->accactudeuindustria])
            ->andFilterWhere(['like', 'accactudeuinmue', $this->accactudeuinmue])
            ->andFilterWhere(['like', 'accactudeurenta', $this->accactudeurenta])
            ->andFilterWhere(['like', 'accactudeuvehiculo', $this->accactudeuvehiculo])
            ->andFilterWhere(['like', 'accactudeuapuesta', $this->accactudeuapuesta])
            ->andFilterWhere(['like', 'acctasapasiva', $this->acctasapasiva])
            ->andFilterWhere(['like', 'accgestores', $this->accgestores])
            ->andFilterWhere(['like', 'accasignacion', $this->accasignacion])
            ->andFilterWhere(['like', 'accvisitas', $this->accvisitas])
            ->andFilterWhere(['like', 'accefectividad', $this->accefectividad])
            ->andFilterWhere(['like', 'accrepresucaja', $this->accrepresucaja])
            ->andFilterWhere(['like', 'accreptransadia', $this->accreptransadia])
            ->andFilterWhere(['like', 'accrepmovactu', $this->accrepmovactu])
            ->andFilterWhere(['like', 'accrepdeudaperi', $this->accrepdeudaperi])
            ->andFilterWhere(['like', 'accrepfactuasigna', $this->accrepfactuasigna])
            ->andFilterWhere(['like', 'accrepdeudarecu', $this->accrepdeudarecu])
            ->andFilterWhere(['like', 'accusuariogestion', $this->accusuariogestion])
            ->andFilterWhere(['like', 'acclicores', $this->acclicores])
            ->andFilterWhere(['like', 'actipotasa', $this->actipotasa])
            ->andFilterWhere(['like', 'accedoctalicores', $this->accedoctalicores])
            ->andFilterWhere(['like', 'accconfiglicores', $this->accconfiglicores])
            ->andFilterWhere(['like', 'accusuariolicores', $this->accusuariolicores])
            ->andFilterWhere(['like', 'accrepgenseclicor', $this->accrepgenseclicor])
            ->andFilterWhere(['like', 'accrepcontlicores', $this->accrepcontlicores])
            ->andFilterWhere(['like', 'accreptipotasa', $this->accreptipotasa])
            ->andFilterWhere(['like', 'accrepedoctalicores', $this->accrepedoctalicores])
            ->andFilterWhere(['like', 'accexplicores', $this->accexplicores])
            ->andFilterWhere(['like', 'acctiporetencion', $this->acctiporetencion])
            ->andFilterWhere(['like', 'accusuarioadmini', $this->accusuarioadmini])
            ->andFilterWhere(['like', 'accegresos', $this->accegresos])
            ->andFilterWhere(['like', 'acctransferenciabanc', $this->acctransferenciabanc])
            ->andFilterWhere(['like', 'accconciliacion', $this->accconciliacion])
            ->andFilterWhere(['like', 'acccheqanul', $this->acccheqanul])
            ->andFilterWhere(['like', 'accdebito', $this->accdebito])
            ->andFilterWhere(['like', 'acccredito', $this->acccredito])
            ->andFilterWhere(['like', 'acccausar', $this->acccausar])
            ->andFilterWhere(['like', 'accaproborden', $this->accaproborden])
            ->andFilterWhere(['like', 'accrepordenpago', $this->accrepordenpago])
            ->andFilterWhere(['like', 'accrepbanco', $this->accrepbanco])
            ->andFilterWhere(['like', 'accrepretencion', $this->accrepretencion])
            ->andFilterWhere(['like', 'accrepfondoterc', $this->accrepfondoterc])
            ->andFilterWhere(['like', 'accdeposito', $this->accdeposito])
            ->andFilterWhere(['like', 'accfondotercero', $this->accfondotercero])
            ->andFilterWhere(['like', 'accpagoordenes', $this->accpagoordenes])
            ->andFilterWhere(['like', 'accregobras', $this->accregobras])
            ->andFilterWhere(['like', 'accusuarioingenieria', $this->accusuarioingenieria])
            ->andFilterWhere(['like', 'accasigobras', $this->accasigobras])
            ->andFilterWhere(['like', 'acccaratula', $this->acccaratula])
            ->andFilterWhere(['like', 'acccuaderno', $this->acccuaderno])
            ->andFilterWhere(['like', 'accrepgenobras', $this->accrepgenobras])
            ->andFilterWhere(['like', 'accrepobrasasig', $this->accrepobrasasig])
            ->andFilterWhere(['like', 'accrepobraejecu', $this->accrepobraejecu])
            ->andFilterWhere(['like', 'accrepcontratista', $this->accrepcontratista])
            ->andFilterWhere(['like', 'acccamstainmue', $this->acccamstainmue])
            ->andFilterWhere(['like', 'acccontratista', $this->acccontratista])
            ->andFilterWhere(['like', 'acccargos', $this->acccargos])
            ->andFilterWhere(['like', 'accactivos', $this->accactivos])
            ->andFilterWhere(['like', 'accaprocompro', $this->accaprocompro])
            ->andFilterWhere(['like', 'accalmacen', $this->accalmacen])
            ->andFilterWhere(['like', 'accsolisuministro', $this->accsolisuministro])
            ->andFilterWhere(['like', 'accunimedi', $this->accunimedi])
            ->andFilterWhere(['like', 'accproveedor', $this->accproveedor])
            ->andFilterWhere(['like', 'acctipoproducto', $this->acctipoproducto])
            ->andFilterWhere(['like', 'accproducto', $this->accproducto])
            ->andFilterWhere(['like', 'accrequisicion', $this->accrequisicion])
            ->andFilterWhere(['like', 'accsolicompra', $this->accsolicompra])
            ->andFilterWhere(['like', 'accaprosolicompra', $this->accaprosolicompra])
            ->andFilterWhere(['like', 'accusuariocompra', $this->accusuariocompra])
            ->andFilterWhere(['like', 'accrepalmacen', $this->accrepalmacen])
            ->andFilterWhere(['like', 'accreprespalmacen', $this->accreprespalmacen])
            ->andFilterWhere(['like', 'accrepsolicompra', $this->accrepsolicompra])
            ->andFilterWhere(['like', 'accrepsolisumi', $this->accrepsolisumi])
            ->andFilterWhere(['like', 'accreprequisicion', $this->accreprequisicion])
            ->andFilterWhere(['like', 'acccontrolinterno', $this->acccontrolinterno])
            ->andFilterWhere(['like', 'acccuentacontable', $this->acccuentacontable])
            ->andFilterWhere(['like', 'accaprobpagoobras', $this->accaprobpagoobras])
            ->andFilterWhere(['like', 'accsolicpagoobras', $this->accsolicpagoobras])
            ->andFilterWhere(['like', 'accubicacionalmacen', $this->accubicacionalmacen])
            ->andFilterWhere(['like', 'accentradaalmacen', $this->accentradaalmacen])
            ->andFilterWhere(['like', 'accsalidaalmacen', $this->accsalidaalmacen])
            ->andFilterWhere(['like', 'accdespachoalmacen', $this->accdespachoalmacen])
            ->andFilterWhere(['like', 'acclisgencompraalmacen', $this->acclisgencompraalmacen])
            ->andFilterWhere(['like', 'acclismovcompraalmacen', $this->acclismovcompraalmacen])
            ->andFilterWhere(['like', 'acclisinventario', $this->acclisinventario])
            ->andFilterWhere(['like', 'acclissolicompraalmacen', $this->acclissolicompraalmacen])
            ->andFilterWhere(['like', 'accaprodesaprodespacho', $this->accaprodesaprodespacho])
            ->andFilterWhere(['like', 'accespecial', $this->accespecial])
            ->andFilterWhere(['like', 'accrepresugenobra', $this->accrepresugenobra])
            ->andFilterWhere(['like', 'accusuarionomina', $this->accusuarionomina])
            ->andFilterWhere(['like', 'accpermdecla', $this->accpermdecla])
            ->andFilterWhere(['like', 'accacreditacion', $this->accacreditacion])
            ->andFilterWhere(['like', 'acctipomulta', $this->acctipomulta])
            ->andFilterWhere(['like', 'accmultaindu', $this->accmultaindu])
            ->andFilterWhere(['like', 'accmultainmu', $this->accmultainmu])
            ->andFilterWhere(['like', 'accmultavehi', $this->accmultavehi])
            ->andFilterWhere(['like', 'accmultaapu', $this->accmultaapu])
            ->andFilterWhere(['like', 'accmultapropa', $this->accmultapropa])
            ->andFilterWhere(['like', 'accmultarenta', $this->accmultarenta])
            ->andFilterWhere(['like', 'accmultalico', $this->accmultalico])
            ->andFilterWhere(['like', 'accformucue', $this->accformucue])
            ->andFilterWhere(['like', 'accvincucue', $this->accvincucue])
            ->andFilterWhere(['like', 'accrepplancue', $this->accrepplancue])
            ->andFilterWhere(['like', 'accrepvincucue', $this->accrepvincucue])
            ->andFilterWhere(['like', 'accusuarioconta', $this->accusuarioconta])
            ->andFilterWhere(['like', 'acctipoactivo', $this->acctipoactivo])
            ->andFilterWhere(['like', 'accubicacionbien', $this->accubicacionbien])
            ->andFilterWhere(['like', 'accmotivoincorporacion', $this->accmotivoincorporacion])
            ->andFilterWhere(['like', 'accmotivodesincorporacion', $this->accmotivodesincorporacion])
            ->andFilterWhere(['like', 'accincorporacionmueble', $this->accincorporacionmueble])
            ->andFilterWhere(['like', 'accincorporacioninmueble', $this->accincorporacioninmueble])
            ->andFilterWhere(['like', 'accdesincorporacionmueble', $this->accdesincorporacionmueble])
            ->andFilterWhere(['like', 'accdesincorporacioninmueble', $this->accdesincorporacioninmueble])
            ->andFilterWhere(['like', 'acctransferenciabien', $this->acctransferenciabien])
            ->andFilterWhere(['like', 'accreptipoactivo', $this->accreptipoactivo])
            ->andFilterWhere(['like', 'accrepubicacionbien', $this->accrepubicacionbien])
            ->andFilterWhere(['like', 'accrepdisposicion', $this->accrepdisposicion])
            ->andFilterWhere(['like', 'accrepincorporacion', $this->accrepincorporacion])
            ->andFilterWhere(['like', 'accrepdesincorporacion', $this->accrepdesincorporacion])
            ->andFilterWhere(['like', 'accreptransferencia', $this->accreptransferencia])
            ->andFilterWhere(['like', 'accusuariobien', $this->accusuariobien])
            ->andFilterWhere(['like', 'acccargarcue', $this->acccargarcue])
            ->andFilterWhere(['like', 'accasiento', $this->accasiento])
            ->andFilterWhere(['like', 'accmodreten', $this->accmodreten])
            ->andFilterWhere(['like', 'accrepobras', $this->accrepobras])
            ->andFilterWhere(['like', 'accenvchecausar', $this->accenvchecausar])
            ->andFilterWhere(['like', 'accrepcatcue', $this->accrepcatcue])
            ->andFilterWhere(['like', 'accrepsalini', $this->accrepsalini])
            ->andFilterWhere(['like', 'accrepsaldo', $this->accrepsaldo])
            ->andFilterWhere(['like', 'accrepbalacom', $this->accrepbalacom])
            ->andFilterWhere(['like', 'accrepbalagen', $this->accrepbalagen])
            ->andFilterWhere(['like', 'accrepasiento', $this->accrepasiento])
            ->andFilterWhere(['like', 'accrepestamov', $this->accrepestamov])
            ->andFilterWhere(['like', 'accrepinvemueble', $this->accrepinvemueble])
            ->andFilterWhere(['like', 'accrepresuinvemueble', $this->accrepresuinvemueble])
            ->andFilterWhere(['like', 'accrepmovimueble', $this->accrepmovimueble])
            ->andFilterWhere(['like', 'accrepmresucuemue', $this->accrepmresucuemue])
            ->andFilterWhere(['like', 'accrepmayoranali', $this->accrepmayoranali])
            ->andFilterWhere(['like', 'accacticontri', $this->accacticontri])
            ->andFilterWhere(['like', 'accadministrador', $this->accadministrador]);

        return $dataProvider;
    }
}
