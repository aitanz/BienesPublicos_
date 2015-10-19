<?php
use kartik\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use app\modules\requisiciones\models\Requisicion;
use app\modules\requisiciones\models\Unidadmedida;
use app\modules\requisiciones\models\Tipoproducto;
use app\modules\requisiciones\models\Requisiciondeta;
use app\modules\requisiciones\models\RequisicionSearch;
use app\modules\requisiciones\models\Puc;
use app\modules\requisiciones\models\Cuentapresupuestaria;
use app\modules\requisiciones\models\Proveedor;
use app\modules\requisiciones\models\Tipopagos;
use app\modules\requisiciones\models\Producto;
use app\modules\requisiciones\models\Categoriaprogramatica;
use app\modules\requisiciones\models\Usuarios;
use app\modules\requisiciones\models\Coordinacion;
use app\modules\requisiciones\models\Grupousuario;

$fecha = date('d-m-Y');


/* @var $this yii\web\View */
/* @var $model app\modules\requisiciones\models\Requisicion */
/* @var $form yii\widgets\ActiveForm */

$searchModel = new RequisicionSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$reqDeta = new Requisiciondeta();
$prove = new Proveedor();
$capro = new Categoriaprogramatica();
$puc = new Puc();
$cp = new Cuentapresupuestaria();
$tp = new Tipopagos();
$prod = new Producto();
$unidadmedida = new Unidadmedida();
$tipoproducto = new Tipoproducto();
$coordinacion = new Coordinacion();



