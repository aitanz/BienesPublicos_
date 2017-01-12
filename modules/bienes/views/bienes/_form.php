
    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
//use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */
/* @var $form yii\widgets\ActiveForm */
$Sede = new app\modules\bienes\models\BienesSede;
$BienesCodigo = new app\modules\bienes\models\BienesCodigo;

$direccion = \yii::$app->user->Identity->id_direccion;
$idusuario = \yii::$app->user->Identity->id_usuario;
$BienesUso = new app\modules\bienes\models\BienesUso;
$BienesEstado= new app\modules\bienes\models\BienesEstadoBien;
$BienesColor= new app\modules\bienes\models\BienesColor;
$BienesSeguros= new app\modules\bienes\models\BienesSeguros;
$BienesMarcas= new app\modules\bienes\models\BienesMarcas;
$BienesModelos= new app\modules\bienes\models\BienesModelos;
use app\modules\admin\models\Direccion;
$sede= Direccion::find()->where(['iddireccion'=>$direccion])->one();

?>


<div class="bienes-ncodigo-bien-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_direccion')->hiddenInput(['value'=>$direccion,'id'=>'campo'])->label(false);?>
    <?= $form->field($model, 'id_usuario')->hiddenInput(['value'=>$idusuario])->label(false);?>
    <?= $form->field($model, 'codigo_resp')->hiddenInput(['value'=>'XXX'])->label(false); ?>
    <?= $form->field($model, 'moneda')->hiddenInput(['value'=>1])->label(false);?>
     <?= $form->field($model, 'otra_mon')->hiddenInput(['value'=>'noaplica'])->label(false);?>
 <?php 


   $sed = Yii::$app->db->createCommand('SELECT identificacion FROM bienes.n_codigo_bien '
 . ' WHERE 1=1 ORDER BY identificacion DESC LIMIT 1')->queryAll();
   if($sed)
   {
      $a=$sed[0]['identificacion'];
   }
   else
    {
        $a=0;
    }
    
   $identificacion= $a+1;
?>
   <?= $form->field($model, 'identificacion')->hiddenInput(array('onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10','value'=>$identificacion))->label(false);?>
 
        <?= $form->field($model, 'codigo_origen')->hiddenInput(['id'=>'origen'])->label(false); ?>


     <?= $form->field($model, 'id_sede')->widget(Select2::classname(), [
      'model' => $Sede,
      'attribute' => 'nombre',
      'data'=>Arrayhelper::map($Sede::find()->all(), 'id_sede', 'nombre'),
        'options' => ['placeholder' => 'Seleccione una sede ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Sede');?>

    <!-- ///////////////////////////////////////////// -->

        <div class="main row" style="text-align:center;">
            <div class="col-md-4 column">
    <?php

$provincia = ArrayHelper::map(\app\modules\bienes\models\BienesCodigo::find()->where("padre isnull")->all(), 'id_codigo', 'descripcion');
echo $form->field($model, 'categoria')->dropDownList(

    $provincia,
    [
        'prompt'=>'Porfavor elija una',
        'onchange'=>'
                        $.get( "'.Url::toRoute('bienes/categoria').'", { id_codigo: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'sub_categoria').'" ).html( data );
                            }
                        );
                    '
    ]
);

?>
</div>
            <div class="col-md-4 column">
<?php echo $form->field($model, 'sub_categoria')->dropDownList(array(),
    [
        'prompt'=>'Porfavor elija una',
        'onchange'=>'
                        $.get( "'.Url::toRoute('bienes/categoria').'", { id_codigo: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'id_codigo').'" ).html( data );
                            }
                        );
                    '
    ]
); ?>
</div>
    <!-- ///////////////////////////////////////////// -->

  <div class="col-md-4 column">
    <?= $form->field($model, 'id_codigo')->widget(Select2::classname(), [

      'model' => $BienesCodigo,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesCodigo::find()->where("padre > 77")->all(),'id_codigo', function($data)
                {return Html::encode($data->descripcion.'---'.$data->codigo_completo );    }),
        'options' => ['placeholder' => 'Seleccione una Categoría ...'],
        'pluginOptions' => [
          'allowClear' => true
        ],])->label('Tipo');?>
  </div> </div>

<div class="main row" style="text-align:center;">

 <div class="col-md-6 column">
    <?= $form->field($model, 'descripcion')->textarea(array('rows'=>2,'cols'=>5));?>
        </div>

         <div class="col-md-6 column">
         <?= $form->field($model, 'otras_descripciones')->textarea(array('rows'=>2,'cols'=>5))->label('Otras Descripciones<span style="color:#E20303">*</span>'); ?>
       </div></div>


       <div class="main row" style="text-align:center;">

