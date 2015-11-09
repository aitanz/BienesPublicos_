<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\web\Response;
use yii\helpers\Url;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesLocalidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'SISTEMA DE BIENES');
$this->params['breadcrumbs'][] = 'Localidad de los Bienes';
?>
<div class="bienes-localidad-index">

    <h1><?= Html::encode('Localidad de los Bienes') ?></h1>
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
                 'id_localidad',
            'codigo_localidad',
            'nombre',
            'padre',
            'codigo_completo',
            // 'id_tipo_localidad',

       [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
              'view' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                    'id' => 'boton_crear',
                    'title' => Yii::t('app', 'Vista'),
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                     'data-url' => Url::to(['view', 'id' => $model->id_localidad]),
                    'data-pjax' => '0',
                   
                ]);
            }, 
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                            'id' => 'boton_crear',
                            'title' => Yii::t('app', 'Actualizar'),
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'data-url' => Url::to(['update', 'id' => $model->id_localidad]),
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