/*echo print_r($model);
echo'<br>';
echo print_r($reqDeta);
echo'<br><br>';
echo print_r($tipoproducto);
echo'<br><br>';
echo print_r($unidadmedida);
echo'<br><br>';
echo print_r($cp);*/
?>


  <div class="requisicion-form">
    <ol class="breadcrumb">
        <li><a href="#">HOME</a></li>
        <li><a href="#">REQUISICION</a></li>
        <li class="active">CREATE</li>
    </ol>
    <h4 align='center'> <b>SOLICITUD DE EJECUCIÓN PRESUPUESTARIA</b></h4><hr>
    
      <?= Alert::widget([
    'type' => Alert::TYPE_SUCCESS,
    'title' => 'REQUISICION CARGADA!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'You successfully ',
    'showSeparator' => true,
    'delay' => 4000
     ]); ?>

    <?php
    $form = ActiveForm::begin([ 'id' => 'formulario']);
   
    $fecha = date('d-m-Y');
    echo $form->field($model, 'fechacreacion')->textInput(array('value' => $fecha, 'readonly' => 'readonly'))->label('FECHA DE CREACIÓN');?>

 
    
    <?= $form->field($model, 'tipo')->dropDownList(['Bienes y Suministros', 'Servicios', 'Administracion'], ['prompt' => '-- Seleccione un tipo de Requisicion --',
        'onchange' => "$.ajax({
			type: 'POST',
	                cache: false,
	                url: '" . yii\helpers\Url::to(['requisicion/get-formulario']) . "',
		        beforeSend: function(xhr){
		        /*$('#pcont').block({css: {
			border: 'none',
			padding: '15px',
			backgroundColor: '#000',
		        '-webkit-border-radius': '10px',
		        '-moz-border-radius': '10px',
			opacity: .5,
			color: '#fff'
			}});*/
			},
                       data: {tipo: $('#requisicion-tipo').val()},
                       success: function(response){
                       //$('#pcont').unblock();
	               response = JSON.parse( response );
		            if( response.success ){
			       //alert(response.mensaje);
			       $('#capa_dinamica').slideDown(500);
			       $('#capa_dinamica').html(response.mensaje);
                               $('#submitButton').show();
			     }
				else{
				      alert(response.mensaje.ajax);
				    }
		        }

		    });"]);?> <br>
                    
                    
                

    <div id="capa_dinamica">

    </div>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [ 'id' => 'submitButton', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div><!--requisicion-form-->


<script type="text/javascript">

/*modal unidad ejecutora*/

    $(document).on("ready", function(){
      $("#submitButton").hide();
        $("#salvar").click(function()
        {
            valor1 = $("#modalue option:selected").text();
            valor2 = $("#categoriaprogramatica-categoriaprogramatica").val();
            if (valor2 == ""){
                alert("Actividad no puede estar vacio");
                $("#categoriaprogramatica-categoriaprogramatica").focus();
                return false;
            }

            id = $("tr.ue").last().attr("id");
            id = Number(id.substr(8, id.length)) + 1;
            dataKey = $("tr.ue").last().attr("data-key");
            productoNumero = parseInt($("tr.ue").last().find("td").first().text()) + 1;
            $("#tabla tbody").append('<tr id="producto' + id + '" class="ue" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' + valor1 + '</td><td>' + valor2 + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
        });

		/*modal ip*/
        $("#salvarip").click(function(){
            var ueip = $("#ueip option:selected").text();
            var cuentaip = $("#cuentaip").val();
            var dcuentaip = $("#pucd").val();
            var disponibleip = $("#cuentapresupuestaria-disponibilidad").val();
            var montoip = $("#montoip").val();

            id = $("tr.ip").last().attr("id");
            id = Number(id.substr(8, id.length)) + 1;
            dataKey = $("tr.ip").last().attr("data-key");
            productoNumero = parseInt($("tr.ip").last().find("td").first().text()) + 1;
            $("#tablaip tbody").append('<tr id="producto' + id + '" class="ip" data-key="' + dataKey + '" ><td>' + productoNumero + '</td><td>' + ueip + '</td><td>' + disponibleip + '</td><td></td><td>' + dcuentaip + '</td><td>' + cuentaip + '</td><td>' + montoip + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#producto' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
        });

		/*modal unidad ejecutora- bienes y suministros*/
        $("#salvarbs").click(function(){
            valor1 = $("#modaluebs option:selected").text();
            valor2 = $("#categoriaprogramatica-bs").val();

            id = $("tr.uebs").last().attr("id");
            id = Number(id.substr(8, id.length)) + 1;
            dataKey = $("tr.uebs").last().attr("data-key");
            productoNumero = parseInt($("tr.uebs").last().find("td").first().text()) + 1;

            $("#tablauebs tbody").append('<tr id="unidade' + id + '" class="uebs" data-key="' + dataKey + '"><td>' + unidadeNumero + '</td><td>' + '<input type="text" name="uni" id=unidad_administrativa' + id + ' readonly="true" class="form-control" value="' + valor1 + '">' + '</td><td>' + '<input type="text" name="uni"  id=actividad_administrativa' + id + ' readonly="true" class="form-control" value="' + valor2 + '">' + '</td><td><div class="fa-hover col-md-3 col-sm-4" onclick="$(\'#unidade' + id + '\').remove(),actualizar()"; style="cursor: pointer"><i class="fa fa-minus-square"> </i> Eliminar</div></td></tr>');
        });

    });

       var nav4 = window.Event ? true : false;
       function acceptNum(evt) {
        // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57
       var key = nav4 ? evt.which : evt.keyCode;
       return (key <= 13 || (key >= 48 && key <= 57) || key == 46 || key == 44);
       }
         //Funcion para actualizar monto de tabla
         function actualizar(){
         var num;
         var suma = 0;
         $('#tgrilla tr.productoFila').each(function(){
            suma += Number($(this).find('td').eq('3').text())
            //suma += parseInt($(this).find('td').eq(3).text()||0,10)
            // load a language
            numeral.language('Es', {
                delimiters: {
                    thousands: '.',
                    decimal: ','
                },
                ordinal: function(number) {
                    return number === 1 ? 'er' : 'ème';
                },
                currency: {
                    symbol: '€'
                }
            });

            // switch between languages
            numeral.language('Es');
            num = numeral(suma).format('0,0.00');
        });

        $("#result").val(num).css('color', 'black');

    }
    function formateadora() {
        // lenguaje español
        numeral.language('Es', {
            delimiters: {
                thousands: '.',
                decimal: ','
            },
            ordinal: function(number) {
                return number === 1 ? 'er' : 'ème';
            },
            currency: {
                symbol: '€'
            }
        });
        // switch between languages
        numeral.language('Es');
        var dolar = $("#montoip").val();
        bolivar = numeral(dolar).format('0,0.00');
        $("#montoip").val(bolivar).css('color', 'black');
    }
/*--------------------------------crear funciones-------------------------------------*/

     function unidadEjecutora(unidadEjecutora)
     {
      this.unidadEjecutora = unidadEjecutora;
     }

     function imputacionPresupuestaria(unidadEjecutora, monto, ord)
     {
        this.unidadEjecutora = unidadEjecutora;
        this.monto = monto;
        this.ord = ord;
     }

     function detalles(cantidad, descripcion, monto)
     {
       this.cantidad = cantidad;
       this.descripcion = descripcion;
       this.monto = monto;
     }
      
       
   /*---------------------------------------------fin----------------------------------------------------*/

</script>

<style type="text/css">
  .th{
        background-color: #F2F2F2;
        margin-left:30px;
      }

  #tdetalle{
        background-color:#fff;
        border-radius:10px;
        border:solid silver 2px;
      }

  .requisicion-form{
     width:800px
     }
  #capa2{
    display:block;
    }

  #capa_dinamica{
    display:none;
  }
</style>