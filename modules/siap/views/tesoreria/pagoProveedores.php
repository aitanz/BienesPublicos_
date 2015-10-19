<?php

use yii\widgets\ActiveForm;
use app\assets\InputMaskAssets;

$this->title = Yii::t('app', 'Pago de Proveedores');
$this->params['breadcrumbs'][] = [
    'label' => 'Siap',
    'url' => ['/siap/'],
];
$this->params['breadcrumbs'][] = [
    'label' => 'Tesoreria',
    'url' => '#',
];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin([
    'id' => 'pago-proveedores-form',
]);
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Datos de la Empresa</a></li>
        <li><a href="#tab_2" data-toggle="tab">Proveedores</a></li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

            <div class="form-group">
                <label for="exampleInputEmail1">Nombre de la empresa</label>
                <input class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre de la empesa" type="text" required><!-- oninvalid="this.setCustomValidity('Campo obligatorio')"> -->
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">RIF de la empresa</label>
                <div class="input-group input-group-lg">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" id="buttonRifLetter">Letra<span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                            <li onclick="$('#buttonRifLetter').text($(this).text());
                                    $('#letraRif').val('g')"><a href="#">G</a></li>
                            <li class="divider"></li>
                            <li onclick="$('#buttonRifLetter').text($(this).text());
                                    $('#letraRif').val('j')"><a href="#">J</a></li>
                            <li class="divider"></li>
                            <li onclick="$('#buttonRifLetter').text($(this).text());
                                    $('#letraRif').val('v')"><a href="#">V</a></li>
                            <li class="divider"></li>
                            <li onclick="$('#buttonRifLetter').text($(this).text());
                                    $('#letraRif').val('e')"><a href="#">E</a></li>
                            <li class="divider"></li>
                            <li onclick="$('#buttonRifLetter').text($(this).text());
                                    $('#letraRif').val('p')"><a href="#">P</a></li>
                        </ul>
                    </div><!-- /btn-group -->
                    <input class="form-control" type="text" name="rif" id="rif" placeholder="RIF" required maxlength="9">
                    <input class="form-control hidden" type="hidden" name="letraRif" id="letraRif" required>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Numero referencia de lote</label>
                <input class="form-control" id="numeroReferencia" name="numeroReferencia" placeholder="Numero de referencia" type="number" required min="0" maxlength="4">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Número de Negociación</label>
                <input class="form-control" id="numeroNegociacion" name="numeroNegociacion" placeholder="Número de Negociación" type="number" required min="0">
            </div>

            <div class="form-group">
                <label>Fecha de Envio</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control fecha-input" id="fechaEnvio" name="fechaEnvio" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text" required>
                </div><!-- /.input group -->
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de Cuenta del Ordenante</label>
                <select class="form-control" id="tipoCuentaOrdenante" name="tipoCuentaOrdenante" required>
                    <option value="default" disabled="disabled">Seleccione el tipo de cuenta--</option>
                    <option value="00">Corriente</option>
                    <option value="01">Ahorro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Número de Cuenta del Ordenante</label>
                <input class="form-control" id="numeroCuentaOrdenante" name="numeroCuentaOrdenante" placeholder="Número de Cuenta del Ordenante" type="text" required maxlength="20">
            </div>

        </div><!-- /.tab-pane -->


        <div class="tab-pane" id="tab_2">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Proveedores</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_filter">
                                    <a class="btn btn-app" id="agregarProveedor">
                                        <i class="fa fa-plus"></i>Agregar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="overflow: auto">
                            <div class="col-sm-12">
                                <table aria-describedby="example1_info" role="grid" id="example1" class="table table-bordered table-striped dataTable">
                                    <thead class="bg-red-active color-palette">
                                        <tr role="row">
                                            <th rowspan="2">Beneficiario</th>
                                            <th rowspan="2">N° Referencia del Crédito</th>
                                            <th colspan="2">RIF/CI Beneficiario</th>
                                            <th rowspan="2">Tipo Cuenta</th>
                                            <th rowspan="2">N° Cuenta Benefciario</th>
                                            <th rowspan="2">Monto Crédito</th>
                                            <th rowspan="2">Tipo Pago</th>
                                            <th rowspan="2">Banco</th>
                                            <th rowspan="2">Duración Cheque</th>
                                            <th rowspan="2">EMAIL Beneficiario</th>
                                            <th rowspan="2">Fecha Valor Débito</th>
                                            <th rowspan="2">Eliminar</th>
                                        </tr>
                                        <tr>
                                            <th>Letra RIF/CI</th>
                                            <th>NUMERO RIF/CI</th>
                                        </tr>
                                    </thead>

                                    <tbody id="proveedores">
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>

        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->

<button class="btn btn-block btn-social btn-bitbucket bg-olive margin" type="submit">
    <i class="fa fa-save"></i> Generar TXT
</button>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
var filas = 0;