<div class="col-md-4 column">
    <?= $form->field($model, 'ubicacion')->textInput(); ?>
   </div>

            <div class="col-md-4 column">
    <?= $form->field($model, 'valor_unidad')->textInput(array('onKeyPress'=>'return soloNumeros(event)','maxlength'=>'40'));?>
            </div>
                <div class="col-md-4 column">
    <?= $form->field($model, 'justiprecio')->textInput(array('onKeyPress'=>'return soloNumeros(event)','maxlength'=>'40'))->label('Justiprecio<span style="color:#E20303">*</span>');?>
            </div></div>

            <div class="main row" style="text-align:center;">

                       <div class="col-md-3 column">
                              <?php
                                                            $lista=[1=> 'Compra Directa',
                                                                    2=> 'Permuta',
                                                                    3=> 'Dación en Pago',
                                                                    4=> 'Donación',
                                                                    5 =>'Transferencia',
                                                                    6 =>'Expropiación',
                                                                    7 =>'Confiscación',
                                                                    8 =>'Compra por Concurso Abierto',
                                                                    9 =>'Compra por Concurso Cerrado',
                                                                    10 =>'Adjudicación'];

        echo $form->field($model, 'tipo_adquisicion')->dropdownList($lista, ['prompt'=>'Seleccione Tipo de Adquisición','id'=>'adquisicion']); ?>

   </div>
                       <div class="col-md-3 column">
         <?= $form->field($model, 'ano_adquisicion')->widget(DatePicker::classname(), [
       'name' => 'fechas',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
       
     'options' => ['placeholder' => 'Introduce una Fecha ...', 'onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
            ])->label('Año de Adquisición') ?>

     </div>
<div class="col-md-3 column">
        <?= $form->field($model, 'n_documento')->textInput(array('onKeyPress'=>"return soloNumeros(event)"))->label('Numero de orden de Compra'); ?>
</div>

                <div class="col-md-3 column">

     <?= $form->field($model, 'uso')->widget(Select2::classname(), [
      'model' => $BienesUso,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesUso::find()->all(), 'id_uso','descripcion'),
        'options' => ['placeholder' => 'Seleccione un Estatus ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Estatus de uso');?>
                    </div>
          </div>


<div class="main row" style="text-align:center;">

             <div class="col-md-3 column">
        <?= $form->field($model, 'otro_es')->textInput()->label('Otro Estatus de uso<span style="color:#E20303">*</span>'); ?>
                 </div>

             <div class="col-md-3 column">
                  <?= $form->field($model, 'ingreso')->widget(DatePicker::classname(), [
       'name' => 'fechas',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,

     'options' => ['placeholder' => 'Introduce una Fecha ...', 'onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
])->label('Fecha de ingreso') ?>
            </div>

                <div class="col-md-3 column">
       <?= $form->field($model, 'estado')->widget(Select2::classname(), [
      'model' => $BienesEstado,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesEstado::find()->all(), 'id_estado_bien','descripcion'),
        'options' => ['placeholder' => 'Seleccione un Estado ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Estado del Bien');?>
                  </div>

             <div class="col-md-3 column">
        <?= $form->field($model, 'otro_estado')->textInput()->label('Otro Estado<span style="color:#E20303">*</span>'); ?>
                 </div></div>


                 <div class="main row" style="text-align:center;">

                 <div class="col-md-3 column">
        <?= $form->field($model, 'descripcion_es')->textInput()->label('Descripción del estado<span style="color:#E20303">*</span>'); ?>
                      </div>

                        <div class="col-md-3 column">
        <?= $form->field($model, 'serial')->textInput(); ?>
                             </div>



                <div class="col-md-3 column">
                        <?php

$Marcas= ArrayHelper::map(\app\modules\bienes\models\BienesMarcas::find()->all(), 'id_marca', 'marca');
echo $form->field($model, 'codigo_marca')->dropDownList(

    $Marcas,
    [
        'prompt'=>'Porfavor elija una',
        'onchange'=>'
                        $.get( "'.Url::toRoute('bienes/marcas').'", { id_marca: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'codigo_modelo').'" ).html(data);
                            }
                        );
                    '
    ]
)->label('Marca');

?>
                     </div>


             <div class="col-md-3 column">

                        <?php

$Modelos= ArrayHelper::map(\app\modules\bienes\models\BienesModelos::find()->all(), 'id_modelo', 'descripcion');
echo $form->field($model, 'codigo_modelo')->dropDownList($Modelos,
    [
        'prompt'=>'Porfavor elija una',
    ]
)->label('Modelo');

?>
                    </div>   </div>

                    <div class="main row" style="text-align:center;">

                <div class="col-md-3 column">
        <?= $form->field($model, 'ano_fabricacion')->textInput(array('onKeyPress'=>'return soloNumeros(event)','maxlength'=>'4'))->label('Año de Fabricación<span style="color:#E20303">*</span>');?>
                    </div>


                <div class="col-md-3 column">
          <?= $form->field($model, 'codigo_color')->widget(Select2::classname(), [
      'model' => $BienesColor,
      'attribute' => 'descripcion',
      'data'=>Arrayhelper::map($BienesColor::find()->all(), 'id_color','descripcion'),
        'options' => ['placeholder' => 'Seleccione un Color ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Color del Bien');?>
                           </div>


             <div class="col-md-3 column">
        <?= $form->field($model, 'otro_color')->textInput()->label('Otro Color<span style="color:#E20303">*</span>'); ?>
                        </div>
             <div class="col-md-3 column">
        <?= $form->field($model, 'otros_color')->textInput()->label('Otros Colores<span style="color:#E20303">*</span>'); ?>
                  </div>
                  </div>

                   <div class="main row" style="text-align:center;">



                <div class="col-md-2 column">
                <?= $form->field($model, 'componentes')->radioList(array('S'=>'Si','N'=>'No','X'=>'Desconoce'))->label('Componentes<span style="color:#E20303">*</span>'); ?>

                </div>
            <div class="col-md-2 column">
                   <?= $form->field($model, 'asegurado')->radioList(array('S'=>'Si','N'=>'No','X'=>'Desconoce'))->label('Asegurado'); ?>
                </div></div>



         <div  id ="ocultar" class="main row" style="text-align:center;display:none; ">

                   <div class="col-md-3 column">
                  <?= $form->field($model, 'medida_garantia')->dropDownList([99=>'Desconoce',1=>'Dia',2=>'Mes',3=>'Año'])->label('Medida de garantía'); ?>
                   </div>

                   <div class="col-md-3 column">
<?= $form->field($model, 'garantia')->textInput(array('onKeyPress'=>'return soloNumeros(event)','maxlength'=>'5'))->label('Garantía');?>
                  </div>

                 <div class="col-md-3 column">
        <?= $form->field($model, 'inicio_garantia')->widget(DatePicker::classname(), [
       'name' => 'fechas',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,

     'options' => ['placeholder' => 'Introduce una Fecha ...', 'onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
                ])->label('Inicio de garantía')      ?>

                   </div>

                   <div class="col-md-3 column">
 <?= $form->field($model, 'fin_garantia')->widget(DatePicker::classname(), [
       'name' => 'fechas',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,

     'options' => ['placeholder' => 'Introduce una Fecha ...', 'onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
])->label('Fin de garantía')       ?>
                   </div>

                   <div class="col-md-3 column">
  <?= $form->field($model, 'codigo_seguro')->widget(Select2::classname(), [
      'model' => $BienesSeguros,
      'attribute' => 'denominacion',
      'data'=>Arrayhelper::map($BienesSeguros::find()->all(), 'id_seguro','denominacion'),
        'options' => ['placeholder' => 'Seleccione un Seguro ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],])->label('Seguro');?>
</div>
                   </div>

         <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'crear']); ?>

    </div>

<?php ActiveForm::end(); ?>

        </div>



    <!--a partir de aqui oculta garantia-->





<script type="text/javascript">


   $('#crear').click(function(){

     var modelo= $('#bienesncodigobien-codigo_modelo').val();
     var marca= $('#bienesncodigobien-codigo_marca').val();

      if(modelo=='Por favor elija una' || modelo=='No results found'){
                  $('#bienesncodigobien-codigo_modelo').val('99');
              }

       if(marca==0){
                  alert('Debe incluir una marca');
                  return false;
              }
   });




    $(document).ready(function(){

//ocultar información del seguro
  $('#bienesncodigobien-asegurado').click(function(){

var asegurado= $('input:radio[name="BienesNCodigoBien[asegurado]"]:checked').val();
if(asegurado=='S'){
$('#ocultar').show();
}
        else
          {
$('#ocultar').hide();
          }
});


             $('#adquisicion').on('change', function(){
           //event.preventDefault();
           //event.stopImmediatePropagation();

                $.ajax({
                       type:'POST',
                       url: '<?php echo Yii::$app->request->baseUrl. '/index.php?r=bienes/bienes/origen' ?>',
                       data:{
                       tipo_adquisicion: $('#adquisicion').val(),

                     }
                     ,
                       success:function(response){
                           response = JSON.parse(response);

                           $('#origen').val(response.respuesta);
                       //alert(response.respuesta);

                       }


                });});});
</script>
<script src="/siapweb/web/js/validaciones.js"></script>
