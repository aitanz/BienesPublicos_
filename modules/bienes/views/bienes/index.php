<script src="/siapweb/web/js/validaciones.js"></script>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\bienes\models\BienesLocalidad;
use app\modules\bienes\models\BienesCodigo;

$BienesLocalidad =  new BienesLocalidad;
$BienesCodigo =  new BienesCodigo;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesNCodigoBienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes Muebles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Bienes Muebles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
       'id' => 'gridview',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'id_codigo',
              'value' => function($BienesCodigo){
              $Codigo = BienesCodigo::findOne($BienesCodigo->id_codigo);
              return $Codigo->descripcion;
                },
                        'filter'=>false,
                        'label'=>'Tipo del Bien'
            ],
             
            
                                                [
                'attribute' => 'identificacion',
                         'label'=>'Identificación',
               'filter' => Html::activeTextInput($searchModel, 'identificacion', ['class' => 'form-control', 'onKeyPress'=>'return soloNumeros(event)', 'maxlength'=>'10']),
            ],
            'descripcion',
            // 'valor_unidad',
            // 'justiprecio',
                               [
                'attribute' => 'ano_adquisicion',
                         'label'=>'Año de Adquisición',
      'filter' => Html::activeTextInput($searchModel, 'ano_adquisicion', ['class' => 'form-control', 'onKeyPress'=>'return soloNumeros(event)','maxlength'=>'10']),
                   
             
            ],
        
            // 'ubicacion',
            // 'tipo_adquisicion',
            // 'n_documento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php
#filtrar por teclas
//$this->registerJs('$("body").on("keyup.yiiGridView", "#gridview .filters input", function(){
        
  //  $("#gridview").yiiGridView("applyFilter");

//})', \yii\web\View::POS_READY);
?>