function DatosEmpresa(nombreEmpresa, rif, letraRif, numeroReferencia, numeroNegociacion, fechaEnvio, tipoCuentaOrdenante, numeroCuentaOrdenante)
{
    this.nombreEmpresa = nombreEmpresa;
    this.rif = rif;
    this.letraRif = letraRif;
    this.numeroReferencia = numeroReferencia;
    this.numeroNegociacion = numeroNegociacion;
    this.fechaEnvio = fechaEnvio;
    this.tipoCuentaOrdenante = tipoCuentaOrdenante;
    this.numeroCuentaOrdenante = numeroCuentaOrdenante;
}

function Proveedor(nombre, numeroReferencia, letraRif, numeroRif, tipoCuenta, numeroCuenta, montoCredito, tipoPago, tipoBanco, duracionCheque, email, fechaValor)
{
    this.nombre = nombre;
    this.numeroReferencia = numeroReferencia;
    this.letraRif = letraRif;
    this.numeroRif = numeroRif;
    this.tipoCuenta = tipoCuenta;
    this.numeroCuenta = numeroCuenta;
    this.montoCredito = montoCredito;
    this.tipoPago = tipoPago;
    this.tipoBanco = tipoBanco;
    this.duracionCheque = duracionCheque;
    this.email = email;
    this.fechaValor = fechaValor;
}

$(document).ready(function()
{
    //Datemask dd/mm/yyyy
    $("#fechaEnvio").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

//    $('#pago-proveedores-form').on("submit", function(event) {
//        event.preventDefault();
//        if (this.checkValidity())
//        {
//            return true;
//        }
//        else
//        {
//            alert("Faltan campos obligatorios.");
//            return false;
//        }
//    });

    $("#agregarProveedor").on("click", function() {
        $("#proveedores").append($("#rowData tbody").html());
        filas++;
        $("#proveedores").find("tr").last().removeClass("odd even");
        $("#proveedores").find("tr").last().attr("id", "fila" + filas);

        if (filas == 1)
            $(".sidebar-toggle").click();

        if ((filas % 2) == 0)
        {
            $("#proveedores").find("tr").last().addClass("odd");
        }
        else
        {
            $("#proveedores").find("tr").last().addClass("even");
        }

        $("#proveedores .fecha-input").each(function()
        {
            $(this).inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        });

        $(".remove").on("click", function() {
            $(this).closest("tr").remove();
        });

    });
    
    $("#pago-proveedores-form").on("submit", function(event)
    {
        event.preventDefault();
        var datosEmpresa = new DatosEmpresa(
            $("#nombreEmpresa").val(),
            $("#rif").val(),
            $("#letraRif").val(),
            $("#numeroReferencia").val(),
            $("#numeroNegociacion").val(),
            $("#fechaEnvio").val(),
            $("#tipoCuentaOrdenante option:selected").val(),
            $("#numeroCuentaOrdenante").val()
        );
        var proveedores = new Array();
        $("#proveedores tr").each(function()
        {
            proveedores.push( new Proveedor(
                $(this).find("#nombreBeneficiario").val(),
                $(this).find("#numeroReferencia").val(),
                $(this).find("#letraRifBeneficiario").val(),
                $(this).find("#numeroRifBeneficiario").val(),
                $(this).find("#tipoCuentaBeneficiario").val(),
                $(this).find("#numeroCuentaBeneficiario").val(),
                parseFloat( $(this).find("#montoCredito").val() ),
                $(this).find("#tipoPago").val(),
                $(this).find("#tipoBanco").val(),
                $(this).find("#duracionCheque").val(),
                $(this).find("#emailBeneficiario").val(),
                $(this).find("#fechaValorDebito").val()
            ));
        });
        $.ajax({
            sync: false,
            type: 'POST',
            cache: false,
            url: '<?= yii\helpers\Url::to(['/siap/tesoreria/generar-archivopago-proveedores']) ?>',
            data: {
                datosEmpresa : JSON.stringify( datosEmpresa ),
                proveedores : JSON.stringify( proveedores )
            },
            beforeSend: function (xhr)
            {
                $('#contenido').block({css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                }});

            },
            error: function (error) {
                //error(error);
                $('#contenido').unblock();
            },
            success: function (response) {
                $('#contenido').unblock();
                response = JSON.parse(response);
                if( response.success )
                {
                    window.open('<?= yii\helpers\Url::to( ['/siap/tesoreria/descargar-archivo']) ?>', "_self");
                }
                else
                {
                    alert(response.message);
                }
            }
        });
        return false;
    });
    $("#agregarProveedor").click();
    $("#agregarProveedor").click();
    $("#proveedores tr").each(function()
    {
        $(this).find("#nombreBeneficiario").val("PROTECCION CIVIL");
        $(this).find("#numeroReferencia").val("470002");
        $(this).find("#letraRifBeneficiario").val("g");
        $(this).find("#numeroRifBeneficiario").val("200012722");
        $(this).find("#tipoCuentaBeneficiario").val("00");
        $(this).find("#numeroCuentaBeneficiario").val("01750137210071438595");
        $(this).find("#montoCredito").val("3,485,270.38");
        $(this).find("#tipoPago").val("2");
        $(this).find("#tipoBanco").val("32");
        $(this).find("#duracionCheque").val("");
        $(this).find("#emailBeneficiario").val("omar_mejias71@hotmail.com");
        $(this).find("#fechaValorDebito").val("11/11/2011");
    });
});
</script>

