<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesMarcasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes Marcas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-marcas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <p>
       <?= Html::a('Crear', '#', [
            'id' => 'boton_crear',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]); ?>

        
    </p>
  

 <?php Pjax::begin(); ?>
    <?= GridView::widget([
      'id' => 'gridview',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
      'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_marca',
            'marca',
            'fabricante',
   [
                'class' => 'yii\grid\ActionColumn',
             //iconos de acciones
                'template' => '{view}{update}{delete}',
                'buttons' => [
              'view' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                    'id' => 'boton_crear',
                    'title' => Yii::t('app', 'Vista'),
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                     'data-url' => Url::to(['view', 'id' => $model->id_marca]),
                    'data-pjax' => '0',
                   
                ]);
            }, 
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                            'id' => 'boton_crear',
                            'title' => Yii::t('app', 'Actualizar'),
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'data-url' => Url::to(['update', 'id' => $model->id_marca]),
                            'data-pjax' => '0',
                        ]);
                    },
                ] //fin de buttons
            ],
        ],
    ]); 

?>
<?php Pjax::end(); ?>
    
     <?php
    $this->registerJs(
        "$(document).on('click', '#boton_crear', (function() {
            $.get(
                $(this).data('url'),
                function (data) {
                    $('.modal-body').html(data);
                    $('#modal').modal();
                                 } 
                     );
                                                              }));"
    ); ?>
    <?php
Modal::begin([
    'id' => 'modal',
    'header' => '<h4 class="modal-title">SISTEMA DE BIENES</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
]);
 
echo "<div class='well'></div>";
 
Modal::end();
?>
</div>