<div id="rowData" class="hidden" style="display: none; visibility: hidden">
    <table class="hidden" style="display: none; visibility: hidden">
        <tr class="odd" role="row">
            <td><input type="text" name="nombreBeneficiario" id="nombreBeneficiario" required class="" /></td>
            <td><input type="number" name="numeroReferencia" id="numeroReferencia" required class="" min="0" /></td>
            <td>
                <select name="letraRifBeneficiario" id="letraRifBeneficiario" class="">
                    <option value="j">J</option>
                    <option value="g" selected>G</option>
                    <option value="e">E</option>
                    <option value="v">V</option>
                    <option value="p">P</option>
                </select>
            </td>
            <td><input type="number" name="numeroRifBeneficiario" id="numeroRifBeneficiario" required class="" min="0" /></td>
            <td>
                <select name="tipoCuentaBeneficiario" id="tipoCuentaBeneficiario" class="">
                    <option value="00">C</option>
                    <option value="01">A</option>
                </select>
            </td>
            <td><input type="number" name="numeroCuentaBeneficiario" id="numeroCuentaBeneficiario" required class="" min="0" maxlength="20" /></td>
            <td><input type="text" name="montoCredito" id="montoCredito" required class="" min="0" placeholder="123456.78" title="El numero debe ser en formato 123456.78" /></td>
            <td>
                <select name="tipoPago" id="tipoPago" class="">
                    <option value="1">Abono de Cuenta BdV</option>
                    <option value="2" selected>Transferencia Swift</option>
                    <option value="3">Cheque de Gerencia</option>
                </select>
            </td>
            <td>
                <select name="tipoBanco" id="tipoBanco" class="">
                    <option value="BSCHVECA">Banco de Venezuela</option>
                    <option value="CITIUS33">Citibank</option>
                    <option value="BPROVECA">Provincial</option>
                    <option value="BAMRVECA">Mercantil</option>
                    <option value="UNIOVECA">Banesco</option>
                    <option value="VZCRVECA">Venezolano de Crédito</option>
                    <option value="BEXTVECA">Exterior</option>
                    <option value="REPBVECA">Fondo Común</option>
                    <option value="INDSVECA">Industrial de Venezuela</option>
                    <option value="CONSVECA">Corpbanca</option>
                    <option value="CARBVECA">Del Caribe</option>
                    <option value="BAFIVECA">Federal</option>
                    <option value="NMBCVECA">Nuevo Mundo</option>
                    <option value="BCVEVECA">Banco Central de Venezuela</option>
                    <option value="BODEVE2M">Occidental de Descuento</option>
                    <option value="BOCAVECA">Canarias</option>
                    <option value="SFTAVE22">Sofitasa</option>
                    <option value="NCRTVECA">Banco Nacional de Crédito</option>
                    <option value="ABNAVECA">ABN Ambro Bank</option>
                    <option value="CONDVECP">Confederado</option>
                    <option value="CAFCVECA">Corp. Andina de Fomento</option>
                    <option value="TTALVECA">Total Bank</option>
                    <option value="FIVVVECA">De Desarrollo Económico y Social de Venezuela</option>
                    <option value="DSURVECP">Del Sur</option>
                    <option value="PLZAVECA">Banco Plaza</option>
                    <option value="BCEVVECA">De Comercio Exterior</option>
                    <option value="CAROVECA">Del Caroní</option>
                    <option value="CETLVECA">Central Entidad de Ahorro</option>
                    <option value="ANDSVECC">Banfoandes</option>
                    <option value="PVVDVECA">Banpro, C.A. Banco Universal</option>
                    <option value="BGUAVECB">Banco Guayana</option>
                    <option value="otro">Otros Bancos</option>
                </select>
            </td>
            <td>
                <select name="duracionCheque" id="duracionCheque" class="">
                    <option value="0">0</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="60">60</option>
                    <option value="90">90</option>
                    <option value="120">120</option>
                    <option value="180">180</option>
                </select>
            </td>
            <td><input type="email" name="emailBeneficiario" id="emailBeneficiario" required class=" input-email" data-inputmask="'alias': 'correo@dominio.com'" data-mask="" /></td>
            <td><input class=" fecha-input" id="fechaValorDebito" name="fechaValorDebito" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text" required></td>
            <td><i class="fa fa-remove remove" style="cursor: pointer"></i></td>
        </tr>
    </table>
</div>

<?php InputMaskAssets::register($this); ?>

